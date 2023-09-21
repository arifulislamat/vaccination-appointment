<?php

namespace App\Listeners;

use App\Jobs\AppointmentCreatedJob;
use Illuminate\Support\Facades\Queue;

class AppointmentCreatedListener
{
    private $queue_name = "appointment-created";

    public function __construct()
    {
    }

    public function handle($event)
    {
        Queue::push(new AppointmentCreatedJob($event->data), $event->data, $this->queue_name);
    }
}
