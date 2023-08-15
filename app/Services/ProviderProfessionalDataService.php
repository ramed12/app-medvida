<?php

namespace App\Services;

use App\Repositories\Contracts\ProviderProfessionalDataRepositoryInterface;
use App\Services\Contracts\ProviderProfessionalDataServiceInterface;

class ProviderProfessionalDataService extends BaseService implements ProviderProfessionalDataServiceInterface
{
    protected $providerProfessionalDataRepository;

    public function __construct(ProviderProfessionalDataRepositoryInterface $providerProfessionalDataRepository)
    {
        parent::__construct($providerProfessionalDataRepository);

        $this->providerProfessionalDataRepository = $providerProfessionalDataRepository;
    } 

    public function update($data, $key)
    {
        return $this->providerProfessionalDataRepository->update($key, $data);
    }
}
