<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\LogoutController;
use App\Http\Controllers\User\PaymentController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\Admin\HomeController as AdminHome;
use App\Http\Controllers\Admin\LoginController as AdminLogin;
use App\Http\Controllers\Admin\LogoutController as AdminLogout;
use App\Http\Controllers\Admin\PaymentsController as PaymentData;
use App\Http\Controllers\Admin\StudentTableController as StudentData;

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

Route::group(['middleware' => 'prevent-back-history'], function () {
    /**
     * Routes for the Student.
     */
    Route::get('/', function () {
        return redirect()->route('login');
    });
    /**
     * Routes for the Student to Login to their Account.
     */
    Route::controller(LoginController::class)->group(function () {
        Route::get('/auth/login', 'index')->name('login')->middleware('guest');
        Route::post('/auth/login', 'store')->name('login');
    });
    /**
     * Routes for Student Registration to Health Insurace System.
     */
    Route::controller(RegisterController::class)->group(function () {
        Route::get('/auth/register', 'index')->name('register')->middleware('guest');
        Route::post('/auth/register', 'store')->name('register');
    });
    /**
     * Authorized the Dashboard of the Students Account.
     */
    Route::middleware('auth')->group(function () {
        /**
         * Routes to Dashboard of the Students Account.
         */
        Route::controller(HomeController::class)->group(function () {
            Route::get('/auth/home', 'index')->name('home');
        });
        /**
         * Routes to Profile of the Students Account.
         */
        Route::controller(ProfileController::class)->group(function () {
            Route::get('/auth/profile', 'index')->name('profile');
            Route::post('/auth/update/{id}', 'update')->name('profile.update');
        });
        /**
         * Routes to Dashboard of the Students Account.
         */
        Route::controller(PaymentController::class)->group(function () {
            Route::get('/auth/purchases', 'index')->name('purchases');
        });
        /**
         * Routes to Logout the Students Account.
         */
        Route::controller(LogoutController::class)->group(function () {
            Route::post('/auth/logout', 'logout')->name('logout');
        });
    });

    /**
     * Routes for Administrator and AdminLogin
     */
    Route::controller(AdminLogin::class)->group(function () {
        Route::get('/admin/login', 'index')->name('admin.login')->middleware('guest:admin');
        Route::post('/admin/login', 'store')->name('admin.login');
    });
    /**
     * Authorized to Dashboard of the Administrators Account.
     */
    Route::middleware('auth:admin')->group(function () {
        /**
         * Routes to Dashboard of the Administrators Account.
         */
        Route::controller(AdminHome::class)->group(function () {
            Route::get('/admin/home', 'index')->name('admin.home');
        });
        /**
         * Routes to Students Table.
         */
        Route::controller(StudentData::class)->group(function () {
            Route::get('/admin/student/data', 'index')->name('admin.student.table');
            Route::get('/admin/student/search', 'search')->name('admin.search.student');
            Route::get('/admin/student/delete/{id}', 'destroy')->name('admin.student.destroy');
        });
        /**
         * Routes to Payments Table.
         */
        Route::controller(PaymentData::class)->group(function () {
            Route::get('/admin/payments/data', 'index')->name('admin.payments.table');
            Route::post('/admin/store/{id}', 'store')->name('admin.payments.store');
            Route::get('/admin/payments/search/data', 'search')->name('admin.payments.search');
        });
        /**
         * Routes to Logout the Administrators Account.
         */
        Route::controller(AdminLogout::class)->group(function () {
            Route::post('/admin/logout', 'logout')->name('admin.logout');
        });
    });
});
