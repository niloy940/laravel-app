<?php

namespace App;

use App\Task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Project extends Model
{
    protected $guarded = [];

    public function validateProject(Request $request)
    {
        return $request->validate(
            [
                'title' => ['required', 'min:3', 'max:255'],
                'description' => ['required', 'min:6']
            ]
        );
    }

    public function createProject(Request $request)
    {
        $this->create($this->validateProject($request));
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
}
