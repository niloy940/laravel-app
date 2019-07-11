<?php

namespace App\Listeners;

use App\Events\ProjectCreated;
use App\Mail\ProjectCreated as ProjectCreatedMail;
use App\Notifications\ProjectCreatedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendProjectCreatedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProjectCreated  $event
     * @return void
     */
    public function handle(ProjectCreated $event)
    {
        /*Mail::to($event->project->owner->email)->send(
            new ProjectCreatedMail($event->project)
        );*/

        $event->project->owner->notify(new ProjectCreatedNotification($event->project));
    }
}
