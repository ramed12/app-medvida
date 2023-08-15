<?php

namespace App\Services;

use App\Repositories\Contracts\ProviderRepositoryInterface;
use App\Services\Contracts\ProviderServiceInterface;

class ProviderService extends BaseService implements ProviderServiceInterface
{
    protected $providerRepository;

    public function __construct(ProviderRepositoryInterface $providerRepository)
    {
        parent::__construct($providerRepository);

        $this->providerRepository = $providerRepository;
    }
}
