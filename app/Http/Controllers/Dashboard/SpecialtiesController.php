<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SpecialtiesRequest;
use App\Services\Contracts\SpecialtiesServiceInterface;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SpecialtiesController extends Controller
{

    protected $specialtiesService;

    public function __construct(SpecialtiesServiceInterface $specialtiesService)
    {
        $this->specialtiesService = $specialtiesService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginate     = ($request->input('per_page')) ? $request->input('per_page') : 10;
        $orderByField = ($request->input('order_by_field')) ? $request->input('order_by_field') : 'id';
        $orderByOrder = ($request->input('order_by_order')) ? $request->input('order_by_order') : 'DESC';
        return view('dashboard.specialties.index', [
            'specialties' => $this->specialtiesService->list($request, $orderByField, $orderByOrder, $paginate)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.specialties.form', [
            'data' => null
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SpecialtiesRequest $request)
    {
        try{
            $this->specialtiesService->create($request->all());
            Alert::success('Especialidades', 'Cadastro realizado com sucesso!');
        }
        catch(\Exception $e){
            Alert::error('Especialidades', $e->getMessage());
        }
        return redirect()->route('dashboard.specialties');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dashboard.specialties.form', [
            'data' => $this->specialtiesService->find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->specialtiesService->find($id);
        try{
            return response()->json($data);
        }
        catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $this->specialtiesService->update($request->all(), $id);
            Alert::success('Especialidades', 'Cadastro atualizado com sucesso!');
        }
        catch(\Exception $e){
            Alert::error('Especialidades', $e->getMessage());
        }
        return redirect()->route('dashboard.specialties');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $this->specialtiesService->destroy($id);
            Alert::success('Especialidades', 'Cadastro excluído com sucesso!');
        }catch(\Exception $e){
            Alert::error('Especialidades', $e->getMessage());
        }

        return redirect()->route('dashboard.specialties');
    }
}
