<?php

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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('blank');
    });

    Route::get('profile', 'ProfileController@show')->name('profile.show');
    Route::get('profile/edit', 'ProfileController@edit')->name('profile.edit');
    Route::patch('profile', 'ProfileController@update')->name('profile.update');
    Route::get('password', 'ProfileController@editpassword')->name('password.show');
    Route::patch('password', 'ProfileController@storepassword')->name('password.store');
    Route::patch('profile/picture', 'ProfileController@profilePicture')->name('profile.picture');

    Route::post('users/deactivate/{id}', 'UserController@deactivate')->name('users.deactivate');
    Route::post('users/activate/{id}', 'UserController@activate')->name('users.activate');
    Route::resource('users', 'UserController');
    // Route::get('pejabat/detailpejabat/','Pejabat\PejabatController@show')->name('pejabat.show');
    Route::resource('pejabat','Pejabat\PejabatController');
    Route::get('pejabat/edit/{id}','Pejabat\PejabatController@edit');
    Route::post('pejabat/update/{id}',array('as' => 'pejabat.update', 'uses' => 'Pejabat\PejabatController@update'));

    Route::get('pejabat/show/{id}','Pejabat\PejabatController@show');

    Route::get('pejabat/destroy/{id}','Pejabat\PejabatController@destroy');
    // Route::get('pejabat','Pejabat\PejabatController@show')->name('pejabat.show');
    // Route::get('pejabat/tambah','Pejabat\PejabatController@tambah')->name('pejabat.tambah');
    // // Route::get('pejabat/simpan','Pejabat\Controller@simpan')->name('pejabat.tambah.simpan');
    // Route::get('pejabat/detailpejabat','Pejabat\PejabatController@detailpejabat')->name('pejabat.detailpejabat');
    // Route::get('pejabat/edit/{id}','Pejabat\PejabatController@edit')->name('pejabat.edit');
    // Route::get('pejabat/{id}/hapus','Pejabat\PejabatController@hapus')->name('pejabat.hapus');
    // Route::put('pejabat/{id}/simpanedit','Pejabat\PejabatController@simpanedit')->name('pejabat.simpanedit');
    // Route::get('/', function () {
    // return view('show');
    // });

});

Route::get('image/{type}/{id}', 'FileController@image')->name('get.image');
