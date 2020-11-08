@extends('layouts.app')
@section('title')
    Todos List
@endsection

@section('content')
    <h1 class="text-center my-5">TODOS PAGE</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
            @elseif(session()->has('update'))
                <div class="alert alert-primary">
                    {{session()->get('update')}}
                </div>
            @elseif(session()->has('delete'))
                <div class="alert alert-danger">
                    {{session()->get('delete')}}
                </div>
            @elseif(session()->has('complete'))
                <div class="alert alert-info">
                    {{session()->get('complete')}}
                </div>
            @endif
            <div class="card card-default">
                <div class="card-header">
                    Todos
                </div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach($todos as $todo)
                            <li class="list-group-item">
                                {{ $todo->name }}
                                @if(!$todo->completed)
                                    <a href="/todos/{{ $todo->id }}/complete" class="btn btn-success btn-sm float-right mx-2">Complete</a>
                                @endif
                                <a href="/todos/{{ $todo->id }}" class="btn btn-primary btn-sm float-right mx-2">View</a>
                                <a href="/todos/{{ $todo->id }}/edit" class="btn btn-info btn-sm float-right mx-2">Edit</a>
                                <a href="/todos/{{ $todo->id }}/delete" class="btn btn-danger btn-sm float-right mx-2">Delete</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
