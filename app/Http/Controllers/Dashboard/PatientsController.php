<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePatientRequest;
use App\Services\Contracts\AddressServiceInterface;
use App\Services\Contracts\PatientsServiceInterface;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PatientsController extends Controller
{
    protected $patientsService;
    protected $addressService;

    public function __construct(PatientsServiceInterface $patientsService, AddressServiceInterface $addressService)
    {
        $this->patientsService = $patientsService;
        $this->addressService = $addressService;
    }

    public function index(Request $request){
        $paginate     = ($request->input('per_page')) ? $request->input('per_page') : 10;
        $orderByField = ($request->input('order_by_field')) ? $request->input('order_by_field') : 'id';
        $orderByOrder = ($request->input('order_by_order')) ? $request->input('order_by_order') : 'DESC';

        return view('dashboard.patient.index', [
            "patients" => $this->patientsService->list($request, $orderByField, $orderByOrder, $paginate)
        ]);
    }

    public function create()
    {
        return view('dashboard.patient.form', [
            'data' => null
        ]);
    }

    public function show($id){
        if(empty($id)){
            abort(404);
        }
        $data = $this->patientsService->find($id);

        if(empty($data)){
            abort(404);
        }
        $holders = $this->patientsService->whereSimple('parent_id', null)->pluck('nome', 'id');
        $address = $this->addressService->whereSimple('user_id', $id)->first();

        return view('dashboard.patient.form', [
            'data' => $data,
            'holders' => $holders,
            'address' => isset($address) ? $address : null
        ]);
    }

    public function store(Request $request)
    {
        try{
            $this->patientsService->create($request->all());
            Alert::success('Pacientes do Sistema', 'Paciente cadastrado com sucesso!');
        }catch(\Exception $e){
            Alert::error('Pacientes do Sistema', 'Ocorreu um erro ao cadastrar o paciente.');
        }

        redirect(route('dashboard.patient'));
    }

    public function update(UpdatePatientRequest $request, $id){
        try {

            Alert::success('Sucesso!!', 'Paciente atualizado com sucesso!');
            $this->patientsService->update($request->all(), $id);
        }catch(Exception $e){
            Alert::error('Ops', 'Ocorreu um erro ao atualizar o paciente.');
        }

        return redirect()->route('dashboard.patient');
    }

    public function destroy($id)
    {
        try{
            Alert::success('Pacientes do Sistema', 'Paciente excluído com sucesso!');
        }catch(\Exception $e){
            Alert::error('Pacientes do Sistema', 'Ocorreu um erro ao excluir o paciente');
        }

        return redirect(route('dashboard.patient'));
    }

    public function storeDependent(Request $request)
    {
        try{
            if(empty($request->input('parent_id'))){
                Alert::error('Dependente', 'O titular deve ser cadastrado primeiro.');
                return redirect(route('dashboard.patient'));
            }
            $holder = $this->patientsService->find($request->input('parent_id'));
            if(empty($holder)){
                Alert::error('Dependente', 'Titular não encontrado.');
                return redirect(route('dashboard.patient'));
            }
            $this->patientsService->create($request->all());
            Alert::success('Pacientes do Sistema', 'Paciente cadastrado com sucesso!');
        }catch(\Exception $e){
            Alert::error('Pacientes do Sistema', 'Ocorreu um erro ao cadastrar o paciente.');
        }

        return redirect(route('dashboard.patient'));
    }
}
