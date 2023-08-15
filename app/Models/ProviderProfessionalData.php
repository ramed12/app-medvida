<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProviderProfessionalData extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'crm',
        'bank_name',
        'salary_account',
        'agency',
        'status',
        'providers_id',
        'specialties_id',
    ];
}
