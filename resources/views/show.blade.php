@extends('layouts.app')
@section('title')
    Single Todo: {{ $todo->name }}
@endsection

@section('content')
    <h1 class="text-center my-5">
        {{ $todo->name }}
    </h1>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-default">
                <div class="card-header">
                    Details
                </div>

                <div class="card-body">
                    {{ $todo->description }}
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6"><a href="/todos/{{ $todo->id }}/edit" class="btn btn-info d-block">Edit</a>
                        </div>
                        <div class="col-md-6"><a href="/todos/{{ $todo->id }}/delete" class="btn btn-danger d-block">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
