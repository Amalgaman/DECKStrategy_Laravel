<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carta;
use App\Models\User;
use App\Models\Deck;
use App\Models\lista_deck;
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
        $decks = Deck::where('id','>',0)
        ->orderBy('nombre')
        ->paginate(12);

        foreach($decks as $dataDeck){

            $deckColores = [];
            $deckImg = "";

            $cartas = [];

            $user = User::where('id','=',$dataDeck->id_user)
            ->orderBy('name')
            ->first();

            $dataDeck->id_user = $user->name;

            $listaCartas = lista_deck::where('id_deck','=',$dataDeck->id)
            ->get();

            foreach($listaCartas as $l){
                $carta = Carta::where('id','=',$l->id_carta)
                ->first();

            array_push($cartas, $carta);
            }

            foreach($cartas as $carta){

                $coloresCarta = explode(" ",$carta->color);

                foreach($coloresCarta as $color){
                    if (!in_array($color, $deckColores)) {
                        array_push($deckColores, $color);
                    }
                }
            }

            shuffle($cartas);

            $dataDeck->colores = $deckColores;
            $dataDeck->img = $cartas[0]->img_sola;

        }


        return view('biblioteca.decks',[
            'decks' => $decks
        ]);
    }
}
