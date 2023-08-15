<?php 

namespace App\Services;

use App\Repositories\Contracts\PlanRepositoryInterface;
use App\Services\Contracts\PlanServiceInterface;

class PlanService extends BaseService implements PlanServiceInterface
{
    protected $planRepository;

    public function __construct(PlanRepositoryInterface $planRepository)
    {
        parent::__construct($planRepository);

        $this->planRepository = $planRepository;
    }
}