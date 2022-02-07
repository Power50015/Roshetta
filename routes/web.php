<?php

use App\Http\Controllers\ClincController;
use App\Http\Controllers\DoctorAuthenticatedSessionController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserAuthenticatedSessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\PasswordController;
use Laravel\Fortify\Http\Controllers\ProfileInformationController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

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

Route::get('/', [IndexController::class, 'indexView'])->name('home');


/*
|--------------------------------------------------------------------------
| Doctor Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'doctor'], function () {
    Route::group(['middleware' => ['doctor:doctor']], function () {
        Route::get('/login', [DoctorAuthenticatedSessionController::class, 'create'])->name('doctor.loginView');
        Route::post('/login', [DoctorAuthenticatedSessionController::class, 'store'])->name('doctor.login');

        // Registration...
        Route::get('/register', [DoctorAuthenticatedSessionController::class, 'registerView'])
            ->middleware(['guest:' . config('fortify.guard')])
            ->name('doctor.registerView');

        Route::post('/register', [DoctorAuthenticatedSessionController::class, 'registerstore'])
            ->middleware(['guest:' . config('fortify.guard')]);
    });

    Route::group(['middleware' => ['auth:sanctum,doctor', 'verified']], function () {
        Route::get('/dashboard', function () {
            return view('doctors.dashboard');
        })->name('doctor.dashboard');
        Route::get('profile', [DoctorController::class, 'profileView'])
            ->name('doctor.profile');
        Route::put('/doctor/profile-img', [DoctorController::class, 'profileImgUpdate'])->name('doctor-profile-img.update');
        Route::delete('/doctor/profile-img', [DoctorController::class, 'profileImgDelete'])->name('doctor-profile-img.delete');
        Route::put('/doctor/profile-information', [DoctorController::class, 'update'])
            ->name('doctor-profile-information.update');
        Route::get('/clinc', [ClincController::class, 'index'])->name('clinc.index');
        Route::post('/clinc', [ClincController::class, 'store'])->name('clinc.store');
        Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule.index');
        Route::post('/schedule', [ScheduleController::class, 'store'])->name('schedule.store');
    });
});




/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

// Overwrite Fortify
Route::group(['middleware' => config('fortify.middleware', ['web'])], function () {
    $enableViews = config('fortify.views', true);

    // Authentication...
    if ($enableViews) {
        Route::get('/login', [UserAuthenticatedSessionController::class, 'loginView'])
            ->middleware(['guest:' . config('fortify.guard')])
            ->name('user.login');
    }

    $limiter = config('fortify.limiters.login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware(array_filter([
            'guest:' . config('fortify.guard'),
            $limiter ? 'throttle:' . $limiter : null,
        ]));

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    // Registration...

    if ($enableViews) {
        Route::get('/register', [UserAuthenticatedSessionController::class, 'registerView'])
            ->middleware(['guest:' . config('fortify.guard')])
            ->name('user.register');
    }

    Route::post('/register', [RegisteredUserController::class, 'store'])
        ->middleware(['guest:' . config('fortify.guard')]);



    // Profile Information...
    Route::put('/profile-img', [UserAuthenticatedSessionController::class, 'profileImgUpdate'])
        ->middleware([config('fortify.auth_middleware', 'auth') . ':' . config('fortify.guard')])
        ->name('user-profile-img.update');
    Route::delete('/profile-img', [UserAuthenticatedSessionController::class, 'profileImgDelete'])
        ->middleware([config('fortify.auth_middleware', 'auth') . ':' . config('fortify.guard')])
        ->name('user-profile-img.delete');

    Route::put('/password', [PasswordController::class, 'update'])
        ->middleware([config('fortify.auth_middleware', 'auth') . ':' . config('fortify.guard')])
        ->name('user-password.update');
    Route::put('/profile-information', [ProfileInformationController::class, 'update'])
        ->middleware([config('fortify.auth_middleware', 'auth') . ':' . config('fortify.guard')])
        ->name('user-profile-information.update');
});

// Overwrite Jetstream Routes
Route::group(['middleware' => config('jetstream.middleware', ['web'])], function () {

    Route::group(['middleware' => ['auth', 'verified']], function () {
        // User & Profile...
        Route::get('/user/profile', [UserAuthenticatedSessionController::class, 'profileView'])
            ->name('profile.show');
    });
});



// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',  [DoctorController::class, 'dashbordView'])->name('dashboard');
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/dashboard',  [UserController::class, 'dashbordView'])->name('dashboard');
    Route::post('/dashboard',  [UserController::class, 'dashbordView'])->name('doctor.search');
    Route::get('/doctorprofile/{id}',  [UserController::class, 'showProfile']);
});
