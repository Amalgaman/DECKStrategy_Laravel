<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carta;
use App\Models\User;
use App\Models\Deck;
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

            $user = User::where('id','=',$dataDeck->id_user)
            ->orderBy('name')
            ->first();

            $dataDeck->id_user = $user->name;
        }


        return view('biblioteca.decks',[
            'decks' => $decks
        ]);
    }
}
