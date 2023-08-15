<?php

namespace App\Repositories;

use App\Models\Administrator;
use App\Repositories\Contracts\AdministratorRepositoryInterface;

class AdministratorRepository extends BaseRepository implements AdministratorRepositoryInterface
{
    protected $model;

    public function __construct(Administrator $model)
    {
        parent::__construct($model);
        $this->model =  $model;
    }
}
