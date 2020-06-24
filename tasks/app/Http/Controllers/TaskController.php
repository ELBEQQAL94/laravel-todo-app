<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo;

class TaskController extends Controller
{
    public function index() {
        $todos = Todo::all();
        return view('tasks.index', compact('todos'));
    }

    public function store(Request $request) {
        // validation
        $request->validate([
            'title' => 'required',
        ]);

        Todo::create([
            'title' => $request->title,
        ]);

        session()->flash('msg', 'Todo has been created');

        return redirect('/');
    }

    public function destroy($id) {

        Todo::destroy($id);
        session()->flash('msg', 'Todo has been deleted!');
        return redirect('/');

    }
}
