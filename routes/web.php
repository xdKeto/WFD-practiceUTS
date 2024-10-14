<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

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

Route::get('/movies', [MovieController::class, 'index'])->name('movies/index');

Route::get('/movies/tickets/{id}', [MovieController::class, 'show'])->name('movies/view');   
Route::get('/movies/book/{id}', [MovieController::class, 'create'])->name('movies/book');  
 
Route::put('/ticket/checkin/{id}', [TicketController::class, 'update'])->name('ticket.update');
Route::post('/ticket/submit', [TicketController::class, 'store'])->name('ticket.store');
Route::delete('/ticket/delete/{id}', [TicketController::class, 'destroy'])->name('ticket.destroy');