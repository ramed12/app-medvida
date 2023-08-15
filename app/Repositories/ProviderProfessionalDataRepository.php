<?php

namespace App\Repositories;

use App\Models\ProviderProfessionalData;
use App\Repositories\Contracts\ProviderProfessionalDataRepositoryInterface;

class ProviderProfessionalDataRepository extends BaseRepository implements ProviderProfessionalDataRepositoryInterface
{
    protected $model;

    public function __construct(ProviderProfessionalData $model)
    {
        parent::__construct($model);
        $this->model =  $model;
    }
}
