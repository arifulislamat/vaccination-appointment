<?php

namespace App\Console\Commands;

use App\Models\Appointment;
use Illuminate\Console\Command;
use App\Events\AppointmentUpdated as EventsAppointmentUpdated;

class AppointmentUpdated extends Command
{
    protected $signature = 'appointment:update';

    protected $description = 'appointment update';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $appointment = Appointment::with(['vaccine', 'hospital'])->first();
        event(new EventsAppointmentUpdated(json_decode(json_encode($appointment))));
        return 0;
    }
}
