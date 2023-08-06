<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::where('id','>',0)
        ->orderBy('name')
        ->paginate(10);

        return view('users.index',[
            'users' => $users
        ]);
    }

    public function update(Request $request,User $user){

        if($user->is_admin){
            $user->update([
                'is_admin' => false
            ]);
        }else{
           $user->update([
            'is_admin' => true
        ]);
        }


        return redirect()
        ->route('users.index')
        ->with('status','Se han modificado los permisos del usuario con exito');
    }

}
