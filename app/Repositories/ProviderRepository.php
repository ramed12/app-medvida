<?php

namespace App\Repositories;

use App\Models\Provider;
use App\Repositories\Contracts\ProviderRepositoryInterface;

class ProviderRepository extends BaseRepository implements ProviderRepositoryInterface
{
    protected $model;

    public function __construct(Provider $model)
    {
        parent::__construct($model);
        $this->model =  $model;
    }
}
