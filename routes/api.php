<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BesoinController;

Route::post('/envoyer-besoin',[BesoinController::class, 'envoyerBesoin']);

?>