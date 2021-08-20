<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Milestone;
use App\Models\Question;
use App\Models\Task;
use App\Models\User;
use Illuminate\View\View;

class PagesController extends Controller
{
	/**
     * Show about us page to visitors or members
     *
     * @var Illuminate\View\View
     */
    public function about(): View
    {
        $users = User::count('id');

        return view('main.pages.about', [
            'users' => number_format($users),
        ]);
    }
}
