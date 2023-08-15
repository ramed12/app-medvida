<?php

namespace App\Repositories;

use App\Models\Address;
use App\Repositories\Contracts\AddressRepositoryInterface;

class AddressRepository extends BaseRepository implements AddressRepositoryInterface
{
    protected $model;

    public function __construct(Address $model)
    {
        parent::__construct($model);
        $this->model =  $model;
    }
}
