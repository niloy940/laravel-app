<?php

namespace App\Http\Controllers;

use App\Project;
use App\Services\Twitter;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('auth')->only(['store', 'update']);
        // $this->middleware('auth')->except(['show']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Twitter $twitter)
    {
        $projects = Project::where('owner_id', auth()->id())->get();

        return view('projects.index', compact('projects', 'twitter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Project $project)
    {
        // $project->createProject($request);   //using Eloquent Relationships

        $attributes = $project->validateProject($request);

        $attributes['owner_id'] = auth()->id();

        $project->createProject($attributes);

        return redirect('/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //user can only view his projects
        /*if ($project->owner_id !== auth()->id()) {
            abort(403);
        }*/
        // or
        // abort_if($project->owner_id !== auth()->id(), 403);
        // or
        // auth()->user()->can('update', $project); through policy
        // or
        /* through middleware & policy in web.php
           like this-- Route::resource('projects', 'ProjectsController')->middleware('can:update,project');
           -- it will be applied for all methods in the controller */

        //or
        // through policy class, it will be applied for this method only
        // so we have to add this every method of the controller
        // recommended approch
        $this->authorize('update', $project);

        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $this->authorize('update', $project);

        // $attributes = $project->validateProject($request);

        $project->updateProject($request);

        return redirect("/projects/$project->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $this->authorize('update', $project);

        $project->deleteProject();

        return redirect('/projects');
    }
}
