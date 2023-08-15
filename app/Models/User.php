<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $table = 'user';

     protected $fillable = [
        'nome',
        'cpf',
        'email',
        'nascimento',
        'password',
        'telefone',
        'recoverySenha',
        'parent_id'
    ];

    protected $appends = ['is_holder', 'dependents', 'register_completed', 'user_documents', 'address'];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function address()
    {
        return $this->hasMany(Address::class, 'user_id','id');
    }

    public function user_documents()
    {
        return $this->hasMany(UserDocument::class, 'user_id', 'id');
    }

    public function dependents()
    {
        return $this->hasMany(User::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->hasOne(User::class, is_null($this->attributes['parent_id']));
    }

    public function isHolder()
    {
        return is_null($this->attributes['parent_id']);
    }

    public function getIsHolderAttribute()
    {
        return is_null($this->attributes['parent_id']);
    }

}
