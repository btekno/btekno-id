<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Socialite;

use App\Notifications\Welcome;
use App\Models\User;

class SocialController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Redirect the user to the facebook authentication page.
     *
     * @return RedirectResponse
     */
    public function redirect(Request $request, $provider)
    {
    	session(['redirect' => $request->redirect]);

        $providerArray = ['twitter', 'google', 'facebook'];
        if(in_array($provider, $providerArray)):
            return Socialite::driver($provider)->redirect();
        endif;

        return abort(404);
    }

    /**
     * Obtain the user information from social media.
     *
     * @return RedirectResponse
     */
    public function callback(Request $request, $provider)
    {
        if(count($request->all()) === 0):
            abort(404);
        endif;

        if($provider === 'twitter'):
            $userSocial = Socialite::driver($provider)->user();
        else:
            $userSocial = Socialite::driver($provider)->stateless()->user();
        endif;

        $user = User::where(['email' => $userSocial->getEmail()])->first();

        if($user):
            Auth::login($user);
            logify(request(), 'Auth', $user, 'Logged in via Social auth.');

            return redirect()->route('index');
        endif;

        if($provider === 'twitter'):
            $user = User::where(['username' => $userSocial->getNickname()])->first();
            if(!$user):
                $username = $userSocial->getNickname();
            else:
                $username = $userSocial->getNickname().'_'.strtolower(Str::random(5));
            endif;
        else:
            $username = strtolower(Str::random(6));
        endif;

        $user = User::create([
            'username'          => $username,
            'name'         		=> $userSocial->getName(),
            'email'             => $userSocial->getEmail(),
            'image'             => $avatar,
            'provider_id'       => $userSocial->getId(),
            'provider'          => $provider,
            'api_token'         => Str::random(60),
            'email_verified_at' => date('Y-m-d H:i:s'),
        ]);

        if($provider === 'twitter'):
            $user->twitter = $userSocial->getNickname();
            $user->save();
        endif;

        Auth::login($user);
        $user->notify(new Welcome(true));
        
        logify(
            request(),
            'Auth',
            $user,
            "Created account with {$provider} {$user->email} from ".request()->ip()
        );

        $redirect = session('redirect');
        if($redirect):
            return redirect($redirect);
        endif;

        return redirect()->route('index');
    }
}
