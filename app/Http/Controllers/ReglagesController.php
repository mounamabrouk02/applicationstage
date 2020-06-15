<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Hash;


class ReglagesController extends Controller
{
    public function index(){
        return view('user.changepassword');
    }
    public function changePassword(Request $request){
        if(!(Hash::check($request->get('current_password'),Auth::user()->password))){
            return redirect('/reglages')->with('error','votre mot de passe actuel ne correspond pas à celui que vous avez écrit');
        }
        if(strcmp($request->get('current_password'),$request->get('new_password')) === 0){
            return redirect('/reglages')->with('error','le nouveau mot de passe ne peut pas être le même que votre mot de passe actuel');
        }

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required | string | min:6 | confirmed'
        ]);

        $user = Auth::user();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();

        return redirect('/reglages')->with('success','Le mot de passe est bien modifié');
    }
}
