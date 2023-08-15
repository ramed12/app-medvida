<?php

if(!function_exists('Status')){
    function Status($value)
    {
        switch ($value) {
            case 0:
                $status = '<span class="badge rounded-pill bg-warning text-white px-3 py-2">Pendente</span>';
                break;
            case 1:
                $status = '<span class="badge rounded-pill bg-success text-white px-3 py-2">Ativo</span>';
                break;
            case 2:
                $status = '<span class="badge rounded-pill bg-danger text-white px-3 py-2">Inativo</span>';
                break;
            default:
                $status = '<span class="badge rounded-pill bg-danger text-white px-3 py-2">Removido</span>';
                break;
        }

        return $status;
    }
}
