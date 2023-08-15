<?php

namespace App\Services\Contracts;

interface UserDocumentServiceInterface
{
    public function whereAnd($fields, $values);
}