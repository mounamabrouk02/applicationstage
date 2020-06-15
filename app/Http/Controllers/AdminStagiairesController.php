<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


use App\User;
use App\Profile;
use App\Publication;
use App\Comment;
use App\Messagerie;


class AdminStagiairesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        $prfls = Profile::all();

        return view('admin.pages.stagiaires')->with('users',$users)->with('prfls',$prfls);
    }

    public function destroy($id){

        $prfl = Profile::where('user_id',$id);
        $cmnt = Comment::where('user_id',$id);
        $cmnt2 = Comment::where('parent_id',$id);
        $pub = Publication::where('user_id',$id);
        $msj_r = Messagerie::where('to',$id);
        $msj_e = Messagerie::where('from',$id);
        $user = User::find($id);


        $prfl->delete();
        $cmnt->delete();
        $cmnt2->delete();
        $pub->delete();
        $msj_r->delete();
        $msj_e->delete();
        $user->delete();
        return redirect('admin/stagiaires')->with('danger','Ce Stagiaire est bien supprimé');
    }

    public function forgot(Request $request, $id)
    {

        $user = User::find($id);
        $user->password = Hash::make('123456789');
        $user->save();
        return back()->with('success', "Le mot de passe de $user->name a été bien réinitialisé");
    }
}
