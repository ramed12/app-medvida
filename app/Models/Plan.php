<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'plans';
    
    protected $id = 'id';

    protected $fillable = [
        'name',
        'description',
        'value',
        'number_dependents',
        'increase_per_dependent',
        'number_medical_appointments',
        'addition_medical_consultation',
        'surcharge_addition_medical_consultation',
        'image',
        'status'
    ];

    public function status()
    {
        return array(1 => 'Ativo', 2 => 'Inativo');
    }
}
