<?php

namespace App\Services;

use App\Repositories\Contracts\AddressRepositoryInterface;
use App\Services\Contracts\AddressServiceInterface;

class AddressService extends BaseService implements AddressServiceInterface
{
    protected $addressRepository;

    public function __construct(AddressRepositoryInterface $addressRepository)
    {
        parent::__construct($addressRepository);

        $this->addressRepository = $addressRepository;
    }

    public function update($data, $key)
    {
        return $this->addressRepository->update($key, $data);
    }
}
