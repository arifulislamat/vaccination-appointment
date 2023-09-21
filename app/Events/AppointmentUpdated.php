<?php

namespace App\Events;

class AppointmentUpdated extends Event
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
}
