<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\post;
use App\Models\User;
use Illuminate\Http\Request;
 
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

Route::get('/', [PostController::class,'home'])->name('home');
Route::get('/dashboard', [PostController::class,'show'])->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/post',[PostController::class,'index'])->name('index');
  Route::post('/post',[PostController::class,'create'])->name('post');
    Route::get('/delete/{id}',[PostController::class,'destroy'])->name('delete');
    Route::get('/edit/{id}',[PostController::class,'edit'])->name('edit');
     Route::put('/update/{id}',[PostController::class,'update'])->name('update');
    
    

    // authorization by gate
     Route::get('/admin',function(){
        return 'Only admin can access';
     })->middleware('can:IsAdmin')->name('admin');


    

    //authorization by policies
     Route::get('/policy',function(){
       return 'Only admin can access Policies';
     })->middleware(['can:check,App\Models\post'])->name('policy');

});



require __DIR__.'/auth.php';
