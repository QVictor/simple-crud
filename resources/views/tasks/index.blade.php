@extends('tasks.layout')

@section('title', 'Tasks')

@section('content')
    <div class="container">
        <table class="table table-sm text-center">
            <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>description</th>
                <th>author</th>
                <th>deadline</th>
                <th>edit</th>
                <th>delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr>
                    <th scope="row">{{$task->id}}</th>
                    <td><a href="{{route('tasks.show', $task)}}">{{$task->name}}</a></td>
                    <td>{{mb_strimwidth($task->description, 0, 20).'...'}}</td>
                    <td>{{$task->author}}</td>
                    <td>{{$task->deadline}}</td>
                    <td>@include('tasks.buttons.edit', ['task' => $task])</td>
                    <td>@include('tasks.buttons.destroy', ['task' => $task])</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="container row">
            <div class="col-sm-5">{{ $tasks->links() }}</div>
            <div class="col-sm-7 text-end">@include('tasks.buttons.create')</div>
        </div>
    </div>
@endsection
