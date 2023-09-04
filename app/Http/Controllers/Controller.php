<?php

namespace App\Http\Controllers;

use App\Repositories\Repository;
use Illuminate\Http\Request;
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
        return $this->repository->createAppointment($input);
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
}
