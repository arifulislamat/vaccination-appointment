<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Events\AppointmentCreated;
use App\Events\AppointmentUpdated;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected $repository = NULL;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function getUserAppointment($userId)
    {
        return $this->repository->getOneByUserAndStatusConfirmed($userId);
    }

    public function getUserAppointments($userId)
    {
        return $this->repository->getUserAppointments($userId);
    }

    public function storeAppointment(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'vaccine_id' => 'required',
            'hospital_id' => 'required',
            'appointment_datetime' => 'required',
        ]);

        $input = $request->only('user_id', 'vaccine_id', 'hospital_id', 'appointment_datetime');
        $appointment = $this->repository->createAppointment($input);
        $this->eventCreateAppointment($appointment, $request);
        return $appointment;
    }

    public function hospitals()
    {
        return $this->repository->getAllHospital();
    }

    public function getHospital($hospitalId)
    {
        return $this->repository->getHospitalById($hospitalId);
    }

    public function vaccines()
    {
        return $this->repository->getAllVaccine();
    }

    public function getVaccine($vaccineId)
    {
        return $this->repository->getVaccineById($vaccineId);
    }

    public function getAppointment($appointmentId)
    {
        return $this->repository->getAppointmentById($appointmentId);
    }

    public function updateAppointment($appointmentId, Request $request)
    {
        $appointment = $this->repository->getAppointment($appointmentId);
        $response = $this->repository->updateAppointment($appointment, $request->only('user_id', 'vaccine_id', 'hospital_id', 'status', 'appointment_datetime'));
        $this->eventUpdateAppointment($appointment, $request);
        return $response;
    }

    public function eventUpdateAppointment(Appointment $appointment, $request)
    {
        $appointment = $this->repository->getAppointmentById($appointment->id);

        $data = new \stdClass();
        $data->user_id = $request->get('user_id');
        $data->username = $request->get('user_name');
        $data->email = $request->get('user_email');
        $data->vaccine_id = $appointment->vaccine->id;
        $data->vaccine = $appointment->vaccine->name;
        $data->hospital_id = $appointment->hospital->id;
        $data->hospital = $appointment->hospital->name;
        $data->date = $appointment->appointment_datetime;
        $data->status = $appointment->status;

        event(new AppointmentUpdated($data));
    }

    public function eventCreateAppointment(Appointment $appointment, $request)
    {
        $appointment = $this->repository->getAppointmentById($appointment->id);

        $data = new \stdClass();
        $data->user_id = $request->get('user_id');
        $data->username = $request->get('user_name');
        $data->email = $request->get('user_email');
        $data->vaccine_id = $appointment->vaccine->id;
        $data->vaccine = $appointment->vaccine->name;
        $data->hospital_id = $appointment->hospital->id;
        $data->hospital = $appointment->hospital->name;
        $data->date = $appointment->appointment_datetime;

        event(new AppointmentCreated($data));
    }
}
