<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class DecksController extends Controller
{
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:255',
            'id_user' => 'required|integer|min:1',
        ]);

        if($validator->fails()){
            return redirect()
                ->route('biblioteca-d')
                ->withErrors($validator)
                ->withInput();
        }

        $deck = Deck::create([
            'nombre' => $request->nombre,
            'id_user'=> $request->id_user,
        ]);



        return redirect()
        ->route('biblioteca-d')
        ->with('status','El deck se creo con exito');
    }
}
