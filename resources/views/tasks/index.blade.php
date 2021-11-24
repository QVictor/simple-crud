@extends('tasks.layout')

@section('title', 'Tasks')

@section('content')
    <table class="table caption-top md-3">
        <caption>List of tasks</caption>
        <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>description</th>
            <th>author</th>
            <th>deadline</th>
            <th>create</th>
            <th>update</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr>
                <th scope="row">{{$task->id}}</th>
                <td>{{$task->name}}</td>
                <td>{{mb_strimwidth($task->description, 0, 20).'...'}}</td>
                <td>{{$task->author}}</td>
                <td>{{$task->deadline}}</td>
                <td>{{$task->created_at}}</td>
                <td>{{$task->updated_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $tasks->links() }}
@endsection
