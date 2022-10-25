<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;

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
//guest
Route::middleware('guest')->group(function(){
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate']);
    Route::get('/', function () {return view('home');});

    Route::get('/about', function () {return view('about');});

    Route::get('/projects', function () {return view('projects');});

    Route::get('/contact', function () {return view('contact');});

});

//admin

Route::middleware('auth')->group(function(){
    //dashboard
    Route::resource('dashboard', DashboardController::class);

    //master-siswa
    Route::get('master-siswa/{id_siswa}/hapus', [SiswaController::class, 'hapus'])->name('master-siswa.hapus');
    Route::resource('master-siswa', SiswaController::class);

    //master-project
    Route::get('master-project/create/{id_siswa}', [ProjectController::class, 'tambah'])->name('master-project.tambah');
    Route::get('master-project/{id_siswa}/hapus', [ProjectController::class, 'hapus'])->name('master-project.hapus');
    Route::resource('master-project', ProjectController::class);

    //master-contact
    Route::get('master-contact/create/{id_siswa}', [ContactController::class, 'tambah'])->name('master-contact.tambah');
    Route::get('master-contact/{id_siswa}/hapus', [ContactController::class, 'hapus'])->name('master-contact.hapus');
    Route::resource('master-contact', ContactController::class);

    //jenis-contact
    Route::post('master-contact/storejenis', [ContactController::class, 'storejenis'])->name('master-contact.storejenis');
    Route::put('master-contact/updatejenis/{id_jenis_contact}', [ContactController::class, 'updatejenis'])->name('master-contact.updatejenis');
    Route::get('master-contact/editjenis/{id_jenis_contact}', [ContactController::class, 'editjenis'])->name('master-contact.editjenis');
    Route::get('master-contact/{id_jenis_contact}/hapusjenis', [ContactController::class, 'hapusjenis'])->name('master-contact.hapusjenis');

    //logout
    Route::post('logout', [LoginController::class, 'logout']);
});

Route::get('/register', function() {
    return view('register');
});