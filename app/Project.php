<?php

namespace App;

use App\Events\ProjectCreated;
use App\Task;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Project extends Model
{
    protected $guarded = [];

    // using default eloquent model event
    /*protected static function boot()
    {
        //overighting the method of Model class
        parent::boot();

        //this method will only be triggered if project created
        static::created(function ($project) {
            Mail::to($project->owner->email)->send(
                new ProjectCreated($project)
            );
        });
    }*/
    // or using custom event

    // mapping between eloquent model event & custom event class
    protected $dispatchesEvents = [
        'created' => ProjectCreated::class
    ];

    public function validateProject(Request $request)
    {
        return $request->validate(
            [
                'title' => ['required', 'min:3', 'max:255'],
                'description' => ['required', 'min:6']
            ]
        );
    }

    public function createProject($attributes)
    {
        // $this->create($this->validateProject($request));

        $this->create($attributes);

        // $project = $this->create($attributes);

        /*\Mail::to($project->owner->email)->send(
            new ProjectCreated($project)
        );*/

        // custom event calling
        // event(new ProjectCreated($project));   //alternatively we used mapping
    }

    public function updateProject(Request $request)
    {
        $this->update($this->validateProject($request));
    }

    public function deleteProject()
    {
        $this->delete();
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($attributes)
    {
        // $attributes = $task->validateTask($body);

        $this->tasks()->create($attributes);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
