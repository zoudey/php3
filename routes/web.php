<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;

//Route::prefix(tiền tố đường dẫn, [Controller::class,hàm]->name(tên hàm))
Route::prefix('/')->name('users.')->group(function(){
    Route::get('/', [UserController::class, 'index'])->name('list');
    Route::delete('/delete/{id}', [UserController::class, 'delete'])->name('delete'); //name:users.delete
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [UserController::class, 'update'])->name('update');
});