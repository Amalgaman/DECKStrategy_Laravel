<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Carta;
use Illuminate\Support\Facades\Auth;
use stdClass;

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

    public function createDeck(Request $request){
/*
        $idUser = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:255',
        ]);

        if($validator->fails()){
            return redirect()
                ->route('biblioteca-d')
                ->withErrors($validator)
                ->withInput();
        }

        $deck = Deck::create([
            'nombre' => $request->nombre,
            'id_user'=> $idUser,
        ]);
*/
        $ret = new stdClass();
        $ret->codigo = 200;
        $ret->mensaje = "Se creo";

        return $ret;

        //return redirect()
        //->route('biblioteca-d')
        //->with('status','El deck se creo con exito');
    }

    public function getCartas(Request $request){
        dd($request);

        $cartas = Carta::where('id','=',0)
        ->orderBy('nombre');

        $res = "asdasd";

        return response()->json(
            ['data' => $res]);
    }

    }

