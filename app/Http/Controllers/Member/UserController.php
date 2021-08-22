<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->view = 'main.members.settings';
        view()->share([
            'view' => $this->view
        ]);
    }

	/**
     * Show member's profile page
     *
     * @var Illuminate\View\View
     */
    public function profile(): View
    {
        return view("$this->view.profile", [
        	'user' => me() 
        ]);
    }

    /**
     * Show member's account page
     *
     * @var Illuminate\View\View
     */
    public function account(): View
    {
        return view("$this->view.account", [
        	'user' => me() 
        ]);
    }

    /**
     * Show member's change password page
     *
     * @var Illuminate\View\View
     */
    public function password(): View
    {
        return view("$this->view.password", [
        	'user' => me() 
        ]);
    }

    /**
     * Show member's appearance page
     *
     * @var Illuminate\View\View
     */
    public function appearance(): View
    {
        return view("$this->view.appearance", [
        	'user' => me() 
        ]);
    }

    /**
     * Show member's notifications page
     *
     * @var Illuminate\View\View
     */
    public function notify(): View
    {
        return view("$this->view.notifications", [
        	'user' => me() 
        ]);
    }

    /**
     * Show member's api page
     *
     * @var Illuminate\View\View
     */
    public function api(): View
    {
        return view("$this->view.api", [
        	'user' => me() 
        ]);
    }

    /**
     * Show member's sessions page
     *
     * @var Illuminate\View\View
     */
    public function sessions(): View
    {
        return view("$this->view.sessions", [
        	'user' => me() 
        ]);
    }

    /**
     * Show member's logs page
     *
     * @var Illuminate\View\View
     */
    public function logs(): View
    {
        return view("$this->view.logs", [
        	'user' => me() 
        ]);
    }

    /**
     * Show member's delete account page
     *
     * @var Illuminate\View\View
     */
    public function delete(): View
    {
        return view("$this->view.delete", [
        	'user' => me() 
        ]);
    }
}
