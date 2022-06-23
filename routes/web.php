<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CampusController;
use App\Http\Controllers\CriteriaController;
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

Auth::routes();

Route::get('/', function () {    
    if (Auth::user() != null) {
        if (Auth::user()->role == "developer") {
            return redirect()->route('developer.home');
        } else if ($role == "user") {
            return redirect()->route('user.home');
        } 
    } else {
        return view('welcome');
    }
})->name('index');

Route::middleware(['auth'])->group(function () {    
    Route::get('home', function () {
        $role = Auth::user()->role;
        if ($role == "developer") {
            return redirect()->route('developer.home');
        } else if ($role == "user") {
            return redirect()->route('user.home');
        }
    })->name('home');
    
    Route::get('/campus/{campus_id?}', [CampusController::class, 'index'])->name('campus.index');
    
    Route::group(['middleware' => 'role:developer', 'prefix' => 'developer'], function () {
        Route::get('/', [HomeController::class, 'indexDeveloper'])->name('developer.home');
        Route::resource('criteria', CriteriaController::class);
        Route::get('/scoring', [CriteriaController::class, 'scoring'])->name('criteria.scoring');        
        Route::post('/scoring/calculation', [CriteriaController::class, 'calculate_criteria_weight'])->name('criteria.calculate_weight');
    });
    
    Route::group(['middleware' => 'role:user', 'prefix' => 'user'], function () {
        Route::get('/', [HomeController::class, 'indexUser'])->name('user.home');
        Route::resource('utbk_score', UtbkScoreController::class);
        Route::get('/calculate_ranking', [RecommendationController::class, 'calculate_ranking'])->name('recommendation.calculate_ranking');    
    });
});



// Route::resource('/utbk', UtbkScoreController::class);