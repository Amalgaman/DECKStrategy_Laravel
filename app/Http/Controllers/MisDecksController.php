<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Carta;
use App\Models\lista_deck;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use stdClass;

class MisDecksController extends Controller
{
    public function lista(){
        $decks = Deck::where('id','>',0)
        ->orderBy('nombre')
        ->paginate(12);

        foreach($decks as $dataDeck){

            $user = User::where('id','=',$dataDeck->id_user)
            ->orderBy('name')
            ->first();

            $dataDeck->id_user = $user->name;
        }


        return view('misdecks.lista',[
            'decks' => $decks
        ]);
    }

    public function creador(){
        $cartas = Carta::where('id','>',0)
        ->orderBy('nombre')
        ->paginate(10);

        return view('misdecks.creador',[
            'cartas' => $cartas,
        ]);
    }

    public function createDeck(Request $request){
        $idUser = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:50',
            'descripcion' => 'required|max:100',
        ]);

        if($validator->fails()){
            return redirect()
                ->route('biblioteca-d')
                ->withErrors($validator)
                ->withInput();
        }

        $deck = Deck::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'id_user'=> $idUser,
        ]);

        foreach($request->cartas as $carta){
            lista_deck::create([
                'id_deck'=> $deck->id,
                'id_carta'=> $carta[0],
                'copias'=> $carta[1],
            ]);
        }

        $ret = new stdClass();
        $ret->codigo = 200;
        $ret->message = "Mazo creado exisotasamente!";

        return response()->json(
            [
                "response" => $ret
            ]
        );
    }

    public function getCartas(Request $request){

        $cartas = [];

        foreach($request->ids as $idCarta){
            $carta = Carta::where('id','=',$idCarta)
                    ->orderBy('nombre')
                    ->first();

            array_push($cartas,$carta);
        };

        $ret = new stdClass();
        $ret->codigo = 200;
        $ret->cartas = $cartas;

        return response()->json(
            [
                "response" => $ret
            ]
            );

    }

    }

