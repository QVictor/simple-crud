<form method="POST" action="{{route('tasks.destroy', $task)}}">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger" type="submit">delete</button>
</form>
