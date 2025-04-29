<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // Définir les champs pouvant être remplis en masse
    protected $fillable = [
        'nom',
        'email',
        'message',
    ];

    // Si tu veux enregistrer un message en tant qu'array ou autre format spécifique,
    // tu peux utiliser des casts (dans le cas où tu veux stocker des données spécifiques au format JSON, par exemple)
    // protected $casts = [
    //     'message' => 'array', // si tu souhaites traiter 'message' comme un tableau, ou tout autre format
    // ];
}
