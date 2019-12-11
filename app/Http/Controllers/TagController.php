<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;

class TagController extends Controller
{
    //

    public function store(Request $request)
    {

        $createTag = new Tag();

        $createTag->name = $request->input('tag');

        $createTag->save();


    }

    public function show()
    {




    }
}
