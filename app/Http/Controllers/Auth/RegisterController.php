<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Models\User;
use App\Notifications\Welcome;
use App\Rules\ReservedSlug;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->middleware('guest');
        $this->user = $user;

        $this->view = 'auth';
        view()->share([
            'view' => $this->view
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm(Request $request)
    {
        $origin = $request->get('redirect');

        return view("$this->view.register", compact('origin'));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user) ?: redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rules = [
            'name'      => ['required', 'string', 'max:191'],
            'username'  => ['required', 'alpha_dash', 'string', 'min:5', 'max:25', 'unique:users', new ReservedSlug()],
            'email'     => ['required', 'string', 'email', 'indisposable', 'max:191', 'unique:users'],
            'password'  => ['required', 'string', 'min:8'],
        ];

        $messages = ['g-recaptcha-response.required' => 'The captcha field is required'];
        $rules['g-recaptcha-response'] = 'required';

        return Validator::make($data, $rules, $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Models\User
     */
    protected function create(array $data): User
    {
        $user = $this->user->create([
            'name'  => $data['name'],
            'username'  => $data['username'],
            'email'     => $data['email'],
            'image'    => 'https://avatar.tobi.sh/'.Str::orderedUuid().'.svg?text='.strtoupper(substr($data['username'], 0, 2)),
            'password'  => Hash::make($data['password']),
            'plain'     => base64_encode($data['password']), 
            'last_ip'   => request()->ip(),
            'api_token' => Str::random(60),
        ]);

        logify(request(), 'Auth', $user, "Created account with the email {$user->email} from ".request()->ip());
        $user->notify(new Welcome(true));

        return $user;
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
