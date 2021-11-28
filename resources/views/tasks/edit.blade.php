@extends('tasks.layout')

@section('content')
    <div class="container">
        @include('tasks.buttons.back')
        <form method="POST" action="{{route('tasks.update', $task)}}">
            @csrf
            @method('PUT')
            <h2>Edit task</h2>
            <div class="mb-3 row">
                <label for="name" class="col-form-label col-sm-1">name:</label>
                <div class="col-sm-10">
                    <input name="name" value="{{old('name', isset($task) ? $task->name : null)}}" type="text"
                           class="form-control"
                           id="name" placeholder="name task">
                    @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="description" class="col-form-label col-sm-1">description:</label>
                <div class="col-sm-10">
                    <textarea name="description" type="text"
                              class="form-control" id="description"
                              placeholder="description">{{old('description', isset($task) ? $task->description : null)}}</textarea>
                    @error('description')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="author" class="col-form-label col-sm-1">author:</label>
                <div class="col-sm-10">
                    <input name="author" value="{{old('author', isset($task) ? $task->author : null)}}" type="text"
                           class="form-control" id="author" placeholder="author">
                    @error('author')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="deadline" class="col-form-label col-sm-1">deadline:</label>
                <div class="col-sm-3">
                    <input name="deadline" value="{{old('deadline', isset($task) ? $task->deadline : null)}}"
                           type="datetime-local"
                           class="form-control" id="deadline">
                    @error('deadline')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <button type="submit" class="btn btn-warning">update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
