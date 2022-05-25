<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\StudentController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\LeaderboardController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\PagesController;
use App\Http\Controllers\Backend\RplayerController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\FrontendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('auth.login');
// });

Auth::routes();
Route::get('/', [FrontendController::class, 'index'])->name('home.index');
Route::get('/ev/{type}', [FrontendController::class, 'events'])->name('home.event');
Route::get('/ev/view/{id}', [FrontendController::class, 'viewEvent'])->name('home.viewEvent');
Route::get('/players', [FrontendController::class, 'players'])->name('home.players');
Route::get('/player/profile/{id}', [FrontendController::class, 'playerProfile'])->name('home.playerProfile');
Route::get('/ld/{id}', [FrontendController::class, 'leaderboard'])->name('home.leaderboard');
Route::get('/blogs', [FrontendController::class, 'blogs'])->name('home.blogs');
Route::get('/blogs/{is}', [FrontendController::class, 'viewBlogs'])->name('home.viewBlog');
Route::get('/subscribe', [FrontendController::class, 'subscribe'])->name('home.subscribe');
Route::get('/about-us', [FrontendController::class, 'aboutUs'])->name('home.aboutUs');
Route::any('/recommend-a-player', [FrontendController::class, 'recommendPlayer'])->name('home.recommendPlayer');
Route::get('/privacy-policy', [FrontendController::class, 'privacyPolicy'])->name('home.privacyPolicy');
Route::get('/terms-and-conditions', [FrontendController::class, 'tos'])->name('home.tos');

Route::any('/payment/stripe/payment', [App\Http\Controllers\StripePaymentController::class, 'stripePost'])->name('payment.stripePost');




Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth:web'], 'prefix' => 'admin'], function () {
    Route::resource('athlete', StudentController::class);
    Route::post('athletes/manageStatics', [StudentController::class, 'manageStatics'])->name('student.manageStatics');
    Route::get('athletes/destroyStatics/{id}', [StudentController::class, 'destroyStatics'])->name('student.destroyStatics');
    Route::resource('event', EventController::class);
    Route::resource('news', NewsController::class);
    Route::resource('page', PagesController::class);
    Route::resource('slider', SliderController::class);
    Route::resource('users', UserController::class);
    Route::resource('recommended-player', RplayerController::class);
    Route::get('leaderboard/{type}', [LeaderboardController::class, 'index'])->name('leaderboard.index');
    Route::any('siteSettings', [PagesController::class, 'siteSettings'])->name('siteSettings');
});
