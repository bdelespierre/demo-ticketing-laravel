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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('tickets', 'TicketController@index')->name('tickets');

    Route::get('tickets/create', 'TicketController@create')->name('ticket.create');

    Route::post('tickets', 'TicketController@store')->name('ticket.store');

    Route::get('tickets/{ticket}', 'TicketController@show')->name('ticket.show');
});
