<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrintCardController;
use App\Http\Controllers\TenantDataController;
use App\Http\Controllers\TenantMembersController;
use App\Http\Controllers\LandingController;
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

// Route::get('/', function () {
//     return view('landing-page.landing');
// });

Route::get('/', [LandingController::class, 'landing'])->name('landing');
Route::get('/exportlaporan', [LandingController::class, 'cetak_pdf'])->name('exportlaporan');

//---------Login dan Logout--------------//
//Route untuk menampilkan halaman form login
Route::get('/login', [LoginController::class, 'halamanlogin'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//Route untuk mengirimkan data login
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('post.login');

//----Route group untuk halaman yang bisa diakses oleh Role Super Admin dan Admin----//
Route::group(['middleware' => ['auth:user', 'checkrole:Super Admin,Admin']], function () {
    Route::get('/dashboard/admin', [DashboardController::class, 'homeadmins'])->name('dashboard.admins');

    // CRUD Akun Tenant
    Route::get('/admin/akun-tenant', [AdminController::class, 'indextenant'])->name('admins.tenants.account');
    Route::get('/admin/create-tenant', [AdminController::class, 'createTenant'])->name('admins.tenants.create');
    Route::post('/admin/create-tenant', [AdminController::class, 'storeTenant'])->name('admins.tenants.store');
    Route::get('/admin/edit-tenant/{id}', [AdminController::class, 'editTenant'])->name('admins.tenants.edit');
    Route::put('/admin/update-tenant/{id}', [AdminController::class, 'updateTenant'])->name('admins.tenants.update');
    Route::delete('/admin/hapus-tenant/{id}', [AdminController::class, 'destroyTenant'])->name('admins.tenants.destroy');
    Route::get('/detail-data-tenant/{id}', [AdminController::class, 'showDetails'])->name('tenants.show.details');

    // GET DATA TENANT MEMBERS
    Route::get('/data/member-tenant', [AdminController::class, 'tenantMembers'])->name('data.tenant.members');
    Route::get('/detail-member-tenant/{id}', [AdminController::class, 'showDetailsTenant'])->name('detail.tenant.members');

    // BACKGROUND CARD CHANGE
    Route::get('/data/change-id-card', [AdminController::class, 'changeIdCard'])->name('background.card.change');
    Route::post('/data/change-id-card', [AdminController::class, 'storeCard'])->name('background.card.change.store');

    // REGISTRASI DAN VALIDASI
    Route::get('/data-registrasi', [AdminController::class, 'registration'])->name('admins.registration');
    Route::get('/data-registrasi/{id}', [AdminController::class, 'registrationDetail'])->name('registration.detail');
    Route::get('/data-tervalidasi', [AdminController::class, 'validation'])->name('admins.validation');
    Route::get('/data-tervalidasi/{id}', [AdminController::class, 'validationDetail'])->name('validation.detail');
    Route::get('/update/status-validasi-success/{id}', [AdminController::class, 'statusSuccess'])->name('status.success');
    Route::get('/update/validasi', [AdminController::class, 'registration'])->name('update.validated');
    Route::put('update/status-validasi-failed/{id}', [AdminController::class, 'statusFailed'])->name('status.failed');
    Route::get('/export-pdf', [AdminController::class, 'validatedPdf'])->name('admin.export-pdf');
    Route::get('/export-profile-tenant-pdf', [AdminController::class, 'profileTenantPDF'])->name('admin.profile-pdf');
    Route::get('/export-excel', [AdminController::class, 'validateExcel'])->name('admin.export-excel');
    Route::get('/export-profile-excel', [AdminController::class, 'profileExcel'])->name('admin.export-profile-excel');
});

//----Route group untuk halaman yang bisa diakses oleh Role Super Admin----//
Route::group(['middleware' => ['auth:user', 'checkrole:Super Admin']], function () {
    Route::get('/superadmin/akun-admin', [AdminController::class, 'akunAdmin'])->name('superadmin.admin.account');
    Route::get('/superadmin/create-admin', [AdminController::class, 'createAdmin'])->name('superadmin.admin.create');
    Route::post('/superadmin/create-admin', [AdminController::class, 'storeAdmin'])->name('superadmin.admin.store');
    Route::get('/superadmin/edit-admin/{id}', [AdminController::class, 'editAdmin'])->name('superadmin.admin.edit');
    Route::put('/superadmin/update-admin/{id}', [AdminController::class, 'updateAdmin'])->name('superadmin.admin.update');
    Route::delete('/superadmin/hapus-admin/{id}', [AdminController::class, 'destroyAdmin'])->name('superadmin.admin.destroy');
    Route::get('/export/admin-pdf', [AdminController::class, 'adminPDF'])->name('export-admin-pdf');
    Route::get('/export/admin-excel', [AdminController::class, 'adminExcel'])->name('export-admin-excel');
});

//----Route group untuk halaman yang bisa diakses oleh Role Tenant----//
Route::group(['middleware' => ['auth:tenant', 'checkrole:Tenant']], function () {
    Route::get('/home/tenant', [DashboardController::class, 'hometenants'])->name('home.tenants');
    // Route::get('/registrasi', [TenantMembersController::class, 'regist'])->name('home.registration');
    Route::get('/registrasi/kartu', [TenantMembersController::class, 'create'])->name('members.registration');
    Route::post('/registrasi/kartu', [TenantMembersController::class, 'store'])->name('members.registration.store');
    Route::get('/registrasi/validasi-data', [TenantMembersController::class, 'index'])->name('members.validation');
    Route::get('/detail-data/{id}', [TenantMembersController::class, 'showDetails'])->name('show.detail.tenant.members');
    Route::get('/member/edit-data/{id}', [TenantMembersController::class, 'editMember'])->name('members.edit');
    Route::post('/member/update-data/{id}', [TenantMembersController::class, 'updateMember'])->name('members.update');
    Route::get('/registrasi/print-data', [TenantMembersController::class, 'print'])->name('members.print');
    Route::get('/informasi-kartu', [TenantMembersController::class, 'cardInfo'])->name('tenants.cardInfo');
    Route::get('/syarat-ketentuan', [TenantMembersController::class, 'terms'])->name('tenants.terms');
    Route::get('/print-tenant-pdf/{id}', [TenantMembersController::class, 'tenantPdf'])->name('tenants.print.pdf');
    Route::get('/cetak-id-card/{id}', [PrintCardController::class, 'idCard'])->name('tenants.print.idcard');

    //----Route untuk halaman profile tenant----//
    Route::get('/profile/tenant', [TenantDataController::class, 'indexProfile'])->name('profile.tenant.index');
    Route::get('/profile/tenant/edit', [TenantDataController::class, 'editProfile'])->name('profile.tenant.edit');
    Route::put('/profile/update-tenant/{id}', [TenantDataController::class, 'updateProfile'])->name('profile.tenant.update');

});
