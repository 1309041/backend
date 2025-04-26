<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Besoin extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'entreprise',
        'email',
        'telephone',
        'projet',
        'budget',
        'delai',
        'details',
        'services'
    ];

    protected $casts = [
        'services' => 'array'
    ];
}