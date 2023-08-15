<?php

namespace App\Repositories;

use App\Models\Specialty;
use App\Repositories\Contracts\SpecialtiesRepositoryInterface;

class SpecialtiesRepository extends BaseRepository implements SpecialtiesRepositoryInterface
{
    protected $model;

    public function __construct(Specialty $model)
    {
        $this->model = $model;
    }
}