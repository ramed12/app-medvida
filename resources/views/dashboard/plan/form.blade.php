@extends('layouts.dashboard')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Formulário de Planos</h1>
        {{-- <p class="mb-4">Todos os usuários do sistema estão listados aqui nesta página.</p> --}}

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Cadastrar/Editar Planos</h6>
            </div>
            <div class="card-body">
                <div class="container">
                    @if (isset($data))
                                {!! Form::model($data, ['method' => 'put', 'enctype' => 'multipart/form-data', 'autocomplete' => false, 'route' => ['dashboard.plan.update', $data->id, http_build_query(Request::input())], 'class' => $errors->any() ? 'was-validated' : '', 'novalidate',]) !!}
                            @else
                                {!! Form::open(['method' => 'post', 'enctype' => 'multipart/form-data', 'autocomplete' => false, 'route' => ['dashboard.plan.create', http_build_query(Request::input())], 'class' => $errors->any() ? 'was-validated' : '', 'novalidate',]) !!}
                            @endif
                            <div class="row">
                                <div class="col-12">
                                    <div class="col-12">{!! Form::label('name', 'Nome do Plano', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                    <div class="col-12"> {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Digite o nome', 'required']) !!}
                                        @if (!empty($errors->first('name')))
                                        <label class="invalid-feedback d-block">{!! $errors->first('name') !!}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="col-12">{!! Form::label('description', 'Descrição', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                    <div class="col-12"> 
                                        <textarea class="form-control"  id="editor" name="description"  placeholder="Descrição">{{ old('description', !empty($data->description) ? $data->description : '') }}</textarea>
                                        @if (!empty($errors->first('description')))
                                            <label class="invalid-feedback d-block">{!! $errors->first('description') !!}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="col-12">{!! Form::label('status', 'Status', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                    <div class="col-12"> {!! Form::select('status', ['1' => 'Ativo', '2' => 'Inativo'], null, ['class' => 'form-control', 'placeholder' => 'Status']) !!}
                                        @if (!empty($errors->first('status')))
                                            <label class="invalid-feedback d-block">{!! $errors->first('status') !!}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="col-12">{!! Form::label('value', 'Valor', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                    <div class="col-12"> {!! Form::text('value', null, ['class' => 'form-control moeda', 'step' => 'any', 'required']) !!}
                                        @if (!empty($errors->first('value')))
                                            <label class="invalid-feedback d-block">{!! $errors->first('value') !!}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="col-12">{!! Form::label('number_dependents', 'Número de dependentes', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                    <div class="col-12"> {!! Form::number('number_dependents', null, ['class' => 'form-control', 'Placeholder' => 'Informe quantos dependentes tem esse plano', 'required']) !!}
                                        @if (!empty($errors->first('number_dependents')))
                                            <label class="invalid-feedback d-block">{!! $errors->first('number_dependents') !!}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="col-12">{!! Form::label('increase_per_dependent', 'Acréscimo por dependente', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                    <div class="col-12"> {!! Form::text('increase_per_dependent', null, ['class' => 'form-control moeda', 'step' => 'any', 'required']) !!}
                                        @if (!empty($errors->first('increase_per_dependent')))
                                            <label class="invalid-feedback d-block">{!! $errors->first('increase_per_dependent') !!}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="col-12">{!! Form::label('number_medical_appointments', 'Número de consultas', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                    <div class="col-12"> {!! Form::number('number_medical_appointments', null, ['class' => 'form-control', 'Placeholder' => 'Informe quantas consultas tem esse plano', 'required']) !!}
                                        @if (!empty($errors->first('number_medical_appointments')))
                                            <label class="invalid-feedback d-block">{!! $errors->first('number_medical_appointments') !!}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="col-12">{!! Form::label('addition_medical_consultation', 'Consultas adicionais', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                    <div class="col-12"> {!! Form::text('addition_medical_consultation', null, ['class' => 'form-control', 'Placeholder' => 'Informe quantas consultas adicionais são possiveis']) !!}
                                        @if (!empty($errors->first('addition_medical_consultation')))
                                            <label class="invalid-feedback d-block">{!! $errors->first('addition_medical_consultation') !!}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="col-12">{!! Form::label('surcharge_addition_medical_consultation', 'Acréscimo por consultas adicionais', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                    <div class="col-12"> {!! Form::text('surcharge_addition_medical_consultation', null, ['class' => 'form-control moeda', 'Placeholder' => 'Informe o valor de acréscimo por consultas adicionais']) !!}
                                        @if (!empty($errors->first('surcharge_addition_medical_consultation')))
                                            <label class="invalid-feedback d-block">{!! $errors->first('surcharge_addition_medical_consultation') !!}</label>
                                        @endif
                                    </div>
                                </div>
                                {{-- @if(isset($data))
                                <div class="col-12">
                                    <div class="col-12">{!! Form::label('image', 'Imagem cadastrada') !!}</div>
                                    <div class="col-7"> <img src="{!! asset($data->image) !!}" alt="" class="img-fluid"/>
                                    </div>
                                </div>
                                @endif
                                <div class="col-12">
                                    <div class="col-12">{!! Form::label('image', 'Imagem', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                    <div class="col-12"> {!! Form::file('image', ['class' => 'form-control', 'placeholder' => 'Imagem']) !!}
                                        @if (!empty($errors->first('image')))
                                            <label class="invalid-feedback d-block">{!! $errors->first('image') !!}</label>
                                        @endif
                                    </div>
                                </div> --}}
                                <div class="col-12 text-right py-4">
                                    <button type="submit" class="btn btn-primary btn-color"><i class="fas fa-save"></i>
                                        Salvar</button>
                                </div>
                                {!! Form::close() !!}
                            </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection