<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlanRequest;
use App\Services\Contracts\PlanServiceInterface;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PlanController extends Controller
{
    protected $planService;

    public function __construct(PlanServiceInterface $planService)
    {
        $this->planService = $planService;
    }
    
    public function index(Request $request)
    {
        $paginate     = ($request->input('per_page')) ? $request->input('per_page') : 10;
        $orderByField = ($request->input('order_by_field')) ? $request->input('order_by_field') : 'id';
        $orderByOrder = ($request->input('order_by_order')) ? $request->input('order_by_order') : 'DESC';
        return view('dashboard.plan.index', [
            'plans' => $this->planService->list($request, $orderByField, $orderByOrder, $paginate)
        ]);
    }

    public function create()
    {
        return view('dashboard.plan.form', [
            'data' => null
        ]);
    }

    public function store(PlanRequest $request)
    {
        try{
            toDecimalInsertRequest($request, 'value');
            if($request->input('increase_per_dependent')){
                toDecimalInsertRequest($request, 'increase_per_dependent');
            }
            if($request->input('surcharge_addition_medical_consultation')){
                toDecimalInsertRequest($request, 'surcharge_addition_medical_consultation');
            }
            $this->planService->create($request->all());

            Alert::success('Planos', 'Cadastro realizado com sucesso!');
        }catch(\Exception $e){
            Alert::error('Planos', $e->getMessage());
        }

        return redirect()->route('dashboard.plan');
    }

    public function show($id)
    {
        return view('dashboard.plan.form', [
            'data' => $this->planService->find($id)
        ]);
    }

    public function edit(Request $request)
    {
        //
    }

    public function update(Request $request, $id)
    {
        try{
            toDecimalInsertRequest($request, 'value');
            if($request->input('increase_per_dependent')){
                toDecimalInsertRequest($request, 'increase_per_dependent');
            }
            if($request->input('surcharge_addition_medical_consultation')){
                toDecimalInsertRequest($request, 'surcharge_addition_medical_consultation');
            }

            $this->planService->update($request->all(), $id);
            Alert::success('Planos', 'Cadastro atualizado com sucesso!');
        }catch(\Exception $e){
            Alert::error('Planos', $e->getMessage());
        }

        return redirect()->route('dashboard.plan');
    }

    public function destroy($id)
    {
        try{
            $this->planService->destroy($id);
            Alert::success('Artigos', 'Cadastro excluído com sucesso!');
        }catch(\Exception $e){
            Alert::error('Planos', $e->getMessage());
        }

        return redirect()->route('dashboard.plan');
    }
}
