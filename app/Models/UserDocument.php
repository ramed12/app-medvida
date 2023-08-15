<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDocument extends Model
{
    use SoftDeletes;

    protected $table = 'user_documents';

    protected $fillable = [
        'user_id',
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
