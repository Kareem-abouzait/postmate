<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\post;




class usercontroller extends Controller
{
    public function index()
    {
        $users = user::paginate();
        return view('layouts.authors', ['users' => $users]);
    }


    public function destroy(string $id)
    {
        $users = user::find($id);
        $posts = Post::where('user_id', $users->id)->get();
        foreach ($posts as $post) {
            $post->delete();
        }
        $users->delete();

        return redirect()->route('users');
    }


    public function edit(request $request, string $id)
    {


        $post=post::find($id);
        $post->update($request->except(['_method', '_token' , 'id' , 'created_at' , 'updated_at']));
        return redirect()->route('layouts.authors');
    }


    public function show( $id)
    {
        $users = user::find($id);
        //get user id if it = $id

        $posts = $users->posts;
        // dd($posts);

;
         return view('layouts.show', ['users' => $users , 'posts' => $posts]);
    }

}
