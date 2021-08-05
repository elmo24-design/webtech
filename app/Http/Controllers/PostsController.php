<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use DB;

class PostsController extends Controller
{
       /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts= Post::orderBy('created_at', 'desc')->paginate(6);
        return view ('posts.index')->with('posts',$posts);
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
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
        
          //handle file upload
        if($request->hasFile('cover_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename=pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension=$request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore=$filename . '_' . time() . '.' . $extension;
            //Upload Image
            $path=$request->file('cover_image')->storeAs('public/img', $fileNameToStore);


        }else{
            $fileNameToStore='noimage.jpg';
        }

        $post= new Post;
        $post->title= $request->input('title');
        $post->body= $request->input('body');
        $post->user_id= auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post= Post::findOrFail($id);

        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts');
        }

        return view('posts.edit')->with('post', $post);
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required' 
        ]);
            //handle file upload
        if($request->hasFile('cover_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename=pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension=$request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore=$filename . '_' . time() . '.' . $extension;
            //Upload Image
            $path=$request->file('cover_image')->storeAs('public/img', $fileNameToStore);
        }
        $post= Post::find($id);
        $post->title= $request->input('title');
        $post->body= $request->input('body');

        if($request->hasFile('cover_image')){
            if($post->cover_image != 'noimage.jpg') {
                Storage::delete('public/img/' . $post->cover_image);
            }
            $post->cover_image = $fileNameToStore;
        }
        $post->save();

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts');
        }

        if($post->cover_image != 'noimage.jpg'){
            Storage::delete('public/img/' . $post->cover_image);
        }

        $post->delete();
        return redirect('/posts');
    }

    public function search(){
        if (isset($_GET['search'])){
            $search=$_GET['search'];
            $posts=Post::where('title','LIKE','%'.$search.'%')->orderBy('created_at', 'desc')->paginate(6);
            return view('posts.index', ['posts'=>$posts]);
        }else{
            return redirect('/posts');
        }
    }
}
