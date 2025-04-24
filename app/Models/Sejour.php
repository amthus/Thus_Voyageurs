<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sejour extends Model
{
    use HasFactory;

    protected $table = 'sejours';
    protected $primaryKey = 'id_sejour';
    
    protected $fillable = [
        'id_voyageur',
        'debut',
        'fin'
    ];

    public function voyageur()
    {
        return $this->belongsTo(Voyageur::class, 'id_voyageur', 'id_voyageur');
    }
}