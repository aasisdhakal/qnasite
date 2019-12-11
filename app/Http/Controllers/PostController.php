<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;


use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Input;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function create()
    {
        $route = "add-post/{id}";

        $tagUrl = "tag-store/{id}";

        return view('layouts.UserPosts.post-create')->with('route',$route)->with('tagUrl',$tagUrl);

    }

    public function store(Request $request)
    {



        $this->validate($request,[

            'title' => 'required',
            'body' => 'required',
        ]);



        $StoreUserInputs = new Post();

        $StoreUserInputs->title = $request->input('title');

        $StoreUserInputs->body = $request->input('body');

        $StoreUserInputs->user_id = $request->user()->id;

        $StoreUserInputs->save();

        $tagNames = explode(',',$request->input('tag'));
        $tagIds =[];


        foreach ($tagNames as $tagName)
        {
            $tag = $StoreUserInputs->tags()->firstOrCreate(['name' => trim($tagName)]);

            if ($tag)
            {
                $tagIds[] = $tag->id;
            }
        }


        $StoreUserInputs->tags()->sync($tagIds);


        return back()->with('success','Item created successfully!');

    }

    public function show($id)
    {

        $showPosts = Post::where('user_id',$id);


        return view('layouts.UserPosts.postShow')->with('showPosts',$showPosts);

    }



    public function showAllPost()
    {
        $getAllPosts =  Post::all()->sortByDesc("created_at");

        return view('home')->with('getAllPosts',$getAllPosts);

    }








}
