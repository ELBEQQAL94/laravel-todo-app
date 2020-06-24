@extends('layouts.master')

@section('content')
<div class="container">
    <h1 class="text-center mt-4 mb-4">ToDo App </h1>
    @if(session()->has('msg'))
     <div class="alert alert-success">{{ session()->get('msg') }}</div>
    @endif
    <form action=" {{ route('task.create') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror is-valid" id="title" aria-describedby="title">

            @error('title')
            <small id="title" class="invalid-feedback">
                {{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <ul class="mt-4 list-group">
        @foreach($todos as $todo)
        <li class="list-group-item">
            <div class="row">
                <div class="col">
                    {{ $todo->title }}
                </div>
                <div class="col">
                    <form action="{{ route('task.delete', $todo->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger text-uppercase btn-block">
                    </form>
                        delete
                    </button>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>

@endsection
