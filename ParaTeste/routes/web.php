<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartaoController;



Route::get('/', [EventController::class, 'index'])->name('site.principal');
Route::get('/create', [EventController::class, 'create'])->name('site.evento');

Route::get('/login', [EventController::class, 'login'])->name('site.login');
Route::get('/dashboard', [LoginController::class,'dashboard'])->middleware('auth')->name('admin.dashboard');
Route::get('/editar', [LoginController::class,'editar'])->middleware('auth')->name('admin.alterar');

Route::get('/exit', [LoginController::class, 'exit'])->name('site.exit');

Route::get('/cartao',[CartaoController::class,'cartao'])->name('admin.cartao');


Route::post('/alter',[EventController::class,'alter']);
Route::post('/event',[EventController::class,'store']);
Route::post('/auth',[LoginController::class,'auth'])->name('login.auth');
