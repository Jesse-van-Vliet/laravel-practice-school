<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class ProjectController extends Controller
{
//    set permission on methods

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:index project', ['only' => ['index']] );
        $this->middleware('permission:show project', ['only' => ['show']] );
        $this->middleware('permission:create project', ['only' => ['create', 'store']] );
        $this->middleware('permission:edit project', ['only' => ['edit', 'update']] );
        $this->middleware('permission:delete project', ['only' => ['delete', 'destroy']] );
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get all projects
        $projects = Project::all();

//        return view with projects
        return view('admin.projects.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param ProjectStoreRequest $request
     * @return RedirectResponse
     */

    public function store(ProjectStoreRequest $request): RedirectResponse
    {
        //
//        $project = Project::create(['name' => $request->name, 'description' => $request->description]);
        $project = new Project();
        $project->name = $request->name;
        $project->description = $request->description;
        $project->save();

        return to_route('projects.index');
    }

    /**
     * Display the specified resource.
     */

//    @param Project $project
//    @return View


    public function show(Project $project)
    {
        return view ( "admin.projects.show", ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     */
//    @param ProjectUpdateRequest $request
//    @param Project $project
//    @return RedirectResponse

    /**
     * Store a newly created resource in storage.
     * @param ProjectUpdateRequest $request
     * @param Project $project
     * @return RedirectResponse
     */

    public function update(ProjectUpdateRequest $request, Project $project): RedirectResponse
    {
        $project->name = $request->name;
        $project->description = $request->description;
        $project->save();

        return to_route('projects.index')->with('status', "project $project->name updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */

    /**
     * Store a newly created resource in storage.
     * @param Project $project
     * @return view
     */
    public function delete(Project $project): view
    {
        return view('admin.projects.delete', ['project' => $project]);
    }



    public function destroy(Project $project)
    {
        $project->delete();
        return to_route('projects.index')->with('status', "project $project->name deleted successfully");
    }
}
