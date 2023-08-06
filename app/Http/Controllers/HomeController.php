<?php

namespace App\Http\Controllers;

use App\Models\Carta;
use App\Models\Deck;
use App\Models\lista_deck;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $decksTodos = Deck::where('id','>',0)
        ->orderBy('nombre')
        ->get();

        $decksArray = [];

        foreach($decksTodos as $deck){
            array_push($decksArray, $deck);
        }

        $decks = [];

        shuffle($decksArray);

        for ($i = 1; $i <= 15; $i++) {
            array_push($decks, $decksArray[$i]);
        }

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

        return view('home',[
            'decks' => $decks,
        ]);
    }
}
