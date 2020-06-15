<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Apropo;

class ApropoController extends Controller
{
    public function index(){

        $list = Apropo::all();
        return view('pages.apropos')->with('list',$list);
    }
}
