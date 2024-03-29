<?php
use App\Http\Controllers\AkunController;
use App\Http\Controllers\AkunPMController;
use App\Http\Controllers\DaftarMobilADController;
use App\Http\Controllers\DaftarMobilPMController;
use App\Http\Controllers\DashboardPMController;
use App\Http\Controllers\DashboardADController;
use App\Http\Controllers\DashboardPLController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InformasiMobilADController;
use App\Http\Controllers\InformasiPembayaranAD;
use App\Http\Controllers\LandingPageControllerPL;
use App\Http\Controllers\ListMobilController;
use App\Http\Controllers\ListMobilControllerPL;
use App\Http\Controllers\ManajemenPembayaranADController;
use App\Http\Controllers\ManajemenPembayaranPMController;
use App\Http\Controllers\ManajemenUlasanAD;
use App\Http\Controllers\ManajemenUlasanPM;
use App\Http\Controllers\PagePembayaranController;
use App\Http\Controllers\PemilikMobilController;
use App\Http\Controllers\LandingPageController;

use App\Http\Controllers\TransaksiPembayaranAD;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Tampilan form login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('formlogin.index');
// Proses login
Route::post('/login', [AuthController::class, 'login'])->name('login');
// Tampilan form register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('formregister.index');
// Proses registrasi
Route::post('/register', [AuthController::class, 'register'])->name('register');
// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('/pemilik-mobil')->middleware(['auth', 'checkrole:pemilik_mobil'])->group(function () {
    // Rute yang hanya dapat diakses oleh pemilik mobil
    Route::get('/dashboard', [DashboardPMController::class, 'index'])->name('pemilik-mobil.dashboardpm.index');
    Route::get('/daftar-mobil', [DaftarMobilPMController::class, 'index'])->name('pemilik-mobil.daftarmobilpm.index');
    Route::get('/daftar-mobil/tambah', [DaftarMobilPMController::class, 'tambah'])->name('pemilik-mobil.daftarmobilpm.tambah');
    Route::post('/daftar-mobil/simpan', [DaftarMobilPMController::class, 'simpan'])->name('pemilik-mobil.daftarmobilpm.simpan');
    //Rute manage user pemilik mobil
    Route::get('/manage-user', [PemilikMobilController::class, 'index'])->name('pemilik-mobil.pemilikmobil.index');
    Route::get('/manage-user/tambah', [PemilikMobilController::class, 'tambah'])->name('pemilik-mobil.penggunapm.tambah');
    Route::post('/manage-user/simpan', [PemilikMobilController::class, 'simpan'])->name('penggunapm.simpan');
    Route::get('/manage-user/edit/{id}', [PemilikMobilController::class, 'edit'])->name('penggunapm.edit');
    Route::post('/manage-user/edit/{id}', [PemilikMobilController::class, 'update'])->name('penggunapm.update');
    Route::delete('/manage-user/destroy/{id}', [PemilikMobilController::class, 'destroy'])->name('penggunapm.destroy');
    //Rute Manage pembayaran pemilik mobil
    Route::get('/manage-pembayaran', [ManajemenPembayaranPMController::class, 'index'])->name('pemilik-mobil.manajemenpembayaranpm.index');

    //Rute Manage ulasan pemilik mobil
    Route::get('/manage-ulasan', [ManajemenUlasanPM::class, 'index'])->name('pemilik-mobil.ulasanpm.index');

});

Route::prefix('/admin')->middleware(['auth', 'checkrole:admin'])->group(function () {
    // Rute yang hanya dapat diakses oleh Admin
    Route::get('/dashboard', [DashboardADController::class, 'index'])->name('admin.dashboardad.index');
    //Rute manage user admin
    Route::get('/manage-user', [AkunController::class, 'index'])->name('pengguna.index');
    Route::get('/manage-user/tambah', [AkunController::class, 'tambah'])->name('pengguna.tambah');
    Route::post('/manage-user/simpan', [AkunController::class, 'simpan'])->name('pengguna.simpan');
    Route::get('/manage-user/edit/{id}', [AkunController::class, 'edit'])->name('pengguna.edit');
    Route::post('/manage-user/edit/{id}', [AkunController::class, 'update'])->name('pengguna.update');
    Route::delete('/manage-user/destroy/{id}', [AkunController::class, 'destroy'])->name('pengguna.destroy');
    //Rute manage mobil admin
    Route::get('/manage-mobil', [DaftarMobilADController::class, 'index'])->name('mobilad.index');
    Route::post('/manage-mobil/simpan', [DaftarMobilADController::class, 'simpan'])->name('mobilad.simpan');
    Route::delete('/manage-mobil/destroy{id}', [DaftarMobilADController::class, 'destroy'])->name('mobilad.destroy');

    //Rute informasi mobil admin
    Route::get('/manage-informasi-mobil', [InformasiMobilADController::class, 'index'])->name('informasimobilad.index');
    //Rute pembayaran mobil admin
    Route::get('/manage-pembayaran', [ManajemenPembayaranADController::class, 'index'])->name('manajemenpembayaranad.index');
    //Rute transaksi pembayaran mobil admin
    Route::get('/manage-riwayat-transaksi', [TransaksiPembayaranAD::class, 'index'])->name('transaksipembayaranad.index');
    //Rute ulasan mobil admin
    Route::get('/manage-ulasan', [ManajemenUlasanAD::class, 'index'])->name('ulasanad.index');
});

Route::prefix('/pelanggan')->middleware(['auth', 'checkrole:pelanggan'])->group(function () {
    // Rute Web Page
    Route::get('/', [LandingPageControllerPL::class, 'index'])->name('pelanggan.landingpage.index');
    Route::get('/list-mobil', [ListMobilControllerPL::class, 'index'])->name('pelanggan.list-mobil.index');
    Route::get('/Page-Pembayaran', [PagePembayaranController::class, 'index'])->name('pelanggan.page-pembayaran.index');
    // Rute yang hanya dapat diakses oleh Pelanggan
    Route::get('/dashboard', [DashboardPLController::class, 'index'])->name('pelanggan.dashboardpl.index');
});

Route::prefix('')->group(function () {
    Route::get('/', [LandingPageController::class, 'index'])->name('landingpage.index');
});

Route::prefix('List-Mobil')->group(function () {
    Route::get('/', [ListMobilController::class, 'index'])->name('list-mobil.index');
});