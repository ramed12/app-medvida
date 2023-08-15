<?php

namespace App\Services;

use App\Repositories\Contracts\SpecialtiesRepositoryInterface;
use App\Services\Contracts\SpecialtiesServiceInterface;

class SpecialtiesService extends BaseService implements SpecialtiesServiceInterface
{
    protected $repository;

    public function __construct(SpecialtiesRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}