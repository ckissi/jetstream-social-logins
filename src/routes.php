<?php

use Illuminate\Support\Facades\Route;
use Ckissi\JetstreamSocialLogins\Http\Controllers\LoginController;

Route::middleware(['web'])->group(function () {
    Route::get('login/{provider}', [LoginController::class, 'redirectToProvider'])->name('twitter-login');
    Route::get('{provider}/callback', [LoginController::class, 'handleProviderCallback']);
});

Route::get('/', function() {
    echo "dfdsf";    
});