<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\View\View;


class TaskController extends Controller
{
    /**
     * @return View.
     */

//    public function __construct()
//    {
//        $this->middleware('auth');
//        $this->middleware('permission:index task', ['only' => ['index']] );
//        $this->middleware('permission:show task', ['only' => ['show']] );
//        $this->middleware('permission:create task', ['only' => ['create', 'store']] );
//        $this->middleware('permission:edit task', ['only' => ['edit', 'update']] );
//        $this->middleware('permission:delete task', ['only' => ['delete', 'destroy']] );
//    }

    public function index(): View
    {
        $tasks = Task::with( 'project', 'activity')->paginate(15);
        Return view('admin.tasks.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskStoreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
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
