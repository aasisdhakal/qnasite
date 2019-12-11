<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Taskmodel;
use Illuminate\Support\Facades\DB;

class Taskcontroller extends Controller
{
    //

    public function index()
    {
        return DB::table('TaskTable')->select('id', 'task','Created_at')->get();
    }


    public function show($id){

        return Taskmodel::find($id);

    }


    public function store(Request $request)
    {

        $flight = new Taskmodel();

        $flight->task = $request->task;

        $flight->save();

        return $flight;


    }

    public function update(Request $request ,$id){

        $task = Taskmodel::findorfail($id);

        $task->update($request->all());

    }

    public function delete(Request $request , $id){


        $task = Taskmodel::findorfail($id);

        $task->delete();

        return 204;

    }
}
