<?php

namespace App\Services;

use App\Repositories\Contracts\PatientsRepositoryInterface;
use App\Repositories\PacientesRepository;
use App\Services\BaseService;
use App\Services\Contracts\PatientsServiceInterface;

class PatientsService extends BaseService implements PatientsServiceInterface
{
    public function __construct(PatientsRepositoryInterface $planRepository)
    {
        parent::__construct($planRepository);
    }
}
