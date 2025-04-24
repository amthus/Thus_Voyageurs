<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voyageur extends Model
{
    use HasFactory;

    protected $table = 'voyageurs';
    protected $primaryKey = 'id_voyageur';
    
    protected $fillable = [
        'nom',
        'prenom',
        'ville',
        'genre'
    ];

    public function sejours()
    {
        return $this->hasMany(Sejour::class, 'id_voyageur', 'id_voyageur');
    }
}