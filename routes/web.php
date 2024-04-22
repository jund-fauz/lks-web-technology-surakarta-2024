<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Ormas;

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

Route::middleware("logged-in")->group(function () {
    Route::get('/admin-dashboard', function () {
        return view('admin-dashboard', ['user' => User::where('id_user', $_COOKIE['id'])->first(), 'ormas' => Ormas::all(), 'kelurahan' => Kelurahan::all(), 'kecamatan' => Kecamatan::all()]);
    })->middleware('admin-only');
    Route::get('/', function () {
        if (User::where('id_user', $_COOKIE['id'])->first()->level === 'Admin') {
            return redirect('/admin-dashboard');
        } else {
            return redirect('/dashboard');
        }
    });
    Route::middleware('user-only')->group(function () {
        Route::get('/dashboard', function () {
            return view('user-dashboard', ['user' => User::where('id_user', $_COOKIE['id'])->first(), 'ormas' => Ormas::all()]);
        });
        Route::get('/user', function () {
            return view('edit-user', ['user' => User::where('id_user', $_COOKIE['id'])->first()]);
        });
        Route::get('/user/edit', [UserAuthController::class,'update']);
    });
    Route::get('/logout', [UserAuthController::class, 'logout']);
});

Route::middleware('guest')->group(function () {
    Route::get("/login", function () {
        return view('login');
    })->name("login");
    Route::post("/login", [UserAuthController::class, 'inputLogin']);
});
