<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProviderProfessionalDataRequest;
use App\Models\ProviderProfessionalData;
use App\Services\Contracts\ProviderProfessionalDataServiceInterface;
use App\Services\Contracts\SpecialtiesServiceInterface;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProviderProfessionalDataController extends Controller 
{
    protected $providerProfessionalDataService;
    protected $specialtiesService;

    public function __construct(ProviderProfessionalDataServiceInterface $providerProfessionalDataService, SpecialtiesServiceInterface $specialtiesService)
    {
        $this->providerProfessionalDataService = $providerProfessionalDataService;
        $this->specialtiesService = $specialtiesService;
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            if(!isset($request->providers_id)){
                Alert::error('Candidato', 'Cadastre primeiro os dados pessoais.');

                return redirect()->back()->withInput($request->input());
            }
            
            $this->providerProfessionalDataService->create($request->all());
            Alert::success('Candidato', 'Cadastrado com sucesso!');
        }catch(\Exception $e){
            Alert::error('Candidato', $e->getMessage());
        }

        return redirect(route("dashboard.provider"));
    }

    public function show($id)
    {
        
    }

    public function edit(ProviderProfessionalData $providerProfessionalData)
    {
        //
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $dat = $this->providerProfessionalDataService->update($id, $request->all());
        try{
            Alert::success('Candidato', 'Dados atualizado com sucesso!');
        }catch(\Exception $e){
            Alert::error('Canditado', $e->getMessage());
        }

        return redirect(route('dashboard.provider'));
    }

    public function destroy($id)
    {
        try{
            Alert::success('Candidato', 'Excluído com sucesso!');
        }catch(\Exception $e){
            Alert::error('Candidato', $e->getMessage());
        }

        return redirect(route('dashboard.provider'));
    }
}
