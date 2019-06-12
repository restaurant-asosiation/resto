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
        
        Route::resource('vacancy', 'Owner\VacancyController');
        Route::prefix('{vacancy}')->name('vacancy.')->group(function(){
            Route::get('accept/{user}', 'Owner\RecruitmentController@edit')->name('recruitment.accept');
            Route::put('reject/{user}', 'Owner\RecruitmentController@reject')->name('recruitment.reject');
            Route::put('update/{user}', 'Owner\RecruitmentController@update')->name('recruitment.update');
        });
        
        Route::resource('pelamar', 'Owner\PelamarController');
        Route::resource('pegawai', 'Owner\PegawaiController');
        Route::get('resign',  'Owner\ProdukController@makePDF');

        Route::get('apply/{user}', 'Owner\RecruitmentController@edit');
        Route::get('update/{user}', 'Owner\RecruitmentController@update');
    });
});

//route Admin
Route::prefix('admin')->middleware('auth', 'role:admin')->name('admin.')->group(function(){
    Route::resource('dashboard', 'Admin\AdminDashboardController');
});

Route::resource('user', 'User\UserController')->middleware('auth', 'role:employees');

Route::prefix('user')->middleware('auth', 'role:employee')->name('user.')->group(function(){
    Route::resource('/view', 'User\ViewController');  
    Route::resource('resign', 'User\ResignController'); //route Resign for user
});

Route::prefix('admin')->middleware('auth', 'role:admin')->name('admin.')->group(function(){
    Route::resource('dashboard', 'Admin\AdminDashboardController');
    Route::resource('addaccount', 'Admin\AdminDashboardController');
    //resource fungsi pemanggilan dalam landing page admin

});
