<?php

namespace App\Services;

use App\Repositories\Contracts\ProviderDocumentRepositoryInterface;
use App\Services\Contracts\ProviderDocumentServiceInterface;

class ProviderDocumentService extends BaseService implements ProviderDocumentServiceInterface
{
    protected $providerDocumentRepository;

    public function __construct(ProviderDocumentRepositoryInterface $providerDocumentRepository)
    {
        parent::__construct($providerDocumentRepository);

        $this->providerDocumentRepository = $providerDocumentRepository;
    }
    
    public function whereAnd($fields, $values)
    {
        return $this->providerDocumentRepository->whereAnd($fields, $values);
    }
}
