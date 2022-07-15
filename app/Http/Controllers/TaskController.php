<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tasks;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;
class TaskController extends Controller
{
    /**
     * the task repository instance;
     *  @var TaskRespository
     */
     protected $tasks;
    /**      
     * @return void
    */

---
    /**
     * Create a new task.
     * @param  Request  $request
     * @return Response
     */

    public function __construct()
    {
        $this->middleware("auth");
    }
    
    public function index(Request $request){
        $tasks=Task::where("user_id",$request->user()->id)->get();

        //$user=User::where("id", $request->tasks()->user_id)->get();
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
