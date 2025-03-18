<?php
namespace App\Http\Controllers;

use Database\Seeders\KategoriSeeder;
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

// Route::get('/', function (){
//     return view('home');
// });

Route::prefix('admin')->group(function () {
    Route::get('/category/food-beverage', [AdminController::class, 'foodbeverage']);
    Route::get('/category/beauty-health', [AdminController::class, 'beautyhealth']);
    Route::get('/category/home-care', [AdminController::class, 'homecare']);
    Route::get('/category/baby-kid', [AdminController::class, 'babykid']);
});

Route::get('/user/{id}/name/{name}', [UserController::class, 'profile']);

Route::get('/penjualan', function () {
    return view('sales');
});
Route::get('/',[WelcomeController::class,'index']);
Route::get('/level',[LevelController::class,'index']);
Route::get('/kategori',[KategoriController::class,'index']);
Route::get('/user', [UserController::class,'index']);
Route::get('/user/tambah', [UserController::class,'tambah']);
Route::post('/user/tambah_simpan', [UserController::class,'tambah_simpan']);
Route::get('/user/ubah/{id}', [UserController::class,'ubah']);
Route::put('/user/ubah_simpan/{id}', [UserController::class,'ubah_simpan']);
Route::get('/user/hapus/{id}', [UserController::class,'hapus']);

