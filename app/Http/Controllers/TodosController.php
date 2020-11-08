<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodosController extends Controller
{
    public function index(){
        $todos = Todo::all();
        return view('index',['todos'=>$todos]);
    }

    public function show(Todo $todo){
        return view('show',['todo'=>$todo]);
    }

    public function create(){
        return view('create');
    }
    public function store(){
        $this->validate(\request(),[
            'name' => 'required',
            'description' => 'required'
        ]);

        $data = \request()->all();
        $todo = new Todo();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;
        $todo->save();
        session()->flash('success','Todo created successfully.');
        return redirect('/todos');
    }

    public function edit(Todo $todo){
        return view('edit',['todo'=>$todo]);
    }

    public function update(Todo $todo){

        $this->validate(\request(),[
            'name' => 'required',
            'description' => 'required'
        ]);

        $data = \request()->all();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;
        $todo->save();
        session()->flash('update','Todo updated successfully.');

        return redirect('/todos');
    }

    public function destroy(Todo $todo){
        $todo->delete();
        session()->flash('delete','Todo deleted successfully.');
        return redirect('todos');
    }

    public function complete(Todo $todo){
        $todo->completed = true;
        $todo->save();
        session()->flash('complete','Todo completed successfully.');
        return redirect('todos');
    }
}
