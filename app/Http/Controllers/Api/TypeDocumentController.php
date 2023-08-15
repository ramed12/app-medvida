<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TypeDocumentResource;
use App\Models\TypeDocument;

class TypeDocumentController extends Controller
{

    public function list($typeUser)
    {
        $data = TypeDocument::where('status', 1)->where($typeUser, 1)->get();
        return $data;
    }
}
