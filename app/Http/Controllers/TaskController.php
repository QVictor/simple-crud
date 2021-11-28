<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $tasks = Task::paginate(15);
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTaskRequest $request
     * @return RedirectResponse
     */
    public function store(StoreTaskRequest $request): RedirectResponse
    {
        Task::create($request->only('name', 'description', 'author', 'deadline'));
        return redirect()->route('tasks.index')->with('info', 'Created task with name ' . $request->name);
    }

    /**
     * Display the specified resource.
     *
     * @param Task $task
     * @return Application|Factory|View
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Task $task
     * @return Application|Factory|View
     */
    public function edit(Task $task)
    {
        $task->deadline = self::deadlineToFormatHTML($task->deadline);
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTaskRequest $request
     * @param Task $task
     * @return RedirectResponse
     */
    public function update(UpdateTaskRequest $request, Task $task): RedirectResponse
    {
        $request->deadline = self::deadlineToFormatBD($request->deadline);
        $task->update($request->only('name', 'description', 'author', 'deadline'));
        return redirect()->route('tasks.index')->with('info', 'Update task ' . $task->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Task $task
     * @return RedirectResponse
     */
    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('danger', 'Deleted task ' . $task->name);
    }

    private static function deadlineToFormatHTML($deadline): string
    {
        $deadline = Carbon::make($deadline);
        return $deadline->format('Y-m-d') . 'T' . $deadline->format('H:i');
    }

    private static function deadlineToFormatBD($deadline): string
    {
        return Carbon::make($deadline)->format('Y-m-d H:i:s');
    }
}
