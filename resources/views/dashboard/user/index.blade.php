@extends('layouts.dashboard')
@section('content')


    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Usuário do Sistema</h1>

                <a href="{!! route('dashboard.administrator.create') !!}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-user fa-sm text-white-50"></i> Criar Usuário</a>
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Area Chart -->
                <div class="col-12">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Pesquisar Prestador de serviço</h6>
                        </div>
                        <div class="container">
                            {!! Form::model(Request::input(), ['route' => ['dashboard.administrator', http_build_query(Request::input())], 'method' => 'get'])!!}
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="col-12">{!! Form::label('name', 'Nome', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                    <div class="col-12">{!! Form::text('name',null, ['class' => 'form-control','placeholder' => 'Nome']) !!}</div>
                                    @if (!empty($errors->first('name')))
                                        <label class="invalid-feedback d-block">{!!$errors->first('name')!!}</label>
                                    @endif
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="col-12">{!! Form::label('email', 'E-mail', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                    <div class="col-12">{!! Form::text('email',null, ['class' => 'form-control','placeholder' => 'E-mail']) !!}</div>
                                    @if (!empty($errors->first('email')))
                                        <label class="invalid-feedback d-block">{!!$errors->first('email')!!}</label>
                                    @endif
                                </div>
                                <div class="col-12 text-right py-4 px-4">
                                    <button type="submit" class="btn btn-primary btn-color col-md-auto mb-1 mb-md-0 col-12"><i class="fas fa-search"></i> Pesquisar</button>
                                    <a href="{!! route('dashboard.administrator') !!}" class="btn cur-p btn-warning btn-color col-md-auto mb-1 mb-md-0 col-12"><i class="fas fa-eraser"></i> Limpar Pesquisa</a>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Listar Usuários do sistema</h6>

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
                                    @foreach ($users as $user)
                                        <tbody>
                                            <tr>
                                                <td>{!! $user->id !!}</td>
                                                <td>{!! $user->name !!}</td>
                                                <td>{!! $user->email !!}</td>
                                                <td class="text-center">{!! (($user->deleted_at == null) ? '<span class="badge rounded-pill bg-primary text-white px-3 py-2">Ativo</span>' : '<span class="badge rounded-pill bg-danger text-white px-3 py-2">Inativo</span>') !!}</td>
                                                <td  class="text-center"><a href="{!! route('dashboard.administrator.show',$user->id) !!}" type="button" class="btn btn-secondary"><i class="fas fa-edit"></i></a></td>
                                                <td  class="text-center"><a type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                        </div>
                    </div>
                </div>



        </div>
        <!-- /.container-fluid -->

    </div>


@endsection
