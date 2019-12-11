<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Test;

class TestController extends Controller
{
    //



    public function store(Request $request)
    {

        $storeval = new Test();

        $storeval->name = $request->person_name;

        $storeval->business_name = $request->business_name;

        $storeval->gst_number = $request->gst_number;

        $storeval->save();

        return $storeval;


    }


    public function show()
    {

        $queryshow = Test::all();

        return $queryshow;

    }


    public function update(Request $request, $id)
    {

        $updateval = Test::findorfail($id);

        $updateval->update($request->all());

        return $updateval;

    }


}
