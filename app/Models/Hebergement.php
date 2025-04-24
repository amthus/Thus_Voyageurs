<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hebergement extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'capacite',
        'type',
        'lieu',
        'photo',
        'disponible'
    ];
}