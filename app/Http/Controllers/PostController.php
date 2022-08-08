<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(15);
        return view('posts.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $users = $user = User::all();
        return view('posts.create',['users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $post = Post::create([
            'body' => $request->body,
            'title' => $request->title,
            'user_id' => $request->user_id,
            'enabled' => isset($request->enabled) ? 1 : 0,
            'published_at' =>  \Carbon\Carbon::now(),
        ]);
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = $user = User::all();
        $post = Post::find($id);
        return view('posts.edit')->with(['id' => $id , 'post' => $post , 'users' => $users]);
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
        
        
        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->enabled = $request->enabled ? 1 : 0;
        $post->published_at = \Carbon\Carbon::now() ;
        $post->save();

        // $post = Post::where('id',$id)->update($request->only(['title','body','enabled','published_at']));


        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::where( 'id',  $id )->delete();
        return redirect()->route('posts.index');
    }

    public function deleted_list()
    {
        $posts = Post::onlyTrashed()->paginate(15);
        return view('posts.deleted_list',['posts'=>$posts]);
    }

    public function restore($id)
    {
        $post = Post::onlyTrashed()->where('id', $id)->restore();
        return redirect()->route('posts.deleted_list');
    }

}
