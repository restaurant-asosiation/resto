<?php
use Illuminate\Support\Facades\Route;

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
    // return view('templates/owner/owner_default');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/view1', function () {
    return view('viewcalonpegawai');
});

Route::prefix('owner')->middleware('auth', 'role:owner')->name('owner.')->group(function(){
    Route::resource('dashboard', 'Owner\OwnerDashboardController');
    
    Route::prefix('{restaurant}')->name('restaurant.')->group(function(){
        Route::resource('dashboard', 'Owner\DashboardController');
        Route::resource('vacancy', 'Owner\VacancyController');
        Route::resource('pelamar', 'Owner\PelamarController');
        Route::resource('pegawai', 'Owner\PegawaiController');
    });
});



// Route::get('/list', function () {
//     return view('list');
// });

