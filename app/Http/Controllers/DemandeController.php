<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Demande;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.demandes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.demandes');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


     public function store(Request $request){

        $this->validate($request,[
            'nomComplet' => 'required' ,
            'email' => 'required',
            'telephone' => 'required',
            'motivation' => 'required',
            'cv' => 'required'
        ]);


       $demande = new Demande();

       $demande->nomComplet= $request->input('nomComplet');
       $demande->email= $request->input('email');
       $demande->telephone= $request->input('telephone');
       $demande->motivation= $request->input('motivation');

       if($request->hasFile('cv')){
        $demande->cv = $request->cv->store('cv');
    }


       $demande->save();
       return redirect('/demandes')->with('success','Votre demande est bien envoyer !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
