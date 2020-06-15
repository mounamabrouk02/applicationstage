<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Apropo;

class AdminApropoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Apropo::all();
        return view('admin.pages.apropos')->with('list',$list);
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
        ]);


        $apropo = new Apropo();
        $apropo->titre = $request->input('titre');
        $apropo->contenu = $request->input('contenu');

        if($request->hasFile('image')){
            $apropo->image = $request->image->store('about');
        }


        $apropo->save();
        return redirect('/admin/apropos')->with('success','Cette information est bien enregistrer');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        $this->validate($request,[
            'titre' => 'required' ,
            'contenu' => 'required',
        ]);


        $apropo = Apropo::find($id);
        $apropo->titre = $request->input('titre');
        $apropo->contenu = $request->input('contenu');

        if($request->hasFile('image')){
            $apropo->image = $request->image->store('about');
        }


        $apropo->save();
        return redirect('/admin/apropos')->with('success','Cette information est bien modifier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $apropo = Apropo::find($id);

        $apropo->delete();
        return redirect('/admin/apropos')->with('danger','Cette information est bien supprimé');
    }
}
