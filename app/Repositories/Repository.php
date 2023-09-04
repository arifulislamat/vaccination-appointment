<?php

namespace App\Repositories;

use App\Models\Appointment;
use App\Models\Hospital;
use App\Models\Vaccine;

class Repository
{
    public function getAllAppointment()
    {
        return Appointment::all();
    }

    public function getAppointmentById($appointmentId)
    {
        return Appointment::where('id', $appointmentId)->first();
    }

    public function getOneByUserAndStatusConfirmed($userId)
    {
        return Appointment::where('user_id', $userId)
            ->where('status', 'confirmed')
            ->first();
    }

    public function getUserAppointments($userId)
    {
        return Appointment::where('user_id', $userId)->get();
    }

    public function createAppointment($data)
    {
        $data['status'] = "pending";
        return Appointment::create($data);
    }

    public function getAllHospital()
    {
        return Hospital::all();
    }

    public function getHospitalById($hospitalId)
    {
        return Hospital::where('id', $hospitalId)->first();
    }

    public function createHospital($data)
    {
        return Hospital::create($data);
    }

    public function getAllVaccine()
    {
        return Vaccine::all();
    }

    public function getVaccineById($vaccineId)
    {
        return Vaccine::where('id', $vaccineId)->first();
    }

    public function createVaccine($data)
    {
        return Vaccine::create($data);
    }
}
