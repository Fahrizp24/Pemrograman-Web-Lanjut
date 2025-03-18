<?php
namespace App\Http\Controllers;

use Database\Seeders\KategoriSeeder;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']); // menampilkan halaman awal user
    Route::post('/list', [UserController::class, 'list']); // menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [UserController::class, 'create']); // menampilkan halaman form tambah user
    Route::post('/', [UserController::class, 'store']); // menyimpan data user baru
    Route::get('/{id}', [UserController::class, 'show']); // menampilkan detail user
    Route::get('/{id}/edit', [UserController::class, 'edit']); // menampilkan halaman form edit user
    Route::put('/{id}', [UserController::class, 'update']); // menyimpan perubahan data user
    Route::delete('/{id}', [UserController::class, 'destroy']); // menghapus data user
});

