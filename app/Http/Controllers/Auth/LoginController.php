<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use App\Models\User;
use App\Notifications\Auth\Login;
use App\Notifications\Auth\MagicLink;
use Grosv\LaravelPasswordlessLogin\LoginUrl;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request): RedirectResponse
    {
        if($request->input('submit') === 'magic-link'):
            $this->validateMagicLink($request);
            return $this->sendLoginLink($request);
        endif;

        $input = $request->all();
        $this->validateLogin($request);

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if(auth()->attempt([$fieldType => $input['username'], 'password' => $input['password']])):
            $request->session()->flash('global', 'Welcome back!');

            me()->notify(new Login($request->ip()));
            logify(request(), 'Auth', me(), 'Logged in via Btekno auth with '.me()->email);

            return redirect()->route('index');
        endif;

        $request->session()->flash('error', 'Invalid login credentials');
        return redirect()->back();
    }

    /**
     * Send a login link for automatic credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendLoginLink($request): RedirectResponse
    {
        $username = $request->input('username');
        if(filter_var($username, FILTER_VALIDATE_EMAIL)):
            $user = User::whereEmail($username)->first();
        else:
            $user = User::whereUsername($username)->first();
        endif;

        if(!$user):
            $request->session()->flash('error', "No user found with <b>{$request->input('username')}</b>");

            return redirect()->back();
        endif;

        if(!$user->is_spam || !$user->is_suspended):
            $generator = new LoginUrl($user);
            $generator->setRedirectUrl('/');
            $url = $generator->generate();
            $user->notify(new MagicLink($url));
            $request->session()->flash('global', 'Magic link has been sent to your email');

            return redirect()->route('index');
        endif;

        $request->session()->flash('global', 'Your account is flagged or suspended 😢');

        return redirect()->route('index');
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $rules = [
            'username' => 'required|string',
            'password' => 'required|string',
        ];

        $messages = ['g-recaptcha-response.required' => 'The captcha field is required'];
        $rules = array_merge($rules, [
            'g-recaptcha-response' => 'required'
        ]);

        $this->validate($request, $rules);
    }

    /**
     * Validate the user magic link request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateMagicLink(Request $request)
    {
        $rules = ['username' => 'required|string'];

        $messages = ['g-recaptcha-response.required' => 'The captcha field is required'];
        $rules = array_merge($rules, [
            'g-recaptcha-response' => 'required'
        ]);

        $this->validate($request, $rules);
    }
}
