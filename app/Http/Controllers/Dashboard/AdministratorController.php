<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdministratorRequest;
use App\Http\Requests\UpdateAdministratorRequest;
use App\Services\Contracts\AdministratorServiceInterface;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdministratorController extends Controller
{
    protected $administratorService;

    public function __construct(AdministratorServiceInterface $administratorService)
    {
        $this->administratorService = $administratorService;
    }

    public function index(Request $request)
    {
        $paginate     = ($request->input('per_page')) ? $request->input('per_page') : 10;
        $orderByField = ($request->input('order_by_field')) ? $request->input('order_by_field') : 'id';
        $orderByOrder = ($request->input('order_by_order')) ? $request->input('order_by_order') : 'DESC';

        return view('dashboard.user.index', [
            'users' => $this->administratorService->list($request, $orderByField, $orderByOrder, $paginate)
        ]);
    }

    public function create()
    {
        return view('dashboard.user.form');
    }

    public function store(StoreAdministratorRequest $request)
    {
        try {
            $this->administratorService->create($request->all());

            Alert::success('Usuário', 'Cadastro realizado com sucesso!');
        } catch (Exception $e) {

            Alert::error('Usuário', $e->getMessage());
        }
        return redirect(route("dashboard.administrator"));
    }

    public function show($id)
    {
        $data = $this->administratorService->find($id);
        if (!($data)) {

            Alert::error('Usuário', 'Usuário não encontrado');
            return redirect(route("dashboard.administrator"));
        }

        return view('dashboard.user.form', [
            'data' => $data
        ]);
    }

    public function update(UpdateAdministratorRequest $request, $id)
    {

        try {
            $this->administratorService->update($id, $request->all());

            Alert::success('Usuário', 'Cadastro atualizado com sucesso!');
        } catch (Exception $e) {

            Alert::error('Usuário', $e->getMessage());
        }
        return redirect(route("dashboard.administrator"));
    }

    public function destroy($id)
    {
        try{
            $this->administratorService->destroy($id);
            Alert::success('Usuário', 'Cadastro excluído com sucesso!');
        }catch(\Exception $e){
            Alert::error('Usuário', $e->getMessage());
        }

        redirect(route('dashboard.administrator'));
    }
}
