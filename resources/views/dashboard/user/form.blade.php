@extends('layouts.dashboard')
@section('content')


    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">{!! (isset($data) ? 'Editar': 'Cadastrar') !!} Usuário do Sistema</h1>

                <a href="{!! route('dashboard.administrator') !!}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
                    <i class="fas fa-undo-alt fa-sm text-white-50"></i> Voltar</a>
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Area Chart -->
                <div class="col-12">
                    @if (isset($data))
                    {!! Form::model($data, ['method' => 'put', 'autocomplete' => false, 'route' => ['dashboard.administrator.update', $data->id, http_build_query(Request::input())], 'class' => $errors->any() ? 'was-validated' : '', 'novalidate']) !!}
                @else
                    {!! Form::open(['method' => 'post', 'autocomplete' => false, 'route' => ['dashboard.administrator.store', http_build_query(Request::input())], 'class' => $errors->any() ? 'was-validated' : '', 'novalidate']) !!}
                @endif
                    <div class="form-group">
                        <div class="col-12">{!! Form::label('name', 'Nome',['class' => 'col-form-label font-weight-bold']) !!}</div>
                        <div class="col-12"> {!! Form::text('name',null, ['class' => 'form-control rounded-0','placeholder' => 'Nome'] ) !!}
                            <label class="invalid-feedback">{!!$errors->first('name')!!}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12">{!! Form::label('email', 'E-mail',['class' => 'col-form-label font-weight-bold']) !!}</div>
                        <div class="col-12"> {!! Form::text('email',null, ['class' => 'form-control rounded-0','placeholder' => 'E-mail'] ) !!}
                            <label class="invalid-feedback">{!!$errors->first('email')!!}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12">{!! Form::label('cpf', 'CPF',['class' => 'col-form-label font-weight-bold']) !!}</div>
                        <div class="col-12"> {!! Form::text('cpf',null, ['class' => 'form-control rounded-0','placeholder' => 'CPF'] ) !!}
                            <label class="invalid-feedback">{!!$errors->first('cpf')!!}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12">{!! Form::label('password', 'Senha',['class' => 'col-form-label font-weight-bold']) !!}</div>
                        <div class="col-12"> {!! Form::password('password', ['class' => 'form-control rounded-0','placeholder' => 'Senha'] ) !!}
                            <label class="invalid-feedback">{!!$errors->first('password')!!}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-primary d-block w-100 rounded-0"><i class="fas fa-save"></i> Salvar</button>
                        </div>
                    </div>
                </div>
                </div>

                {!! Form::close() !!}


        </div>
        <!-- /.container-fluid -->

    </div>


@endsection
