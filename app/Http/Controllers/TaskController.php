<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
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
      * create a repository instance
      * @param TaskRepository $task    
      * @return void
     */

    public function __construct(TaskRepository $tasks)
    {
        $this->middleware("auth");

        $this->tasks=$tasks;
    }



    /**
     * display  a list of all users
     * @param  Request  $request
     * @return Response
     */

    public function index(Request $request){
        //$user=User::where("id", $request->tasks()->user_id)->get();
        return view('tasks.index',[
            "tasks"=>$this->tasks->forUser($request->user())
        ]);
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
