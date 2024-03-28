<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminHomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin_home');
