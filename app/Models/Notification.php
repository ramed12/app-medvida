<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use SoftDeletes;

    protected $table     = 'notifications';

    protected $fillable  = [
        'environment', 
        'user', 
        'text',
        'icon',
        'class_color',
        'status', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

    public function environment() {
    	
    	switch ($this->environment) {
    		case '1':
    			return "Todos";
    			break;
    		case '2':
    			return "Prestador de Serviços";
    			break;
    		case '3':
    			return "Pacientes";
    			break;
            case '4':
                return "Administração";
                break;
    	}
    }

    public function status()
    {
        return array(1 => 'Não lido', 2 => 'Lido');
    }
}
