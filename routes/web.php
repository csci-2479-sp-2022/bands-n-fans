<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\BandController;
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

Route::get ('/bands/{id?}', [BandController::class, 'viewBand']);

Route::get('/profile', function () {
    return view('account-profile');
})->middleware(['auth'])->name('account-profile');

// For some stupid reason, this did not work
// Route::get('/search-results', [SearchController::class, 'index']);

Route::get('/search-results', 'App\Http\Controllers\SearchController@show');

Route::post('/search-results', function () {
    return redirect('/search-results');
});

Route::get('/bands', function () {
    return view('band-list');
})->middleware(['auth'])->name('bands');

require __DIR__.'/auth.php';
