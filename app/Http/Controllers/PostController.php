<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // the next is equivalent to select * from posts the variable just to store it  
        $posts = Post::all();
        // Coming from User model -- adding the query to show data from user table alongside with post
        //Return View

        return view("posts.index", ["posts"=>$posts]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Load Page
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        // Retrieve data note that names should be set the same in database N form attribute name
        // $data = $request->all();
        
        // I wanna talk to db to add the new data (store) it should be done through model so controller talks to mode N model talks to the db therefore i have to call db by the following (Post::create) as i used before Post::all to show 
        // Post::create([
        //      "title"=>$request->title,
        //      "description"=>$request->description   
          // ]);
          //This validation F will do the job needs only to display $error (which was created by the F ) in corresponding view 
          //validate([roles],[msgs]);
          //Took the validation into a new lvl by creating a request then F to validate to easy use it in update or anywhere 
            // $request->validate([
            //     'title'=>'required|min:3',
            //     'description'=>'required'
            // ],[
            //     'title.required'=>"Title is null",
            //     'title.min'=>"Title must be more than 3 chars",
            //     'description.required'=>"Description is null"
            // ]);



             // It Could be done like this also
            $post= new Post;
            $post->title=$request->title;
            $post->description=$request->description;
            $post->user_id=Auth::id();
            $post->save(); 

        return redirect()->route("posts.index");
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
        return view("posts.show",$post);

        // select * from posts where id = $id; (regular query) using mvc done by the following
        // This function is eligible to find the primary key (id) on its own
        // If i want to show another column then use the following (title = 1)
        //Post::where("title","1");
        // Also it can takes 3 paras as follows

        //Post::where("id",">",2);

        // where will return multiple data therefore i have to use ->get()  to return all the data also i can use fist for the 1st
        // also i can use multiple conditions Post::where("id",">",2)->where("")->where("")->get();
   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // This is all i need here the edit f is responsible to view data only next is the update f which takes $request(data & id)
        $post = Post::find($id);
        return view("posts.edit",$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, $id)
    {
        $post= Post::find($id);
        $post->title=$request->title;
        $post->description=$request->description;
        $post->save();
        return redirect()->route("posts.index");
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete by 2 methods
        //Post::find($id)->delete();
        Post::destroy($id);

        return redirect()->route("posts.index");

    }
}
