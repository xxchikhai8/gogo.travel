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
//Route::get('/history', [MainController::class, 'index']);
Route::post('/sign-up', [MainController::class, 'signup']);
Route::post('/', [MainController::class, 'signin']);
Route::get('/ticket/booking/{id}', [TicketController::class, 'index']);
Route::get('/search', [MainController::class, 'searchflights']);
Route::post('/search', [MainController::class, 'searchflights']);
Route::middleware(['auth'])->group(function () {
    Route::get('/sign-out', [MainController::class, 'signout']);
    Route::get('/ticket/history', [TicketController::class, 'ticketList']);
    Route::get('/ticket/detail/{id}', [TicketController::class, 'ticketDetail']);
    Route::post('/booking', [TicketController::class, 'booking']);
    Route::get('delete/account/{username}', [AccountController::class, 'deleteAccount']);
    Route::get('/management/account/user', [AccountController::class, 'accountUser']);
    Route::get('/information/changes', [AccountController::class, 'GetUpdateInformation']);
    Route::post('/information/changes/save', [AccountController::class, 'PostUpdateInformation']);
    Route::get('/password/change', [AccountController::class, 'GetChangePassword']);
    Route::post('/password/change/save', [AccountController::class, 'PostChangePassword']);
    Route::middleware(['admin'])->group(function () {
        Route::get('/user', [AdminController::class, 'index']);
        Route::get('/airport', [AdminController::class, 'airport']);
        Route::get('/airport/new', [AdminController::class, 'newAirport']);
        Route::post('/airport/new/save', [AdminController::class, 'saveNewAirport']);
        Route::get('/airport/update/{id}', [AdminController::class, 'getUpdateAirport']);
        Route::post('/airport/update/save/{id}', [AdminController::class, 'postUpdateAirport']);
        Route::get('/reset/{id}', [AdminController::class, 'reset']);
    });
    Route::middleware(['enterprise'])->group( function () {
        Route::get('/flight', [EnterpriseController::class, 'index']);
        Route::get('/flight/new', [EnterpriseController::class, 'newflight']);
        Route::post('/flight/new/save', [EnterpriseController::class, 'saveflight']);
        Route::get('/flight/update/{id}', [EnterpriseController::class, 'GetUpdateFlight']);
        Route::post('/flight/update/{id}/save', [EnterpriseController::class, 'PostUpdateFlight']);
        Route::get('/planes/new', [EnterpriseController::class, 'newplane']);
        Route::post('/plane/new/save', [EnterpriseController::class, 'saveplane']);
        Route::get('/planes/{id}/update', [EnterpriseController::class, 'GetUpdatePlane']);
        Route::post('/planes/{id}/update', [EnterpriseController::class, 'PostUpdatePlane']);
        Route::get('/dashboard', [EnterpriseController::class, 'dashboard']);
        Route::get('/planes', [EnterpriseController::class, 'planelist']);
        Route::get('/ticket', [EnterpriseController::class, 'ticketlist']);
        Route::get('/password/changes', [AccountController::class, 'GetChangePassword']);
        Route::post('/password/changes/save', [AccountController::class, 'PostChangePassword']);
        Route::get('/management/account/enterprise', [AccountController::class, 'accountEnterprise']);
    });
});
