<?php

namespace App\Services;

use App\Repositories\Contracts\AdministratorRepositoryInterface;
use App\Services\Contracts\AdministratorServiceInterface;

class AdministratorService extends BaseService implements AdministratorServiceInterface
{
    protected $administratorRepository;

    public function __construct(AdministratorRepositoryInterface $administratorRepository)
    {
        parent::__construct($administratorRepository);

        $this->administratorRepository = $administratorRepository;
    }
}
