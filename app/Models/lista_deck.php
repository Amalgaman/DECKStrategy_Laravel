<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lista_deck extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "lista_deck";
    protected $fillable = [
        'id_deck',
        'id_carta',
        'copias',
    ];
}
