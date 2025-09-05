<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\FormController;

Route::get('/', function () {
    return Inertia::render('Welcome', );
});

Route::get('/form', function () {
    return Inertia::render('FormPage');
});

Route::post('/form', [FormController::class, 'submit']);

Route::get('/result', function () {
    $array = session('results',[]);
    return Inertia::render('Result', ['results' => $array]);
});


//require __DIR__.'/auth.php';
