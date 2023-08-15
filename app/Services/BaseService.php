<?php 

namespace App\Services;

use App\Repositories\Contracts\BaseRepositoryInterface;
use App\Services\Contracts\BaseServiceInterface;

class BaseService implements BaseServiceInterface
{
    protected $repository;

    public function __construct(BaseRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function all()
    {
        return $this->repository->all();
    }

    public function allWithPaginate($paginate)
    {
        return $this->repository->allWithPaginate($paginate);
    }

    public function create($data)
    {
        return $this->repository->create($data);
    }

    public function update($data, $key)
    {
        return $this->repository->update($data, $key);
    }

    public function find($key)
    {
        return $this->repository->find($key);
    }

    public function findIn($key, $field = null)
    {
        $this->repository->first($key, $field);
    }

    public function whereSimple($field, $value)
    {
        return $this->repository->whereSimple($field, $value);
    }

    public function first($request, $data)
    {
        return $this->repository->first($request, $data);
    }

    public function list($request, $orderByField, $orderByOrder, $paginate)
    {
        return $this->repository->list($request, $orderByField, $orderByOrder, $paginate);
    }

    public function destroy($key)
    {
        return $this->repository->destroy($key);
    }

    public function createOrUpdate($data, $key)
    {
        return $this->repository->createOrUpdate($data, $key);
    }

    public function createWithStorage($data, $file = null, $storage = null)
    {
        return $this->repository->createWithStorage($data, $file, $storage);
    }

    public function updateWithStorage($data, $key, $file = null, $storage = null)
    {
        return $this->repository->updateWithStorage($data, $key, $file, $storage);
    }

    public function report($request, $orderByField, $orderByOrder)
    {
        return $this->repository->report($request, $orderByField, $orderByOrder);
    }
}