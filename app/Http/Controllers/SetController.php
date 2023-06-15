<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Set;

class SetController extends Controller
{
    public function index(){

        return $sets = Set::all();
    }
}
