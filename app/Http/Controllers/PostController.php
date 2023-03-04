<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
$posts=Post::get();
        return view('posts',compact('posts'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



        $post = new Post();
        $post->article = $request->article;
        $post->user_id = $request->user_id;
        $post->save();
            // dd($request);

             return redirect()->route('users');

    }

    public function editp($id)
    {
        // $user_id = $request->input('user_id');
        // $post = Post::where('user_id', $user_id)->find($id);


        // $post->title = $request->input('article');
        // $post->save();
        $posts=Post::find($id);

        return view('layouts.edit',compact('posts'));

    }
    public function editpost(Request $request, $id)
    {
        // $user_id = $request->input('user_id');
        // $post = Post::where('user_id', $user_id)->find($id);
$post=Post::find($id);
$post->article=$request->article;
        // $post->article = $request->input('article');
   
        $post->save();
        return redirect()->route('users');

    }




    /**
     * Display the specified resource.
     */
    // public function show( $id)
    // {
    //    //get user id
    //      $posts = Post::find($id)->user_id;


    //        return view('layouts.show', ['user_id' => $user_id]);



    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {




            // $post = post::find($id);
            // return view('update', ['post' => $post]);




    }

    /**
     * Remove the specified resource from storage.
     */




    public function destroy(int $id)
    {
       Post::find($id)->delete();


        // return route('show', ['id' => $id]);
        //refresh page
        return redirect()->route('users');

    }







    public function create()
    {
        return view('layouts.create');

    }

}
