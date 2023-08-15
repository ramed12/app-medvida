<?php

namespace App\Services\Contracts;

interface BaseServiceInterface
{
    public function all();

    public function allWithPaginate($paginate);

    public function create($data);

    public function update($data, $key);

    public function find($key);

    public function findIn($keys, $field = null);

    public function whereSimple($field, $value);

    public function first($request, $data);

    public function list($request, $orderByField, $orderByOrder, $paginate);

    public function destroy($key);

    public function createOrUpdate($data, $key);

    public function createWithStorage($data, $file = null, $storage = null);

    public function updateWithStorage($data, $key, $file = null, $storage = null);

    public function report($request, $orderByField, $orderByOrder);
}