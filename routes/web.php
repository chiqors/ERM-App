<?php

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

// Passing parameters to the layout (Like native @extends('layouts.app', ['title' => 'foo']))
Route::livewire('/', 'home.main')
    ->name('home')
    ->layout('layouts.app', [
        'title' => 'Home'
    ])
    ->middleware('auth');
    
Route::get('/download/{folder}/{file}', 'IDMController@download')
    ->name('download')
    ->middleware('auth');

Route::group(['middleware'=>'guest'], function() {
    Route::livewire('/login', 'login')
        ->name('login')
        ->layout('layouts.auth', [
            'title' => 'Login'
        ]);
});