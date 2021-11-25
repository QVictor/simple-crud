@extends('tasks.layout')


@section('content')
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{$task->name}}</h5>
            <p class="card-text">{{$task->description}}</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">author - {{$task->author}}</li>
            <li class="list-group-item">deadline - {{$task->deadline}}</li>
        </ul>
        <div class="card-body">
            @include('tasks.buttons.back', ['task' => $task])
            @include('tasks.buttons.edit', ['task' => $task])
            @include('tasks.buttons.destroy', ['task' => $task])
        </div>
    </div>
@endsection
