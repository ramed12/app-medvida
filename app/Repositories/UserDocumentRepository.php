<?php

namespace App\Repositories;

use App\Models\UserDocument;
use App\Repositories\Contracts\UserDocumentRepositoryInterface;

class UserDocumentRepository extends BaseRepository implements UserDocumentRepositoryInterface
{
    protected $model;

    public function __construct(UserDocument $model)
    {
        parent::__construct($model);
        $this->model =  $model;
    }
    
    public function whereAnd($fields, $values)
    {
        return $this->model->where($fields[0], $values[0])->where($fields[1], $values[1])->first();
    }
}