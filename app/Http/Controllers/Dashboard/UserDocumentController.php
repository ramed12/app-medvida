<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\Contracts\PatientsServiceInterface;
use App\Services\Contracts\UserDocumentServiceInterface;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;

class UserDocumentController extends Controller
{
    protected $userDocumentService;
    protected $patientService;

    public function __construct(UserDocumentServiceInterface $userDocumentService, PatientsServiceInterface $patientService)
    {
        $this->userDocumentService = $userDocumentService;
        $this->patientService = $patientService;
    }

    public function index(Request $request)
    {
        $paginate     = ($request->input('per_page')) ? $request->input('per_page') : 10;
        $orderByField = ($request->input('order_by_field')) ? $request->input('order_by_field') : 'id';
        $orderByOrder = ($request->input('order_by_order')) ? $request->input('order_by_order') : 'DESC';

        return view('dashboard.patient.index', [
            "patients" => $this->userDocumentService->list($request, $orderByField, $orderByOrder, $paginate)
        ]);
    }

    public function create()
    {
        return view('dashboard.patient.form');
    }

    public function store(Request $request)
    {
        try {

            $documentExists = $this->userDocumentService->whereAnd(['user_id', 'type_documents_id'],[$request->user_id, $request->type_documents_id]);
            
            if(isset($documentExists)){
                Alert::error('Candidato', 'Documento já cadastrado.');

                return redirect()->back()->withInput($request->input());
            }

            if (!empty($request->file('file'))) {
                if ($request->file->getClientOriginalExtension() != 'pdf') {
                    Alert::error('Cliente', 'Formato de arquivo inválido, envie um arquivo PDF.');

                    return redirect()->back()->withInput($request->input());
                }

                $user_name = \Str::slug($request->user_name, '-');
                $name = time() . '.' . $request->file->getClientOriginalExtension();
                $request->file->move(public_path('/storage/documentos/pacientes-do-sistema/' . $user_name . "/"), $name);

                $request->merge(array(
                    'name' => $request->file('file')->getClientOriginalName(),
                    'anex'     =>  "/storage/documentos/pacientes-do-sistema/" .  $user_name . "/" . $name
                ));
            }
            
            $this->userDocumentService->create($request->all());

            $patient = $this->patientService->find($request->user_id);

            if(count($patient->address) > 0 &&  count($patient->user_documents) > 0 ){
                if($patient->status == null || $patient->status == 0)
                    $patient->status = 1;
                    $patient->save();
            }

            Alert::success('Documento', 'Cadastro realizado com sucesso!');
        } catch (Exception $e) {

            Alert::error('Documento', $e->getMessage());
        }
        return redirect(route("dashboard.patient.show", $request->user_id));
    }

    public function show($id)
    {
        //
    }

    public function edit(Request $request)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function approveOrRejectDocument(Request $request, $id)
    {
        try{
            $data = $this->userDocumentService->update($request->all(), $id);
            Alert::toast('Documento '.$request->text.'!', 'success');
            return response()->json(['message' => $request->text.' com sucesso!', 'data' => $data]);
        }catch(\Exception $e){
            Alert::toast('Documento não pode ser '.$request->text.'!', 'error');
            return response()->json(['message' => 'Não foi possivel'.$request->action.' o documento.'.$e]);
        }
    }
}
