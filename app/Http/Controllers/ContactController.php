<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contact;

class ContactController extends Controller
{

    public function index(){

        return view('pages.contact');
    }


    public function store(Request $request){

        $this->validate($request,[
            'nomComplet' => 'required' ,
            'email' => 'required',
            'message' => 'required'
        ]);


       $contact = new Contact();

       $contact->nomComplet= $request->input('nomComplet');
       $contact->email= $request->input('email');
       $contact->objet= $request->input('objet');
       $contact->message= $request->input('message');

       $contact->save();
       return redirect('/contact')->with('success','Le message est bien envoyer !!');
    }

    public function destroy($id){
        $msg = Contact::find($id);

        $msg->delete();
        return redirect('admin/messages')->with('danger','Ce message est bien supprimé');
    }

//    public function show($id){
//        $msg = Contact::find($id);
//        return view('admin.pages.messages.index')->with('msg',$msg);
  //  }
}
