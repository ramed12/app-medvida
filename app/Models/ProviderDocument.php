<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProviderDocument extends Model
{

    use SoftDeletes;

    protected $table = 'provider_documents';

    protected $fillable = [
        'providers_id',
        'name',
        'status',
        'anex',
        'type_documents_id'
    ];

    public function type_document()
    {
        return $this->hasOne(TypeDocument::class, 'id', 'type_documents_id');
    }
}
