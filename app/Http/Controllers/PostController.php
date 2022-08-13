<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Http\Requests\postHandle;

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
    {  
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(postHandle $request)
    {   

        if( $request->hasFile('image') ){

            try {
                $path = $request->file('image')->store('images','public');
                $post = Post::create([
                    'body' => $request->body,
                    'title' => $request->title,
                    'user_id' => auth()->user()->id,
                    'enabled' => isset($request->enabled) ? 1 : 0,
                    'image' => $path,
                    'published_at' =>  \Carbon\Carbon::now(),
                ]);
            } catch (\Throwable $th) {
                return redirect()->back()->with('error','failed to upload image');
            }
                       
        }else{
            $post = Post::create([
                'body' => $request->body,
                'title' => $request->title,
                'user_id' => auth()->user()->id,
                'enabled' => isset($request->enabled) ? 1 : 0,
                'published_at' =>  \Carbon\Carbon::now(),
            ]);
        }

       

           

        return redirect()->back()->with('success','Post created successfully');
       
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
        $post = Post::find($id);

        if($post->user_id != auth()->id()){
            return redirect()->route('posts.index')->with('error','You are not authorized to edit this post');
        }

        return view('posts.edit')->with(['id' => $id , 'post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(postHandle $request, $id){
    
        $post = Post::find($id);

   

        if( $request->hasFile('image') ){

            try {
                
            $path = $request->file('image')->store('images','public');
    
            $post->title = $request->title;
            $post->body = $request->body;
            $post->enabled = $request->enabled ? 1 : 0;
            $post->user_id = auth()->user()->id;
            $post->image = $path;
            $post->published_at = \Carbon\Carbon::now() ;
            $post->save();

            } catch (\Throwable $th) {
                return redirect()->back()->with('error','failed to upload image');
            }

        }else{
            
            $post->title = $request->title;
            $post->body = $request->body;
            $post->enabled = $request->enabled ? 1 : 0;
            $post->user_id = auth()->user()->id;
            $post->published_at = \Carbon\Carbon::now() ;
            $post->save();
        }
        return redirect()->back()->with('success','Post updated successfully');
      
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
