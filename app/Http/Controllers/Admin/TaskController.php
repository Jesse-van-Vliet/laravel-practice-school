<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\View\View;
use phpDocumentor\Reflection\Utils;
use App\Models\Project;
use App\Models\User;
use App\Models\Activity;
use Illuminate\Http\RedirectResponse;





class TaskController extends Controller
{
    /**
     * @return View.
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:index task', ['only' => ['index']] );
        $this->middleware('permission:show task', ['only' => ['show']] );
        $this->middleware('permission:create task', ['only' => ['create', 'store']] );
        $this->middleware('permission:edit task', ['only' => ['edit', 'update']] );
        $this->middleware('permission:delete task', ['only' => ['delete', 'destroy']] );
    }

    public function index(): View
    {
        $tasks = Task::with( 'project', 'activity')->paginate(15);
        Return view('admin.tasks.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): view
    {
        $projects = Project::all();
        $users = User::all();
        $tasks = Task::all();
        $activity = Activity::all();
        return view('admin.tasks.create', ['task' => $tasks, 'users' => $users, 'project' => $projects, 'activity' => $activity] );
    }


    /**
     * Store a newly created resource in storage.
     * @param TaskStoreRequest $request
     * @return RedirectResponse

     */

    public function store(TaskStoreRequest $request): RedirectResponse
    {
        $task = new Task();
        $task->task = $request->task;
        $task->begindate = $request->begindate;
        $task->enddate = $request->enddate;
        $task->project_id = $request->project_id;
        $task->activity_id = $request->activity_id;
        $task->user_id = $request->user_id;
        $task->save();

        return to_route('tasks.index')->with('status', "Task $task created successfully");
    }


    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('admin.tasks.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskUpdateRequest $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
