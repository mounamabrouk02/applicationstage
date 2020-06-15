<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Profile;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $prfl = Auth::user()->profile;

        return view('user.profile.index')->with('user',$user)->with('prfl',$prfl);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'dateN' => 'required' ,
            'villeN' => 'required',
            'genre' => 'required',
            'addresse' => 'required' ,
            'telephone' => 'required',
            'cv' => 'required'
        ]);


       $prfl = new Profile();

       $prfl->user_id= Auth::user()->id;

       $prfl->dateN= $request->input('dateN');
       $prfl->villeN= $request->input('villeN');
       $prfl->genre= $request->input('genre');
       $prfl->addresse= $request->input('addresse');
       $prfl->telephone= $request->input('telephone');
       $prfl->ecole= $request->input('ecole');
       $prfl->filiere= $request->input('filiere');
       $prfl->niveau= $request->input('niveau');
       $prfl->departement= $request->input('departement');

       if($request->hasFile('cv')){
        $prfl->cv = $request->cv->store('cvs');
    }

       $prfl->save();
       return redirect('/profile')->with('success','Le profile est bien completer !!');
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
        $prfl = Profile::find($id);

        $this->authorize('update',$prfl);

        return view('user.profile.edit')->with('prfl',$prfl);
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
        $prfl = Profile::find($id);

        $prfl->dateN= $request->input('dateN');
       $prfl->villeN= $request->input('villeN');
       $prfl->genre= $request->input('genre');
       $prfl->ecole= $request->input('ecole');
       $prfl->filiere= $request->input('filiere');
       $prfl->niveau= $request->input('niveau');
       $prfl->departement= $request->input('departement');
       $prfl->addresse= $request->input('addresse');
       $prfl->telephone= $request->input('telephone');

       if($request->hasFile('cv')){
        $prfl->cv = $request->cv->store('cvs');
    }

        $prfl->save();
        return redirect('/profile')->with('success','Votre profile est bien modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prfl = Profile::find($id);

        $this->authorize('delete',$prfl);

        $prfl->delete();
        return redirect('/profile')->with('danger','Votre profile est bien supprimé');
    }
}
