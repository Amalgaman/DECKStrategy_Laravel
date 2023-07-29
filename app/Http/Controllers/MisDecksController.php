<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carta;

class MisDecksController extends Controller
{
    public function lista(){
        $cartas = Carta::where('id','>',0)
        ->orderBy('nombre')
        ->paginate(10);

        return view('misdecks.lista',[
            'cartas' => $cartas
        ]);
    }

    public function creador(){
        $cartas = Carta::where('id','>',0)
        ->orderBy('nombre')
        ->paginate(10);

        $mazo = [];

        return view('misdecks.creador',[
            'cartas' => $cartas,
            'mazo' => $mazo
        ]);
    }
}
