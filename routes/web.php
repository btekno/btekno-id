<?php

use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers')->domain(env('APP_DOMAIN'))->group(function() {
    # Auth
    Auth::routes();
    Auth::routes(['verify' => true]);

    # Social Auth
    Route::get('login/{provider}', [SocialController::class, 'redirect']);
    Route::get('login/{provider}/callback', [SocialController::class, 'callback']);

    # 404 Fallback
    Route::fallback(function () {
        return response()->view('errors.404', [], 404);
    });

    # Suspended
    Route::view('suspended', 'auth.suspended')->name('suspended');


});


# Landing Page
// Route::view('/', 'landing.index')->name('index');

Route::get('/', function () {
    return view('welcome');
})->name('index');

# Light mode
Route::get('darkmode', [UserController::class, 'darkMode'])->name('darkmode')->middleware('auth');

# Search
Route::prefix('search')->as('search.')->group(function () {
    Route::get('', [SearchController::class, 'search'])->name('home');
    Route::get('tasks', [SearchController::class, 'tasks'])->name('tasks');
    Route::get('comments', [SearchController::class, 'comments'])->name('comments');
    Route::get('questions', [SearchController::class, 'questions'])->name('questions');
    Route::get('answers', [SearchController::class, 'answers'])->name('answers');
    Route::get('products', [SearchController::class, 'products'])->name('products');
    Route::get('users', [SearchController::class, 'users'])->name('users');
});

# Pages
Route::get('about', [PagesController::class, 'about'])->name('about');
Route::view('terms', 'pages.terms')->name('terms');
Route::view('privacy', 'pages.privacy')->name('privacy');
Route::view('security', 'pages.security')->name('security');
Route::view('sponsors', 'pages.sponsors')->name('sponsors');
Route::view('contact', 'pages.contact')->name('contact');
Route::view('reputation', 'pages.reputation')->name('reputation')->middleware('auth');
Route::view('open', 'pages.open')->name('open');
Route::view('api', 'pages.api')->middleware('feature:api')->name('api');
Route::get('deals', [PagesController::class, 'deals'])->name('deals');

# Member
Route::prefix('@{username}')->as('member.')->group(function () {
    Route::get('', [UserController::class, 'profile'])->name('done');
    Route::get('pending', [UserController::class, 'profile'])->name('pending');
    Route::get('products', [UserController::class, 'profile'])->name('products');
    Route::get('questions', [UserController::class, 'profile'])->name('questions');
    Route::get('answers', [UserController::class, 'profile'])->name('answers');
    Route::get('milestones', [UserController::class, 'profile'])->name('milestones');
    Route::get('following', [UserController::class, 'profile'])->name('following');
    Route::get('followers', [UserController::class, 'profile'])->name('followers');
    Route::get('stats', [UserController::class, 'profile'])->name('stats');
    
    Route::get('json', [UserController::class, 'json'])->name('json');
});

# Settings
Route::prefix('settings')->as('settings.')->middleware(['auth'])->group(function () {
    Route::get('', [UserController::class, 'profileSettings'])->name('profile');
    Route::get('account', [UserController::class, 'accountSettings'])->name('account');
    Route::get('appearance', [UserController::class, 'appearanceSettings'])->name('appearance');
    Route::get('products', [UserController::class, 'productsSettings'])->name('products');
    Route::get('patron', [UserController::class, 'patronSettings'])->name('patron');
    Route::get('password', [UserController::class, 'passwordSettings'])->name('password');
    Route::get('notifications', [UserController::class, 'notifySettings'])->name('notifications');
    Route::get('integrations', [UserController::class, 'integrationsSettings'])->name('integrations');
    Route::get('api', [UserController::class, 'apiSettings'])->name('api');
    Route::get('sessions', [UserController::class, 'sessionsSettings'])->name('sessions');
    Route::get('logs', [UserController::class, 'logsSettings'])->name('logs');
    Route::get('data', [UserController::class, 'dataSettings'])->name('data');
    Route::get('delete', [UserController::class, 'deleteSettings'])->name('delete');
    Route::get('export/account', [UserController::class, 'exportAccount'])->name('export.account');
    Route::get('export/logs', [UserController::class, 'exportLogs'])->name('export.logs');
});

// Notifications
Route::prefix('notifications')->as('notifications.')->middleware(['auth'])->group(function () {
    Route::view('', 'notifications.unread')->name('unread');
    Route::view('all', 'notifications.all')->name('all');
});





