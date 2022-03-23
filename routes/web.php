<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\BandController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AccountController;
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
Route::get('/config', function() {
    return phpinfo();
});

Route::get('/', function () {
    return view('welcome');
});

Route::controller(BandController::class)->group(function() {
    Route::get('/bands', 'getBandList')->name('bands');
    Route::get('/bands/{id}', 'viewBand')->name('bandByID');
});

Route::get('/search-results', [SearchController::class, 'searchBandsByName']);

Route::post('/search-results', function () {
    return redirect('/search-results');
});

/*
Route::get('/profile', function () {
    return view('account-profile');
})->middleware(['auth'])->name('account-profile');
*/
Route::get('profile', [AccountController::class, 'showUserBands'])->middleware(['auth'])->name('account-profile');

// For some stupid reason, this did not work
// Route::get('/search-results', [SearchController::class, 'index']);

//Route::get('/search-results', 'App\Http\Controllers\SearchController@show');



require __DIR__.'/auth.php';
