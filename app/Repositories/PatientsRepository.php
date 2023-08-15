<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\PatientsRepositoryInterface;

class PatientsRepository extends BaseRepository implements PatientsRepositoryInterface{
    public function __construct(User $userRepository)
    {
        parent::__construct($userRepository);
    }
}
