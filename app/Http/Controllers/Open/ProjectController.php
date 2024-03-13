<?php

namespace App\Http\Controllers\Open;

use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
    * @return View
    */

    public function index(): view
    {
        //get all projects
        $projects = Project::paginate(8);
        return view('open.projects.index', compact('projects'));
    }
}
