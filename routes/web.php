<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ChargeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\ModeleController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\VoitureController;
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


Route::get('/login', [LoginController::class,'show'])->name('login.show');
Route::post('/login', [LoginController::class,'login'])->name('login');

Route::middleware(['auth','no-cache'])->group(function () {
    Route::get('/logout', [LoginController::class,'logout'])->name('login.logout');

    Route::get('/register', [ProfileController::class,'create'])->name('profile.create');
    Route::post('/register', [ProfileController::class,'store'])->name('profile.store');
    Route::delete('/showProfile', [ProfileController::class,'destroy'])->name('profile.destroy');
    Route::patch('/showProfile', [ProfileController::class,'update'])->name('profile.update');
    Route::put('/showProfile', [ProfileController::class,'updatePassword'])->name('profile.updatePassword');
    Route::get('/showProfile', [ProfileController::class,'show'])->name('profile.show');


    Route::get('/createVoiture', [VoitureController::class,'create'])->name('voiture.create');
    Route::post('/createVoiture', [VoitureController::class,'store'])->name('voiture.store');
    Route::get('/showVoiture', [VoitureController::class,'show'])->name('voiture.show');
    Route::get('/searchVoiture', [VoitureController::class,'search'])->name('voiture.search');
    Route::get('/detailVoiture/{voiture}', [VoitureController::class,'showDetails'])->name('voiture.detail');
    Route::delete('/showVoiture/{voiture}', [VoitureController::class,'destroy'])->name('voiture.destroy');
    Route::get('/editVoiture/{voiture}', [VoitureController::class,'edit'])->name('voiture.edit');
    Route::patch('/editVoiture/{voiture}', [VoitureController::class,'update'])->name('voiture.update');



    Route::get('/createReservation', [ReservationController::class,'create'])->name('reservation.create');
    Route::post('/createReservation', [ReservationController::class,'store'])->name('reservation.store');
    Route::delete('/createReservation/{reservation}', [ReservationController::class,'destroy'])->name('reservation.destroy');
    Route::get('/editReservation/{reservation}', [ReservationController::class,'edit'])->name('reservation.edit');
    Route::patch('/editReservation/{reservation}', [ReservationController::class,'update'])->name('reservation.update');
    Route::get('/searchReservation', [ReservationController::class,'search'])->name('reservation.search');


    Route::get('/createClient', [ClientController::class,'create'])->name('client.create');
    Route::post('/createClient', [ClientController::class,'store'])->name('client.store');
    Route::delete('/createClient/{client}', [ClientController::class,'destroy'])->name('client.destroy');
    Route::get('/editClient/{client}', [ClientController::class,'edit'])->name('client.edit');
    Route::patch('/editClient/{client}', [ClientController::class,'update'])->name('client.update');
    Route::get('/searchClient', [ClientController::class,'search'])->name('client.search');


    Route::get('/createCharge', [ChargeController::class,'create'])->name('charge.create');
    Route::post('/createCharge', [ChargeController::class,'store'])->name('charge.store');
    Route::delete('/createCharge/{charge}', [ChargeController::class,'destroy'])->name('charge.destroy');
    Route::get('/editCharge/{charge}', [ChargeController::class,'edit'])->name('charge.edit');
    Route::patch('/editCharge/{charge}', [ChargeController::class,'update'])->name('charge.update');
    Route::get('/searchCharge', [ChargeController::class,'search'])->name('charge.search');


    Route::get('/createMarque', [MarqueController::class,'create'])->name('marque.create');
    Route::post('/createMarque', [MarqueController::class,'store'])->name('marque.store');
    Route::delete('/createMarque/{marque}', [MarqueController::class,'destroy'])->name('marque.destroy');
    Route::get('/editMarque/{marque}', [MarqueController::class,'edit'])->name('marque.edit');
    Route::patch('/editMarque/{marque}', [MarqueController::class,'update'])->name('marque.update');
    Route::get('/searchMarque', [MarqueController::class,'search'])->name('marque.search');


    Route::get('/createModele', [ModeleController::class,'create'])->name('modele.create');
    Route::post('/createModele', [ModeleController::class,'store'])->name('modele.store');
    Route::delete('/createModele/{model}', [ModeleController::class,'destroy'])->name('modele.destroy');
    Route::get('/editModel/{model}', [ModeleController::class,'edit'])->name('modele.edit');
    Route::patch('/editModel/{model}', [ModeleController::class,'update'])->name('modele.update');
    Route::get('/searchModel', [ModeleController::class,'search'])->name('modele.search');



    Route::get('/Acceuil', [DashController::class,'show'])->name('dashboard.acceuil');
    Route::get('/Calendrier', [CalendarController::class,'index'])->name('calendar.index');
    Route::get('/Lockscreen', [ProfileController::class,'lockscreen'])->name('profile.lockscreen');
    Route::post('/Lockscreen', [ProfileController::class,'unlock'])->name('profile.unlock');

    Route::get('/generatePdf/{voiture}', [PdfController::class,'generate'])->name('voiture.generate');
});
