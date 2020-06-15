<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use Illuminate\Http\UploadedFile;

use App\Publication;


class PublicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pubs = Publication::all();
        return view('user.publications.index')->with('pubs',$pubs);
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
            'titre' => 'required' ,
            'contenu' => 'required',
            'photo'  => 'image|required'
        ]);




        $pub = new Publication();

        $pub->user_id = Auth::user()->id;

        $pub->titre = $request->input('titre');
        $pub->contenu = $request->input('contenu');

        if($request->hasFile('photo')){
            $pub->photo = $request->photo->store('photos');
        }

        $pub->save();
        return redirect('/publications')->with('success','La publication est bien enregistré');
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
        $pub = Publication::find($id);

        $this->authorize('update',$pub);

        return view('user.publications.edit')->with('pub',$pub);
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
        $pub = Publication::find($id);

        $pub->titre = $request->input('titre');
        $pub->contenu = $request->input('contenu');

        if($request->hasFile('photo')){
            $pub->photo = $request->photo->store('photos');
        }

        $pub->save();
        return redirect('/publications')->with('success','La publication est bien modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pub = Publication::find($id);

        $this->authorize('delete',$pub);

        $pub->delete();

        return redirect('/publications')->with('danger','La publication est bien supprimé');

    }
}
