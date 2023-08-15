<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdministratorRequest;
use App\Http\Requests\UpdateAdministratorRequest;
use App\Services\Contracts\AddressServiceInterface;
use App\Services\Contracts\ProviderProfessionalDataServiceInterface;
use App\Services\Contracts\ProviderServiceInterface;
use App\Services\Contracts\SpecialtiesServiceInterface;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProviderController extends Controller
{
    protected $providerService;
    protected $specialtiesService;
    protected $providerProfessionalDataService;
    protected $addressService;

    public function __construct(
        ProviderServiceInterface $providerService, 
        SpecialtiesServiceInterface $specialtiesService, 
        ProviderProfessionalDataServiceInterface $providerProfessionalDataService,
        AddressServiceInterface $addressService
    )
    {
        $this->providerService = $providerService;
        $this->specialtiesService = $specialtiesService;
        $this->providerProfessionalDataService = $providerProfessionalDataService;
        $this->addressService = $addressService;
    }

    public function index(Request $request)
    {
        $paginate     = ($request->input('per_page')) ? $request->input('per_page') : 10;
        $orderByField = ($request->input('order_by_field')) ? $request->input('order_by_field') : 'id';
        $orderByOrder = ($request->input('order_by_order')) ? $request->input('order_by_order') : 'DESC';
        return view('dashboard.provider.index', [
            'users' => $this->providerService->list($request, $orderByField, $orderByOrder, $paginate)
        ]);
    }

    public function create()
    {
        return view('dashboard.provider.form', [
            'specialties' => null,
            'professionalData' => null,
            'address' => null,
        ]);
    }

    public function store(Request $request)
    {
        try {
            $this->providerService->create($request->all());

            Alert::success('Prestador de Serviço', 'Cadastro realizado com sucesso!');
        } catch (Exception $e) {

            Alert::error('Prestador de Serviço', $e->getMessage());
        }
        return redirect(route("dashboard.provider"));
    }

    public function show($id)
    {
        $data = $this->providerService->find($id);
        if (!($data)) {

            Alert::error('Prestador de Serviço', 'Usuário não encontrado');
            return redirect(route("dashboard.provider"));
        }
        $professionalData = $this->providerProfessionalDataService->whereSimple('providers_id', $id)->first();
        $address = $this->addressService->whereSimple('providers_id', $id)->first();

        return view('dashboard.provider.form', [
            'data' => $data,
            'specialties' => $this->specialtiesService->all()->pluck('name', 'id'),
            'professionalData' => isset($professionalData) ? $professionalData : null,
            'address' => isset($address) ? $address : null
        ]);
    }

    public function update(UpdateAdministratorRequest $request, $id)
    {
        try {
            $this->providerService->update($id, $request->all());

            Alert::success('Prestador de Serviço', 'Cadastro atualizado com sucesso!');
        } catch (Exception $e) {

            Alert::error('Prestador de Serviço', $e->getMessage());
        }
        return redirect(route("dashboard.provider"));
    }

    public function destroy($id)
    {
        try{
            $this->providerService->destroy($id);
            Alert::success('Prestador de Serviço', 'Cadastro excluído com sucesso!');
        }catch(\Exception $e){
            Alert::error('Prestador de Serviço', $e->getMessage());
        }

        return redirect(route("dashboard.provider"));
    }
}
