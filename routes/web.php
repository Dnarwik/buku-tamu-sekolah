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

/**
 * Front End Route
 */

Route::get('/', 'WelcomeController@index')->name('welcome'); //Halaman Utama
Route::post('/welcome/insert', 'WelcomeController@insert')->name('welcome.insert'); //Tambah buku di halaman utama
                
/**
 * Admin Route
 */

Route::prefix('admin')->group(function(){    
    //Admin Login
    Route::get('/login', 'AdminUserController@index')->name('login');
    Route::post('/login', 'AdminUserController@store');
    
    //Perlu Auth Admin
    Route::middleware('auth:admin')->group(function(){
        //Dashboard Admin
        Route::get('/', 'DashboardController@index');

        //Agenda Sekolah Admin
        Route::get('/agenda', 'AgendaController@index')->name('agenda'); //Halaman index
        Route::get('/agenda/edit/{id}', 'AgendaController@edit')->name('agenda.edit'); //Halaman edit
        Route::post('/agenda/insert', 'AgendaController@insert')->name('agenda.insert'); //Tambah agenda
        Route::patch('/agenda/update/{id}', 'AgendaController@update')->name('agenda.update'); //Update agenda
        Route::delete('/agenda/delete/{id}', 'AgendaController@delete')->name('agenda.delete'); //Hapus agenda

        //Buku Tamu Sekolah Admin
        Route::get('/buku', 'BukuController@index')->name('buku'); //Halaman index
        Route::get('/buku/edit/{id}', 'BukuController@edit')->name('buku.edit'); //Halaman edit
        Route::post('/buku/insert', 'BukuController@insert')->name('buku.insert'); //Tambah buku
        Route::patch('/buku/update/{id}', 'BukuController@update')->name('buku.update'); //Update buku
        Route::delete('/buku/delete/{id}', 'BukuController@delete')->name('buku.delete'); //Hapus buku

        //Logout Admin
        Route::get('/logout','AdminUserController@logout');
    });
    
}); 


