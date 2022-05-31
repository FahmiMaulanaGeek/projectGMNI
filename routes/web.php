<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KaderController;
use App\Http\Controllers\KetuaController;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();
Route::get('/addLibray', [AdminController::class,'showLibrary'])->name('addLibrary');
Route::post('/upload/proses', 'UploadController@proses_upload');

Route::group(['prefix'=>'admin', 'middleware'=>['roleAdmin','auth']], function(){
    Route::get('admin', [AdminController::class, 'index'])->name('isAdmin');
    Route::get('register/admin', [RegisterController::class, 'showRegisterAdmin'])->name('registerAdmin');
    Route::post('register/admin', [RegisterController::class, 'registerAdmin'])->name('registerAdmin');    
    Route::get('register/ketua', [RegisterController::class, 'showRegisterKetua'])->name('registerKetua');
    Route::post('register/ketua', [RegisterController::class, 'registerKetua'])->name('registerKetua');
    Route::get('register/kader', [RegisterController::class, 'showRegisterKader'])->name('registerKader');
    Route::post('register/kader', [RegisterController::class, 'registerKader'])->name('registerKader');
    Route::get('schedule', [AdminController::class, 'showSchedule'])->name('adminSchedule'); 
    Route::get('schedule/{id}', [AdminController::class, 'showDetailSchedule'])->name('admin-detail-schedule');
    Route::post('schedule', [AdminController::class, 'addSchedule'])->name('adminSchedule');  
    Route::get('request', [AdminController::class, 'showRequest'])->name('adminRequest');
    Route::post('request', [AdminController::class, 'addRequest'])->name('adminRequest');
    Route::get('add/dpk', [AdminController::class, 'showDpk'])->name('addDpk');
    Route::post('add/dpk', [AdminController::class, 'addDpk'])->name('addDpk');
    Route::get('add/library', [AdminController::class, 'showLibrary'])->name('showLibrary');
    Route::post('add/library', [AdminController::class, 'addLibrary'])->name('addLibrary');
    Route::get('download/library/dokumen={dokumen}', [AdminController::class, 'downloadLibrary'])->name('downloadLibrary');
    Route::get('add/aktivitas', [AdminController::class, 'showAktivitas'])->name('addAktivitas');
    Route::post('add/aktivitas', [AdminController::class, 'addAktivitas'])->name('addAktivitas');
    Route::get('explore', [AdminController::class, 'showExplore'])->name('adminExplore');
    Route::get('explore/dpk/detail/{id}', [AdminController::class, 'showDetailDpk'])->name('admin-detailDpk');
    Route::get('explore/dpk/detail/anggota/{id}', [AdminController::class, 'showAnggotaDpk'])->name('anggotaDpk');
    Route::get('request', [AdminController::class, 'showRequest'])->name('accRequest');
    Route::post('request', [AdminController::class, 'accRequest'])->name('accRequest');
    Route::get('daftar/library', [HomeController::class, 'showLibrary'])->name('admin-home-showLibrary');
    Route::get('database',[AdminController::class,'showDatabase'])->name('admin-showDatabase');
    Route::get('add/administration', [AdminController::class, 'showAdministration'])->name('showAdministration');
    Route::post('add/administration', [AdminController::class, 'addAdministration'])->name('addAdministration');
    Route::get('download/administration/image={image}', [AdminController::class, 'downloadAdministration'])->name('downloadAdministration');
    Route::get('daftar/administrasi', [AdminController::class, 'showRequestAdministration'])->name('admin-accAdministration');
    Route::post('daftar/administrasi', [AdminController::class, 'accAdministration'])->name('admin-accAdministration');
    Route::get('komencoba', [AdminController::class, 'komencoba'])->name('komencoba');
    Route::get('add/berita', [AdminController::class, 'showBerita'])->name('showBerita');
    Route::post('add/berita', [AdminController::class, 'addBerita'])->name('addBerita');
    Route::get('download/sk/image={image}', [AdminController::class, 'skDPK'])->name('skDPK');
   
    
    
   

});

Route::group(['prefix'=>'ketua', 'middleware'=>['roleKetua','auth']], function(){
    Route::get('ketua', [KetuaController::class, 'index'])->name('isKetua');
    Route::get('schedule', [KetuaController::class, 'showSchedule'])->name('showScheduleKetua');
    Route::get('explore', [KetuaController::class, 'showExplore'])->name('ketuaExplore');
    Route::get('add/aktivitas', [KetuaController::class, 'showAktivitas'])->name('addAktivitasKetua');
    Route::post('add/aktivitas', [KetuaController::class, 'addAktivitas'])->name('addAktivitasKetua');
    Route::get('daftar/library', [HomeController::class, 'showLibrary'])->name('ketua-home-showLibrary');
    Route::get('explore/dpk/detail/{id}', [KetuaController::class, 'showDetailDpk'])->name('ketua-detailDpk');
    Route::get('explore/dpk/detail/anggota/{id}', [KetuaController::class, 'showAnggotaDpk'])->name('ketua-anggotaDpk');
    Route::get('database',[KaderController::class,'showDatabase'])->name('ketua-showDatabase');
    Route::get('add/administration', [KetuaController::class, 'showAdministration'])->name('ketua-showAdministration');
    Route::post('add/administration', [KetuaController::class, 'addAdministration'])->name('ketua-addAdministration');
    Route::get('download/administration/dokumen={dokumen}', [KetuaController::class, 'downloadAdministration'])->name('ketua-downloadAdministration');
    
    // Route::get('download/library/dokumen={dokumen}', [AdminController::class, 'downloadLibrary'])->name('downloadLibrary');
});


    Route::group(['prefix'=>'kader', 'middleware'=>['roleKader','auth']], function(){
    Route::get('kader', [KaderController::class, 'index'])->name('isKader');
    Route::get('schedule', [KaderController::class, 'showSchedule'])->name('kader-showSchedule');
    Route::get('explore', [KaderController::class, 'showExplore'])->name('kaderExplore');
    Route::get('daftar/library', [HomeController::class, 'showLibrary'])->name('kader-home-showLibrary');
    Route::get('explore/dpk/detail/{id}', [KaderController::class, 'showDetailDpk'])->name('kader-detailDpk');
    Route::get('explore/dpk/detail/anggota/{id}', [KaderController::class, 'showAnggotaDpk'])->name('kader-anggotaDpk');
    Route::get('download/library/dokumen={dokumen}', [KaderController::class, 'downloadLibrary'])->name('kader-downloadLibrary');
    Route::get('database',[KaderController::class,'showDatabase'])->name('kader-showDatabase');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('tentang', [HomeController::class, 'tentanggmni'])->name('tentang');