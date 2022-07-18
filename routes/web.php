<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

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

Route::get('/admin', function () {
    return view('backend/pages/home');
})->name('admin');

/** Register Route */
Route::get('/register', function () { return view('backend/auth/pages/register'); })->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::get('/login', function () {
    return view('backend/auth/pages/login');
})->name('login');



Route::get('/project-detail', function () {
    return view('backend/pages/project-detail');
})->name('project-detail');