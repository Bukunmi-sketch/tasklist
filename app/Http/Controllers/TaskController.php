<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**      
   * @return void
    */
    /**
 * Create a new task.
 *
 * @param  Request  $request
 * @return Response
 */

    public function __construct()
    {
        $this->middleware("auth");
    }
    
    public function index(Request $request){
        return view('tasks.index');
    }

    public function store(Request $request){
        $this->validate($request, [
            "name"=>"required|max:255",
           // "task"=>"required"
        ]);

        $request->user()->tasks()->create([
            "name"=>$request->name
        ]);

        return redirect("/tasks");
    }
}
