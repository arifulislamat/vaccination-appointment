<?php

namespace App\Repositories;

use Exception;
use App\Models\Appointment;
use App\Models\Hospital;
use App\Models\Vaccine;

class Repository
{
    public function getAllAppointment()
    {
        return Appointment::all();
    }

    public function getAppointment($appointmentId)
    {
        return Appointment::where('id', $appointmentId)->first();
    }

    public function getAppointmentById($appointmentId)
    {
        return Appointment::where('id', $appointmentId)
            ->with(['vaccine', 'hospital'])
            ->first();
    }

    public function getOneByUserAndStatusConfirmed($userId)
    {
        return Appointment::where('user_id', $userId)
            ->where('status', 'confirmed')
            ->first();
    }

    public function getUserAppointments($userId)
    {
        return Appointment::where('user_id', $userId)
            ->with(['vaccine', 'hospital'])
            ->get();
    }

    public function createAppointment($data)
    {
        $data['status'] = "pending";
        $appointment = Appointment::create($data);
        return $appointment;
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

    public function updateAppointment($appointment, $input)
    {
        try {
            Appointment::where('id', $appointment->id)
                ->update($input);

            $appointment = Appointment::where('id', $appointment->id)
                ->with(['vaccine', 'hospital'])
                ->first();
            return $appointment;
        } catch (Exception $e) {
            dd($e);
            return false;
        }
    }
}
