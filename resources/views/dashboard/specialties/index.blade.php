@extends('layouts.dashboard')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-2 text-gray-800">Especialidades</h1>
            <a href="{!! route('dashboard.specialties.create') !!}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus"></i> Criar especialidade</a>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pesquisar Especialidades</h6>
            </div>
            <div class="container">
                {!! Form::model(Request::input(), ['route' => ['dashboard.specialties', http_build_query(Request::input())], 'method' => 'get'])!!}
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="col-12">{!! Form::label('name', 'Nome', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                        <div class="col-12">{!! Form::text('name',null, ['class' => 'form-control','placeholder' => 'Nome']) !!}</div>
                        @if (!empty($errors->first('name')))
                            <label class="invalid-feedback d-block">{!!$errors->first('name')!!}</label>
                        @endif
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="col-12">{!! Form::label('description', 'Descrição', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                        <div class="col-12">{!! Form::text('description',null, ['class' => 'form-control','placeholder' => 'Descrição']) !!}</div>
                        @if (!empty($errors->first('description')))
                            <label class="invalid-feedback d-block">{!!$errors->first('description')!!}</label>
                        @endif
                    </div>
                    <div class="col-12 text-right py-4 px-4">
                        <button type="submit" class="btn btn-primary btn-color col-md-auto mb-1 mb-md-0 col-12"><i class="fas fa-search"></i> Pesquisar</button>
                        <a href="{!! route('dashboard.specialties') !!}" class="btn cur-p btn-warning btn-color col-md-auto mb-1 mb-md-0 col-12"><i class="fas fa-eraser"></i> Limpar Pesquisa</a>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div> 
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Listar Especialidades</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Status</th>
                                <th scope="col" colspan="2"  class="text-center">Ação</th>
                            </tr>
                        </thead>
                        @if(count($specialties) > 0)
                            @foreach ($specialties as $item)
                                <tbody>
                                    <tr>
                                        <td>{!!$item->id !!}</td>
                                        <td>{!!$item->name !!}</td>
                                        <td>{!! ($item->status == 2 ? 'Inativo': 'Ativo') !!}</td>
                                        <td colspan="2" class="text-center">
                                            <a href="{!! route('dashboard.specialties.show',$item->id) !!}" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                                            <a href="{!! route('dashboard.specialties.delete',$item->id) !!}" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        @else
                            <tbody>
                                <tr>
                                <td colspan="5" class="text-center"><strong>Não possui registro.</strong></td>
                                </tr>
                            </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection