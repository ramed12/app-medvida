<?php

namespace App\Repositories;

use App\Models\Notification;
use App\Repositories\Contracts\NotificationRepositoryInterface;

class NotificationRepository extends BaseRepository implements NotificationRepositoryInterface
{
    protected $model;

    public function __construct(Notification $model)
    {
        parent::__construct($model);
        $this->model =  $model;
    }
}