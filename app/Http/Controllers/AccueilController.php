<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profile;

class AccueilController extends Controller
{
    public function index()
    {
        $prfl = Profile::all();

        return view('pages.accueil')->with('prfl',$prfl);
    }
}
