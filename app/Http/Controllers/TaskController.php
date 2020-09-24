<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function index() {

        $tasks = Task::all();

       // dd($tasks);
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request) {
        //validation

        $request->validate([
            'title' => 'required'
        ]);

        //dd($request->title);

        Task::create([
            'title' => $request->title
        ]);

        session()->flash('msg', 'Task has been created');

        return redirect('/');
    }
    

    public function destroy($id) {
        //dd($id);

        Task::destroy($id);

        return redirect()->back()->with('msg', 'Task has been deleted');
        
    }
}
