<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use Spatie\Activitylog\Models\Activity;

use App\Models\User;

class MemberController extends Controller
{
	public function profile($username): View
    {
        $user = User::whereUsername($username)->firstOrFail();
        $type = Route::current()->getName();

        $response = [
            'user'  => $user,
            'type'  => $type,
            // 'level' => $user->badges->sortBy(function ($post) {
            //     return $post->pivot->created_at;
            // }),
            // 'done_count'       => $user->tasks()->whereDone(true)->count('id'),
            // 'pending_count'    => $user->tasks()->whereDone(false)->count('id'),
            // 'products_count'   => $user->ownedProducts()->count('id'),
            // 'questions_count'  => $user->questions_count,
            // 'answers_count'    => $user->answers_count,
            // 'milestones_count' => $user->milestones_count,
        ];

        if(auth()->check() && auth()->user()->id === $user->id or auth()->check() && auth()->user()->is_staff):
            return view("main.$type", $response);
        endif;

        if($user->is_spam):
            return abort(404);
        endif;

        return view("main.$type", $response);
    }

    public function json($username)
    {
        $user = User::whereUsername($username)->firstOrFail();

        return [
            'id'                 => $user->id,
            'username'           => $user->username,
            'firstname'          => $user->firstname,
            'lastname'           => $user->lastname,
            'avatar'             => $user->avatar,
            'bio'                => $user->bio,
            'location'           => $user->location,
            'company'            => $user->company,
            'website'            => $user->website,
            'twitter'            => $user->twitter,
            'twitch'             => $user->twitch,
            'github'             => $user->github,
            'telegram'           => $user->telegram,
            'youtube'            => $user->youtube,
            'sponsor'            => $user->sponsor,
            'is_staff'           => $user->is_staff ? true : false,
            'is_contributor'     => $user->is_contributor ? true : false,
            'is_beta'            => $user->is_beta ? true : false,
            'is_patron'          => $user->is_patron ? true : false,
            'is_private'         => $user->is_private ? true : false,
            'is_verified'        => $user->is_verified ? true : false,
            'has_goal'           => $user->has_goal ? true : false,
            'daily_goal'         => $user->daily_goal,
            'daily_goal_reached' => $user->daily_goal_reached ? true : false,
            'vacation_mode'      => $user->vacation_mode ? true : false,
            'streaks'            => $user->streaks,
            'tasks'              => $user->tasks_count,
            'comments'           => $user->comments_count,
            'questions'          => $user->questions_count,
            'answers'            => $user->answers_count,
            'milestones'         => $user->milestones_count,
            'followers'          => $user->followers_count,
            'following'          => $user->followings_count,
            'status'             => [
                'status_emoji' => $user->status_emoji,
                'status'       => $user->status,
            ],
        ];
    }

    public function darkMode(): JsonResponse
    {
        if (Cookie::get('color_mode') === 'light') {
            Cookie::queue('color_mode', 'dark', config('session.lifetime'));
            loggy(request(), 'User', auth()->user(), 'Toggled appearance');

            return response()->json([
                'status' => 'disabled',
            ]);
        }

        Cookie::queue('color_mode', 'light', config('session.lifetime'));
        loggy(request(), 'User', auth()->user(), 'Toggled appearance');

        return response()->json([
            'status' => 'enabled',
        ]);
    }
}
