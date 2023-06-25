<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Carta;
use App\Models\Set;

class CartaController extends Controller
{
    public function index(){
        $cartas = Carta::where('id','>',0)
        ->orderBy('nombre')
        ->paginate(10);

        /*$cartas = Carta::where('is_visible',true)
        ->get();*/
        return view('cartas.index',[
            'cartas' => $cartas
        ]);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:255'
        ],[
            'nombre.required' => 'El nombre es obligatorio'
        ]);

        if($validator->fails()){
            return redirect()
                ->route('cartas.create')
                ->withErrors($validator)
                ->withInput();
        }

        Carta::create([
            'nombre' => $request->nombre,
            'ataque'=> $request->ataque,
            'salud'=> $request->salud,
            'img_grande'=> $request->img_grande,
            'img_chica'=> $request->img_chica,
            'img_sola'=> $request->img_sola,
            'id_set'=> $request->id_set
        ]);

        return redirect()->route('cartas.index');
    }

    public function create(){
        $sets = Set::all();
        return view('cartas.create',[
            'sets' => $sets,
        ]);
    }

    public function show(Carta $carta){
        return view('cartas.show',[
            'carta' => $carta,
        ]);
    }

    public function edit(Carta $carta){
        $sets = Set::all();

        return view('cartas.edit',[
            'sets' => $sets,
            'carta' => $carta,
        ]);
    }

    public function update(Request $request, Carta $carta){
        $carta->update([
            'nombre' => $request->nombre,
            'ataque'=> $request->ataque,
            'salud'=> $request->salud,
            'img_grande'=> $request->img_grande,
            'img_chica'=> $request->img_chica,
            'img_sola'=> $request->img_sola,
            'id_set'=> $request->id_set
        ]);

        return redirect()
        ->route('cartas.show', $carta)
        ->with('status','La informacion de la carta se a modificado con exito');
    }

    public function destroy(Carta $carta){

        return redirect()
        ->route('cartas.show', $carta)
        ->with('status','La carta se ha eliminado con exito');
    }
}
