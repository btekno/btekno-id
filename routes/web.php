<?php

use Illuminate\Support\Facades\Route;

/**
 * Borneo Teknomedia Website
 * https://btekno.id
 * 
 * 1. Authentication
 * 2. Landing Page
 * 3. Search
 * 4. Member's Profile
 * 5. Pages
 * 6. Status
 * 7. Sitemaps
 * 8. Member Area
 *    - Notifications
 *    - Settings
 * 9. 404 Fallback
 */
Route::namespace('App\Http\Controllers')->domain(env('APP_DOMAIN'))->group(function() {
    #### Authentication
    Auth::routes(['verify' => true]);
    Route::get('login/{provider}', 'Auth\\SocialController@redirect')->name('social');
    Route::get('login/{provider}/callback', 'Auth\\SocialController@callback');
    Route::view('suspended', 'auth.suspended')->name('suspended');

    #### Landing Page
    Route::view('/', 'main.index')->name('index');

    #### Search
    Route::prefix('search')->as('search.')->group(function () {
        Route::get('', 'SearchController@search')->name('index');
        Route::get('users', 'SearchController@users')->name('users');
    });

    #### Member's Profile
    Route::prefix('@{username}')->as('member.')->group(function () {
        Route::get('', 'MemberController@profile')->name('index');
        Route::get('following', 'MemberController@profile')->name('following');
        Route::get('followers', 'MemberController@profile')->name('followers');
        Route::get('stats', 'MemberController@profile')->name('stats');
        
        Route::get('json', 'MemberController@json')->name('json');
    });

    #### Pages
    Route::get('about', 'PagesController@about')->name('about');
    Route::view('terms', 'main.pages.terms')->name('terms');
    Route::view('privacy', 'main.pages.privacy')->name('privacy');
    Route::view('security', 'main.pages.security')->name('security');
    Route::view('sponsors', 'main.pages.sponsors')->name('sponsors');
    Route::view('contact', 'main.pages.contact')->name('contact');
    Route::view('open', 'main.pages.open')->name('open');
    Route::view('api', 'main.pages.api')->middleware('feature:api')->name('api');

    #### Status
    Route::prefix('status')->group(function () {
        Route::get('ping', 'StatusController@ping');
        Route::get('redis', 'StatusController@redis');
        Route::get('cache', 'StatusController@cache');
    });

    #### Sitemaps
    Route::view('sitemap_urls.txt', 'main.seo.sitemap_urls');
    Route::get('sitemap_users.txt', 'SitemapController@users');

    ## Member Area
    Route::namespace('Member')->middleware(['auth'])->group(function () {
        #### Notifications
        Route::prefix('notifications')->as('notifications.')->group(function () {
            Route::view('', 'main.notifications.unread')->name('unread');
            Route::view('all', 'main.notifications.all')->name('all');
        });

        #### Settings
        Route::prefix('settings')->as('settings.')->group(function () {
            Route::get('', 'UserController@profileSettings')->name('profile');
            Route::get('account', 'UserController@accountSettings')->name('account');
            Route::get('password', 'UserController@passwordSettings')->name('password');
            Route::get('appearance', 'UserController@appearanceSettings')->name('appearance');
            Route::get('notifications', 'UserController@notifySettings')->name('notifications');
            Route::get('api', 'UserController@apiSettings')->name('api');
            Route::get('sessions', 'UserController@sessionsSettings')->name('sessions');
            Route::get('logs', 'UserController@logsSettings')->name('logs');
            Route::get('delete', 'UserController@deleteSettings')->name('delete');
            
            Route::get('data', 'DataController@index')->name('data');
            Route::get('data/export/account', 'DataController@exportAccount')->name('export.account');
            Route::get('data/export/logs', 'DataController@exportLogs')->name('export.logs');
        });
    }); 

    #### 404 Fallback
    Route::fallback(function () {
        return response()->view('errors.404', [], 404);
    });
}); 