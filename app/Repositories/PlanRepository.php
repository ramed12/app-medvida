<?php

namespace App\Repositories;

use App\Models\Plan;
use App\Repositories\Contracts\PlanRepositoryInterface;

class PlanRepository extends BaseRepository implements PlanRepositoryInterface{
    protected $model;

    public function __construct(Plan $model)
    {
        parent::__construct($model);
        $this->model =  $model;
    }
}