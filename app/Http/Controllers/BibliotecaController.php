<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carta;
use App\Models\Set;

class BibliotecaController extends Controller
{
    public function cartas(){
        $cartas = Carta::where('id','>',0)
        ->orderBy('nombre')
        ->paginate(10);

        return view('biblioteca.cartas',[
            'cartas' => $cartas
        ]);
    }

    public function decks(){
        $cartas = Carta::where('id','>',0)
        ->orderBy('nombre')
        ->paginate(10);

        return view('biblioteca.decks',[
            'cartas' => $cartas
        ]);
    }
}
