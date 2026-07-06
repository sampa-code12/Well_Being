<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');
});

Route::post('/login', function () {
    return redirect('/');
});

Route::post('/register', function () {
    return redirect('/');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/apropos', function () {
    return view('apropos');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/membre/dashboard', function () {
    return view('membre.dashboard');
});
