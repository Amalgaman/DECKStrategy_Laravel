<?php

namespace App\Http\Controllers;

use App\Models\Carta;
use App\Models\Deck;
use App\Models\lista_deck;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class DecksController extends Controller
{
    public function show(Deck $deck){

        $deckId = $deck->id;
        $cartas = [];

        $listaCartas = lista_deck::where('id_deck','=',$deckId)
        ->get();

        foreach($listaCartas as $l){
            $carta = Carta::where('id','=',$l->id_carta)
            ->first();

            $carta->copias = $l->copias;


        array_push($cartas, $carta);
    }

        return view('decks.show',[
            'cartas' => $cartas,
            'deck' => $deck,
        ]);
    }
}
