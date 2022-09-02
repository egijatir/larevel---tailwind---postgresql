<?php

use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Auth;
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

Route::middleware('auth')->group (function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');
    Route::get('/produk',[ProdukController::class,'index']);
    Route::post('/produk',[ProdukController::class,'store']);
    Route::delete('{id}/produk',[ProdukController::class,'destroy']);
});
Route::get('/', function () {
    return view('auth.login');
});
Route::get('/logout', function () {
   Auth::logout();
   return redirect('login');
});
require __DIR__.'/auth.php';
