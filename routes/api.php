<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BesoinController;
use App\Http\Controllers\ContactController;

Route::post('/envoyer-besoin',[BesoinController::class, 'envoyerBesoin']);
Route::post('/contact', [ContactController::class, 'store']);
?>