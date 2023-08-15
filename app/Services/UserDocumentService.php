<?php 

namespace App\Services;

use App\Repositories\Contracts\UserDocumentRepositoryInterface;
use App\Services\Contracts\UserDocumentServiceInterface;

class UserDocumentService extends BaseService implements UserDocumentServiceInterface
{
    protected $userDocumentRepository;

    public function __construct(UserDocumentRepositoryInterface $userDocumentRepository)
    {
        parent::__construct($userDocumentRepository);

        $this->userDocumentRepository = $userDocumentRepository;
    }

    public function whereAnd($fields, $values)
    {
        return $this->userDocumentRepository->whereAnd($fields, $values);
    }
}