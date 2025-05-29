<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SMPPController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('send-sms', [SMPPController::class, 'sendSms']);