<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carta extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'ataque',
        'salud',
        'img_grande',
        'img_chica',
        'img_sola',
        'id_set'
    ];
}
