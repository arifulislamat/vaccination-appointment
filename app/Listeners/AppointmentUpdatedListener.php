<?php

namespace App\Listeners;

use App\Jobs\AppointmentUpdatedJob;
use Illuminate\Support\Facades\Queue;

class AppointmentUpdatedListener
{
    private $queue_name = "appointment-updated";

    public function __construct()
    {
    }

    public function handle($event)
    {
        Queue::push(new AppointmentUpdatedJob($event->data), $event->data, $this->queue_name);
    }
}
