<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/register', function () {
    return view('pages.registerPage');
});

Route::get('/login', function () {
    return view('pages.loginPage');
});
Route::get('/qrcode', function () {
    return view('pages.qrcode');
});
