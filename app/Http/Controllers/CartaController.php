<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


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
            'nombre' => 'required|max:255',
            'id_set' => 'required|integer|min:1',
            'ataque' => 'required|integer|min:0',
            'salud' => 'required|integer|min:0',
            'img_grande' => 'required|max:255',
            'img_chica' => 'required|max:255',
            'img_sola' => 'required|max:255'
        ],[
            'nombre.required' => 'El nombre es obligatorio',
            'id_set.required' => 'El set es obligatorio',
            'ataque.required' => 'El ataque es obligatorio',
            'salud.required' => 'La salud es obligatoria',
            'img_grande.required' => 'La URL de la Imagen Grande es obligatoria',
            'img_chica.required' => 'La URL de la Imagen Chica es obligatoria',
            'img_sola.required' => 'La URL de la Imagen Sola es obligatoria',
            'nombre.max' => 'El nombre execede el maximo de caracteres permitidos',
            'img_grande.max' => 'La URL de la Imagen Grande execede el maximo de caracteres permitidos',
            'img_chica.max' => 'La URL de la Imagen Chica execede el maximo de caracteres permitidos',
            'img_sola.max' => 'La URL de la Imagen Sola execede el maximo de caracteres permitidos',
            'salud.min' => 'El valor de la Salud debe ser 0 o mayor',
            'ataque.min' => 'El valor del Ataque debe ser 0 o mayor',
            'salud.integer' => 'El valor del Ataque debe ser un numero entero',
            'ataque.integer' => 'El valor del Ataque debe ser un numero entero',
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

        return redirect()
        ->route('cartas.index')
        ->with('status','La carta se ha creado con exito con exito');
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
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:255',
            'id_set' => 'required|integer|min:1',
            'ataque' => 'required|integer|min:0',
            'salud' => 'required|integer|min:0',
            'img_grande' => 'required|max:255',
            'img_chica' => 'required|max:255',
            'img_sola' => 'required|max:255'
        ],[
            'nombre.required' => 'El nombre es obligatorio',
            'id_set.required' => 'El set es obligatorio',
            'ataque.required' => 'El ataque es obligatorio',
            'salud.required' => 'La salud es obligatoria',
            'img_grande.required' => 'La URL de la Imagen Grande es obligatoria',
            'img_chica.required' => 'La URL de la Imagen Chica es obligatoria',
            'img_sola.required' => 'La URL de la Imagen Sola es obligatoria',
            'nombre.max' => 'El nombre execede el maximo de caracteres permitidos',
            'img_grande.max' => 'La URL de la Imagen Grande execede el maximo de caracteres permitidos',
            'img_chica.max' => 'La URL de la Imagen Chica execede el maximo de caracteres permitidos',
            'img_sola.max' => 'La URL de la Imagen Sola execede el maximo de caracteres permitidos',
            'salud.min' => 'El valor de la Salud debe ser 0 o mayor',
            'ataque.min' => 'El valor del Ataque debe ser 0 o mayor',
            'salud.integer' => 'El valor del Ataque debe ser un numero entero',
            'ataque.integer' => 'El valor del Ataque debe ser un numero entero',
        ]);

        if($validator->fails()){
            return redirect()
                ->route('cartas.edit',$carta)
                ->withErrors($validator)
                ->withInput();
        }

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

        $carta->delete();

        return redirect()
        ->route('cartas.index')
        ->with('status','La carta se ha eliminado con exito');
    }
}
