<?php

use App\Http\Controllers\Cert\User\indexUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cert\Controller01;
use App\Http\Controllers\ControllAkun;
use App\Http\Controllers\loginConrtol;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//route::get("/add", function(){return view("Cert/Akun/Admin");});

//route::get('/vAdmin',[ControllAkun::class,'DataAdmin'])->name('/akun/admin');

Route::get('/chart-1', [Controller01::class, 'chart'])->name('chart-1'); //api untuk chart



Route::get('/', [loginConrtol::class, 'login']); //login = class di loginControl
Route::any('akses', [loginConrtol::class, 'akseslogin'])->name('akses');
Route::get('/logout', [loginConrtol::class, 'logout'])->name('logout');

Route::middleware(['FilterRole:Admin'])->group(function () {

    Route::controller(Controller01::class)->group(function () {
        Route::get('/index', 'viewChart'); //halaman utama
        Route::get('/test-1', 'indexCert')->name('dashboard');
        Route::get('/search', 'cariData');

        Route::get('/lihatPDF/{file}', 'viewCert')->name('download');
        Route::post('/tambahData', 'tambahData'); //proses tambah data
        route::get('/FormDataBaru', 'FormDataBaru'); //form tambah data
        route::get('/detailCert/{token}', 'detailCert');
        route::get('/detailCert/{token}/edit', 'editData');
        route::post('/updateData/{token}', 'updateData');
        route::get('/hapusData/{token}', 'hapusData');
    });
    Route::controller(ControllAkun::class)->group(function () {

        //admin
        route::get('/vAdmin', 'DataAdmin')->name('akun/admin');
        Route::get('/vAdmin/add/{role}', 'BuatAkun')->name('BuatAkun');
        route::post('/vAdmin/add/proses', 'AddDataAkun')->name('admin/add'); //Route untuk add data user dan admin
        Route::get('/vAdmin/edit/{id}', 'EditAkun')->name('EditAkun');
        route::post('/admin/update/{id}', 'UpdateDataAkun');
        Route::get('/vAdmin/delete/{id}', 'DeleteDataAkun')->name('DeleteAkun');
        //user
        route::get('/vUser', 'DataUser')->name('vUser');
        Route::get('/vUser/add/{role}', 'BuatAkun')->name('BuatAkun');
        Route::get('/vUser/edit/{id}', 'EditAkunUser')->name('EditAkun/User');
        route::post('/vUser/update/{id}', 'UpdateDataUser');
        Route::get('/vUser/delete/{id}', 'DeleteDataAkun')->name('DeleteAkun');
    });
});
//route user
Route::middleware(['FilterRole:User'])->group(function () {
    Route::controller(indexUser::class)->group(function () {
        Route::get('/user/dashboard', 'index');
        Route::get('user/detailCert/{token}', 'UserDetailCert');
        Route::get('/lihatPDFu/{file}', 'viewCert');
        Route::get('/searchUser', 'userCari');
    });
});
