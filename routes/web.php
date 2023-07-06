<?php

use App\Http\Controllers\Api\PermissionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Requests\Dashboard\GetDashboardRequest;

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

Route::get('/', function () { // 1
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/auth', [AuthController::class, 'login'])->name('auth');
    Route::post('/login', [AuthController::class, 'postLogin'])->name('login');
    Route::post('/register', [AuthController::class, 'postRegister'])->name('register');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard_page');
    Route::get('/admin', [DashboardController::class, 'admin'])->name('admin_page');
    Route::get('/permission', [DashboardController::class, 'permission'])->name('permission_page');
    Route::get('/role1', [DashboardController::class, 'role1'])->name('role1_page');
    Route::get('/role2', [DashboardController::class, 'role2'])->name('role2_page');

    Route::post('/logout', [AuthController::class, 'postLogout'])->name('logout');
    Route::get('/logout', [AuthController::class, 'postLogout'])->name('get_logout');

    Route::get('/api/permission/{role}', [PermissionController::class, 'permission'])->name('api.permission_by_role');
    Route::post('/api/permission/', [PermissionController::class, 'postPermission'])->name('api.post_permission');
});