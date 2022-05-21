<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;

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
//     return view('welcome');
// });

// Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function() {
//     Route::get('/login', [AdminController::class, 'loginForm']);
//     Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
// });

Route::middleware('admin:admin')->group(function() {
    Route::get('admin/login', [AdminController::class, 'loginForm'])->name('admin.login.form');
    Route::post('admin/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', config('jetstream.auth_session'), 'verified'])
    ->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.index');
        })->name('dashboard')->middleware('auth:admin');
});

/* ---------------------------- Admin all Routes ---------------------------- */

Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');
Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePass'])->name('admin.change.pass');
Route::post('/update/change/password', [AdminProfileController::class, 'AdminUpdateChangePass'])->name('update.change.pass');


/* ----------------------------- User all route ----------------------------- */
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->group(function () {
        Route::get('/dashboard', function () {
            $id = Auth::user()->id;
            $user = \App\Models\User::find($id);
            return view('dashboard', compact('user'));
        })->name('dashboard');
});

Route::get('/', [IndexController::class, 'index']);
Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');
Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');
Route::get('/user/change/password', [IndexController::class, 'UserChangePassword'])->name('change.password');
Route::post('/user/password/update', [IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');
/* -------------------------------------------------------------------------- */
/*                             Additional install                             */
/* -------------------------------------------------------------------------- */
/**
 * (muncul warning saat compile)
 * npm install autoprefixer@10.4.5 --save-exact
 * vendor\laravel\fortify\src\Http\Responses\LogoutResponse.php >> route saat logout
 * config\auth.php >> tambah guard, provider, password admin
 */