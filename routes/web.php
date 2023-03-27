<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\EnterpriseController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AdminController;
use GuzzleHttp\Middleware;
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

Route::get('/', [MainController::class, 'index'])->name('login');
Route::get('/history', [MainController::class, 'index']);
Route::post('/sign-up', [MainController::class, 'signup']);
Route::post('/', [MainController::class, 'signin']);
Route::get('/booking-ticket/{id}', [TicketController::class, 'index']);
Route::middleware(['auth'])->group(function () {
    Route::get('/sign-out', [MainController::class, 'signout']);
    Route::get('/management-user-account', [AccountController::class, 'accountUser']);
    Route::post('/booking', [TicketController::class, 'booking']);

    Route::middleware(['admin'])->group(function () {
        Route::get('/user', [AdminController::class, 'index']);
        Route::get('/airport', [AdminController::class, 'airport']);
        Route::get('/new-airport', [AdminController::class, 'callNewAirportIndex']);
        Route::get('/reset/{id}', [AdminController::class, 'reset']);
    });
    Route::middleware(['enterprise'])->group( function () {
        Route::get('/flight', [EnterpriseController::class, 'index']);
        Route::get('/new-flight', [EnterpriseController::class, 'newflight']);
        Route::get('/save-flight', [EnterpriseController::class, 'saveflight']);
        Route::post('/save-flight', [EnterpriseController::class, 'saveflight']);
        Route::get('/update-flight/{id}', [EnterpriseController::class, 'editflight']);
        Route::post('/update-flight/{id}', [EnterpriseController::class, 'updateflight']);
        Route::get('/new-plane', [EnterpriseController::class, 'newplane']);
        Route::get('/save-plane', [EnterpriseController::class, 'saveplane']);
        Route::post('/save-plane', [EnterpriseController::class, 'saveplane']);
        Route::get('/update-plane/{id}', [EnterpriseController::class, 'editplane']);
        Route::post('/update-plane/{id}', [EnterpriseController::class, 'updateplane']);
        Route::get('/dashboard', [EnterpriseController::class, 'dashboard']);
        Route::get('/planes', [EnterpriseController::class, 'planelist']);
        Route::get('/ticket', [EnterpriseController::class, 'ticketlist']);
        Route::get('/management-enterprise-account', [AccountController::class, 'accountEnterprise']);
    });
});
