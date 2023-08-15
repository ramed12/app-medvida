<?php

namespace App\Repositories\Contracts;

interface ProviderDocumentRepositoryInterface
{
    public function whereAnd($fields, $values);
}
