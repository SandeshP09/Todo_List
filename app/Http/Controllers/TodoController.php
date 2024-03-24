<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TodoController extends Controller
{
    //Show the index page
    public function todo()
    {
        $TodoData = Todo::paginate(7);
        return view('main', ['TodoData' => $TodoData]);
    }


    //validate task and save 
    public function todoValid(Request $request)
    {
        $validateTodo = $request->validate([
            'description' => 'required|nullable|string|max:255'
        ], [
            'description.required' => "Add Description",
            'description.regex' => "Minimum 10 words are required",

        ]);
        if ($validateTodo) {

            $todo = new todo();
            $todo->description = $request->description;
            try {
                $todo->save();
                return Redirect::to('/')->with('Success', 'Task created successfully');
            } catch (\Illuminate\Database\QueryException $e) {
                return back()->with('Error', 'Adding todo failed: ' . $e->getMessage());
            }

        }
    }

    //edit listed task and save
    public function editTodo($id)
    {

        $todoData = todo::where('id', '=', $id)->first();

        return view('editTodo', ['todoData' => $todoData]);
    }


    //validate todo description and save
    public function edittodovalid(Request $request)
    {
        $validateTodo = $request->validate([
            'description' => 'required|nullable|string|max:255'
        ], [
            'description.required' => "Add Description",
            'description.regex' => "Minimum 10 words are required",

        ]);
        if ($validateTodo) {
            $todo = todo::where('id', '=', $request->id)->first();


            $todo->description = $request->description;


            try {
                $todo->save();
                return Redirect::to('/')->with('Success', 'TODO updated successfully');
            } catch (\Illuminate\Database\QueryException $e) {
                return back()->with('Error', 'Updating Todo  failed' . $e->getMessage());
            }
        }
    }

    //Delete Todo 
    public function delTodo(Request $request)
    {

        $id = $request->id;
        $todo = todo::where('id', '=', $id)->first();
        $todo->description = $request->description;
        try {
            $todo->delete();
            return Redirect::to('/')->with('Success', 'TODO deleted successfully');
        } catch (\Illuminate\Database\QueryException $e) {
            return "Error deleting Data - " . $e->getMessage();
        }
    }

    // Update status of the task
    public function todoCompleted(Request $request)
    {
       todo::where('id', '=', $request->id)->update(['status' => 'Completed']);
        return redirect ('/');
    }
}

