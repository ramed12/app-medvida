<?php 

namespace App\Repositories\Contracts;

interface UserDocumentRepositoryInterface
{
    public function whereAnd($fields, $values);
}