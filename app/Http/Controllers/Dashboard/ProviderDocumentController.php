<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdministratorRequest;
use App\Http\Requests\UpdateAdministratorRequest;
use App\Models\ProviderDocument;
use App\Services\Contracts\ProviderDocumentServiceInterface;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProviderDocumentController extends Controller
{
    protected $providerDocumentService;

    public function __construct(ProviderDocumentServiceInterface $providerDocumentService)
    {
        $this->providerDocumentService = $providerDocumentService;
    }

    public function index()
    {
        return view('dashboard.provider.index', [
            'users' => $this->providerDocumentService->allWithPaginate(15)
        ]);
    }

    public function create()
    {
        return view('dashboard.provider.form');
    }

    public function store(Request $request)
    {
        try {

            $documentExists = $this->providerDocumentService->whereAnd(['providers_id', 'type_documents_id'],[$request->providers_id, $request->type_documents_id]);

            if(isset($documentExists)){
                Alert::error('Candidato', 'Documento já cadastrado.');

                return redirect()->back()->withInput($request->input());
            }

            if (!empty($request->file('file'))) {
                if ($request->file->getClientOriginalExtension() != 'pdf') {
                    Alert::error('Candidato', 'Formato de arquivo inválido, envie um arquivo PDF.');

                    return redirect()->back()->withInput($request->input());
                }
                $user_name = \Str::slug($request->providers_name, '-');
                $name = time() . '.' . $request->file->getClientOriginalExtension();
                $request->file->move(public_path('/storage/documentos/prestador-de-servicos/' . $user_name . "/"), $name);

                $request->merge(array(
                    'name' => $request->file('file')->getClientOriginalName(),
                    'anex'     =>  "/storage/documentos/prestador-de-servicos/" .  $user_name . "/" . $name
                ));
            }else{
                Alert::error('Candidato', 'O documento é obrigatório. Por favor, envie um arquivo PDF.');

                return redirect()->back()->withInput($request->input());
            }
            $this->providerDocumentService->create($request->all());

            Alert::success('Documento', 'Cadastro realizado com sucesso!');
        } catch (Exception $e) {

            Alert::error('Documento', $e->getMessage());
        }
        return redirect(route("dashboard.provider.show", $request->providers_id));
    }

    public function show($id)
    {
        $data = $this->providerDocumentService->find($id);
        if (!($data)) {

            Alert::error('Prestador de Serviço', 'Usuário não encontrado');
            return redirect(route("dashboard.provider"));
        }

        return view('dashboard.provider.form', [
            'data' => $data
        ]);
    }

    public function update(UpdateAdministratorRequest $request, $id)
    {
        try {
            $this->providerDocumentService->update($id, $request->all());

            Alert::success('Prestador de Serviço', 'Cadastro atualizado com sucesso!');
        } catch (Exception $e) {

            Alert::error('Prestador de Serviço', $e->getMessage());
        }
        return redirect(route("dashboard.provider"));
    }

    public function approveOrRejectDocument(Request $request, $id)
    {
        try{
            $data = $this->providerDocumentService->update($request->all(), $id);
            if($request->input('status') === '2'){
                
            }
            Alert::toast('Documento '.$request->text.'!', 'success');
            return response()->json(['message' => $request->text.' com sucesso!', 'data' => $data]);
        }catch(\Exception $e){
            Alert::toast('Documento não pode ser '.$request->text.'!', 'error');
            return response()->json(['message' => 'Não foi possivel'.$request->action.' o documento.'.$e]);
        }
    }
}
