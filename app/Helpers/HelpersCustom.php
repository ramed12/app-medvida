<?php

use App\Models\Notification;
use RealRashid\SweetAlert\Facades\Alert;

if(!function_exists('toDecimalInsertRequest')){
    function toDecimalInsertRequest($request, $field)
    {
        $convertToDecimal = floatval(str_replace(",",".",$request->input($field)));
        return $request->merge([$field => $convertToDecimal]);
    }
}

if(!function_exists('getNotifications')){
    function getNotifications($request, $id)
    {
        dd($request, $id);
        return Notification::where('user', $id)->where('environment', $request->environment)->get();
    }
}

if(!function_exists('getEnvironment')){
    function getEnvironment($environment)
    {
        switch ($environment) {
    		case 'adm':
    			return "4";
    			break;
    		case 'web':
    			return "3";
    			break;
    		case 'pres':
    			return "2";
    			break;
            default:
                return "1";
                break;
    	}
    }
}

if(!function_exists('validateForTypeUserAddress')){
    function validateForTypeUserAddress($type, $request)
    {
        switch ($type) {
    		case 'user':
                if(!isset($request->user_id)){
                    Alert::error('Paciente do sistema', 'Cadastre primeiro os dados pessoais.');
                    return redirect()->back();
                }
    			break;
    		case 'prov':
    			if(!isset($request->providers_id)){
                    Alert::error('Candidato', 'Cadastre primeiro os dados pessoais.');
    
                    return redirect()->back();
                }
    			break;
            // default:
            //     return "1";
            //     break;
    	}
    }
}