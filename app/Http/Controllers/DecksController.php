<?php

namespace App\Http\Controllers;

use App\Models\Carta;
use App\Models\Deck;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class DecksController extends Controller
{
    public function show(Deck $deck){

        $cartas = Carta::where('id','>',0)
        ->orderBy('nombre')
        ->paginate(10);

        return view('decks.show',[
            'cartas' => $cartas,
        ]);
    }
}
