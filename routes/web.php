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
    Route::get('dashboard/change', 'Owner\OwnerDashboardController@change')->name('dashboard.change'); // change button in dashboard owner
    Route::resource('dashboard', 'Owner\OwnerDashboardController'); // dashboard CRUD
    
    //Route Restauarnt, parameter {restaurant} diperoleh dari sidebar.blade
    Route::prefix('{restaurant}')->name('restaurant.')->group(function(){
        Route::resource('dashboard', 'Owner\DashboardController');
        
        // Route Vacancy
        Route::resource('vacancy', 'Owner\VacancyController');
        Route::prefix('{vacancy}')->name('vacancy.')->group(function(){
            Route::get('accept/{user}', 'Owner\RecruitmentController@edit')->name('recruitment.accept');
            Route::put('reject/{user}', 'Owner\RecruitmentController@reject')->name('recruitment.reject');
            Route::put('update/{user}', 'Owner\RecruitmentController@update')->name('recruitment.update');
        });

        Route::get('apply/{user}', 'Owner\RecruitmentController@edit');
        Route::get('update/{user}', 'Owner\RecruitmentController@update');

        Route::resource('pelamar', 'Owner\PelamarController');
        Route::resource('pegawai', 'Owner\PegawaiController');// get all employee every restaurant

        Route::resource('resign', 'Owner\ResignController');
        Route::get('rating/{user}', 'Owner\RatingController@createRating')->name('rating.create');
        Route::post('rating/{user}', 'Owner\RatingController@storeRating')->name('rating.store');

        // Route::get('/resign', 'PegawaiResignController@resign')->name('resign.pegawai');
        // Route::get('/resign/cetak_pdf', 'PegawaiResignController@cetak_pdf');
    });
});

//route Admin
Route::prefix('admin')->middleware('auth', 'role:admin')->name('admin.')->group(function(){
    Route::resource('dashboard', 'Admin\AdminDashboardController');
    Route::get('register', 'Admin\AdminRegisterController@showForm')->name('register.showForm');
});

Route::resource('user', 'User\UserController')->middleware('auth', 'role:employees');

Route::prefix('user')->middleware('auth', 'role:employee')->name('user.')->group(function(){
    Route::resource('/view', 'User\ViewController');  
    Route::resource('resign', 'User\ResignController'); //route Resign for user
});
