<?php 

namespace App\Services;

use App\Repositories\Contracts\NotificationRepositoryInterface;
use App\Services\Contracts\NotificationServiceInterface;

class NotificationService extends BaseService implements NotificationServiceInterface
{
    protected $userDocumentRepository;

    public function __construct(NotificationRepositoryInterface $userDocumentRepository)
    {
        parent::__construct($userDocumentRepository);

        $this->userDocumentRepository = $userDocumentRepository;
    }
}