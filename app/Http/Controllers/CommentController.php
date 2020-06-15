<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Publication;

use App\Comment;

use Auth;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'content'=>'required',
            'prjt'=>'required|numeric',
            'image'=>'image'
         ]);
         $prjt = Publication::findOrFail($request->prjt);
         $comment = Comment::create([
             'user_id'=>Auth::user()->id,
             'parent_id'=>$request->prjt,
             'content'=>$request->input('content')
         ]);
         if($request->has('image'))
         {
             $image = $request->file('image');
             if(is_array($image))
                 $image = $image[0];
             $link = $image->store('comments');
             if($link)
             {
                 Image::create([
                     'link'=>$link,
                     'parent_id'=>$comment->id,
                     'type'=>'comment'
                 ]);
             }

         }
         return back();
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
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back();
    }
}
