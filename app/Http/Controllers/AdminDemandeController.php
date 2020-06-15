<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Demande;

class AdminDemandeController extends Controller
{
    public function index(){
        $list = Demande::all();
        return view('admin.pages.demandes')->with('list',$list);
    }


    public function destroy($id)
    {
        $dmnd = Demande::find($id);

        $dmnd->delete();
        return redirect('admin/demandes')->with('danger','Cet demande est bien supprimé');
    }
}
