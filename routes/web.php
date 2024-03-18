<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

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

Route::get('/', function () {
    return redirect('/events');
});

Route::get('/event/mails', function () {
    return view('mails.events.confirmation');
});

Route::post('/events/{eventId}/signup', [EventController::class, 'signup'])->name('events.signup');
