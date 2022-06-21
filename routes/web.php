<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CampusController;
use App\Http\Controllers\UtbkScoreController;
use App\Http\Controllers\RecommendationController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        $role = Auth::user()->role;
        if ($role == "developer") {
            return redirect()->route('developer.home');
        } else if ($role == "user") {
            return redirect()->route('user.home');
        }
    })->name('index');

    Route::get('home', function () {
        $role = Auth::user()->role;
        if ($role == "developer") {
            return redirect()->route('developer.home');
        } else if ($role == "user") {
            return redirect()->route('user.home');
        }
    })->name('home');
    
    Route::group(['middleware' => 'role:developer', 'prefix' => 'developer'], function () {
        Route::get('/home', [HomeController::class, 'indexDeveloper'])->name('developer.home');
    });
    
    Route::group(['middleware' => 'role:user', 'prefix' => 'user'], function () {
        Route::get('/home', [HomeController::class, 'indexUser'])->name('user.home');
        Route::get('/campus', [CampusController::class, 'index'])->name('campus.index');
        Route::resource('utbk_score', UtbkScoreController::class);
        Route::get('/calculate_ranking', [RecommendationController::class, 'calculate_ranking'])->name('recommendation.calculate_ranking');
    });
});



// Route::resource('/utbk', UtbkScoreController::class);