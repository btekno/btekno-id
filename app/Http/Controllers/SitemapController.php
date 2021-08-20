<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class SitemapController extends Controller
{
    /**
     * Sitemaps for our registered members
     *
     * @var Illuminate\View\View;
     */
    public function users(): View
    {
        $users = User::select('username', 'is_spam')
            ->where('is_spam', false)
            ->get();

        return view('main.seo.sitemap_users', compact('users'));
    }
}