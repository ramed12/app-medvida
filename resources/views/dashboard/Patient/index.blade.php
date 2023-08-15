@extends('layouts.dashboard')
@section('content')


    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Pacientes do Sistema</h1>

                {{-- <a href="{!! route('dashboard.administrator.create') !!}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-user fa-sm text-white-50"></i> Criar Usuário</a> --}}
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Area Chart -->
                <div class="col-12">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Pesquisar Pacientes do Sistema</h6>
                        </div>
                        <div class="container">
                            {!! Form::model(Request::input(), [
                                'route' => ['dashboard.patient', http_build_query(Request::input())],
                                'method' => 'get',
                            ]) !!}
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="col-12">{!! Form::label('name', 'Nome', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                    <div class="col-12">{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}</div>
                                    @if (!empty($errors->first('name')))
                                        <label class="invalid-feedback d-block">{!! $errors->first('name') !!}</label>
                                    @endif
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="col-12">{!! Form::label('email', 'E-mail', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                    <div class="col-12">{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail']) !!}</div>
                                    @if (!empty($errors->first('email')))
                                        <label class="invalid-feedback d-block">{!! $errors->first('email') !!}</label>
                                    @endif
                                </div>
                                <div class="col-12 text-right py-4 px-4">
                                    {{-- <a href="{!! route('dashboard.patient.create') !!}" class="btn btn-success col-md-auto mb-1 mb-md-0 col-12" style="pointer-events: none; cursor: not-allowed !important;"><i class="fas fa-plus"></i> Novo</a> --}}
                                    <button type="submit"
                                        class="btn btn-primary btn-color col-md-auto mb-1 mb-md-0 col-12"><i
                                            class="fas fa-search"></i> Pesquisar</button>
                                    <a href="{!! route('dashboard.patient') !!}"
                                        class="btn cur-p btn-warning btn-color col-md-auto mb-1 mb-md-0 col-12"><i
                                            class="fas fa-eraser"></i> Limpar Pesquisa</a>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Listar Pacientes Titulares</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Email</th>
                                        <th scope="col" class="text-center">Status</th>
                                        <th scope="col" class="text-center" colspan="2">Ações</th>
                                    </tr>
                                </thead>
                                @if (count($patients) > 0)
                                    @foreach ($patients as $item)
                                        @if ($item->is_holder)
                                            <tbody>
                                                <tr>
                                                    <td>{!! $item->id !!}</td>
                                                    <td>{!! $item->nome !!}</td>
                                                    <td>{!! $item->email !!}</td>
                                                    <td class="text-center">{!! Status($item->status) !!}</td>
                                                    <td class="text-center"><a href="{!! route('dashboard.patient.show', $item->id) !!}" type="button" class="btn btn-secondary"><i class="fas fa-edit"></i></a></td>
                                                    <td class="text-center"><a href="{!! route('dashboard.patient.show', $item->id) !!}" type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
                                                </tr>
                                            </tbody>
                                        @endif
                                    @endforeach
                                @else
                                    <div class='alert alert-warning'>Nenhum paciente cadastrado até o momento </div>
                                @endif
                            </table>

                        </div>
                    </div>
                </div>



            </div>
            <!-- /.container-fluid -->

        </div>


    @endsection
