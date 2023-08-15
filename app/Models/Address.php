<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'providers_id',
        'administrator_id',
        'street',
        'number',
        'complement',
        'neighborhood',
        'city',
        'state',
        'country',
        'zipcode'
    ];

    protected $appends = [
        'zipcode_clean',
    ];

    public function getZipcodeCleanAttribute()
    {
        return $this->clearField($this->attributes['zipcode']);
    }

    private function clearField(?string $param)
    {
        if (empty($param)) {
            return null;
        }
        return str_replace(['.', '-', '/', '(', ')', ' '], '', $param);
    }
}
