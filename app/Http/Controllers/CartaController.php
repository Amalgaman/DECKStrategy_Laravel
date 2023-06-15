<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Carta;
use App\Models\Set;

class CartaController extends Controller
{
    public function index(){
        $cartas = Carta::all();
        return view('cartas.index',[
            'cartas' => $cartas
        ]);
    }

    public function store(Request $request){
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
}
