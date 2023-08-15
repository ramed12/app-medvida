<?php

namespace App\Repositories;

use App\Models\ProviderDocument;
use App\Repositories\Contracts\ProviderDocumentRepositoryInterface;

class ProviderDocumentRepository extends BaseRepository implements ProviderDocumentRepositoryInterface
{
    protected $model;

    public function __construct(ProviderDocument $model)
    {
        parent::__construct($model);
        $this->model =  $model;
    }

    public function whereAnd($fields, $values)
    {
        return $this->model->where($fields[0], $values[0])->where($fields[1], $values[1])->first();
    }
}
