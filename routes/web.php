<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// For some stupid reason, this did not work 
// Route::get('/search-results', [SearchController::class, 'index']);

Route::get('/search-results', 'App\Http\Controllers\SearchController@show');

Route::post('/search-results', function () {
    return redirect('/search-results');
});

require __DIR__.'/auth.php';
