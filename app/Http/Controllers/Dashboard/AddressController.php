<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Services\Contracts\AddressServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

class AddressController extends Controller
{
    protected $addressService;

    public function __construct(AddressServiceInterface $addressService){
        $this->addressService = $addressService;
    }
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request, $type)
    {
        try{
            validateForTypeUserAddress($type, $request);
            $this->addressService->create($request->all());
            Alert::success('Endereço', 'Endereço cadastrado com sucesso!');
        }catch(\Exception $e){
            Alert::error('Endereço', $e->getMessage());
        }
        if($type == 'prov'){
            return redirect(route('dashboard.provider'));
        }
        return redirect(route('dashboard.patient'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        try{
           $data = $this->addressService->update($id, $request->all());
            Alert::success('Endereço', 'Endereço atualizado com sucesso!');
        }catch(\Exception $e){
            Alert::error('Endereço', $e->getMessage());
        }

        if(isset($data->providers_id)){
            return redirect(route('dashboard.provider'));
        }
        return redirect(route('dashboard.patient'));
    }

    public function destroy($id)
    {
        try{
            $data = $this->addressService->destroy($id);
            Alert::success('Endereço', 'Excluído com sucesso!');
        }catch(\Exception $e){
            Alert::error('Endereço', $e->getMessage());
        }

        if(isset($data->providers_id)){
            return redirect(route('dashboard.provider'));
        }
        return redirect(route('dashboard.patient'));
    }
}
