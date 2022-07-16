@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
              <div class="panel-heading">
                  Create a task
              </div>
             
                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')
             
                    <!-- New Task Form -->
                    <form action="/task" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
             
                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label"> {{ __('Task') }}</label>
             
                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control">
                            </div>
                        </div>
            
                        <div class="form-group">
                            <label for="task table" class="col-sm-3 control-label">{{__('second task')}}</label>
            
                            <div class="col-sm-6">
                                <input type="text" name="stask" class="form-control" id="">
                            </div>
                        </div>
             
                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-plus"></i> Add Task
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!--current task list-->
            @if(count($tasks) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                        Current task list
                </div>
           

            <div class="panel-body">
                <table class="table table-striped task-table">
                    <!--table heading-->
                    <thead>
                        <th>Tasks</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!--table body-->
                    <tbody>
                       @foreach($tasks as $task)
                            <tr>
                                <td class="table-text">
                                    <div>{{$task->name}}</div>
                                </td>
                                <td>
                                    <div>{{$task->secondtask}}</div>
                                </td>
                                <td>
                                   <form action="/task/{{$task->id}}" method="POST">
                                        {{csrf_field() }}
                                        {{ method_field("DELETE") }}

                                        <button class="btn btn-danger">delete</button>
                                   </form>
                                </td>
                            </tr>

                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
       
            @endif
        </div>
    </div>
    <!-- TODO: Current Tasks -->
@endsection