@extends('layouts.dashboard')
@section('content')


    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">{!! isset($data) ? 'Editar' : 'Cadastrar' !!} Pacientes do Sistema</h1>

                <a href="{!! route('dashboard.patient') !!}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
                    <i class="fas fa-undo-alt fa-sm text-white-50"></i> Voltar</a>
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Area Chart -->
                <div class="col-12">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active border-left-primary" id="profile-tab" data-toggle="tab"
                                data-target="#profile" type="button" role="tab" aria-controls="profile"
                                aria-selected="true">Dados Pessoais</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link border-left-success" id="address-tab" data-toggle="tab"
                                data-target="#address" type="button" role="tab" aria-controls="address"
                                aria-selected="false">Endereço</button>
                        </li>
                        <li class="nav-item {!! ($data->is_holder) ? '' : 'd-none' !!}" role="presentation">
                            <button class="nav-link border-left-warning" id="dependents-tab" data-toggle="tab"
                                data-target="#dependents" type="button" role="tab" aria-controls="dependents"
                                aria-selected="false">Dependentes</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link border-left-info" id="document-tab" data-toggle="tab"
                                data-target="#document" type="button" role="tab" aria-controls="document"
                                aria-selected="false">Documentos</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active bg-white" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            @if (isset($data))
                                {!! Form::model($data, [
                                    'method' => 'put', 'autocomplete' => false, 'route' => ['dashboard.patient.update', $data->id, http_build_query(Request::input())],
                                    'class' => $errors->any() ? 'was-validated' : '', 'novalidate',
                                ]) !!}
                            @else
                                {!! Form::open([
                                    'method' => 'post', 'autocomplete' => false, 'route' => ['dashboard.patient.store', http_build_query(Request::input())],
                                    'class' => $errors->any() ? 'was-validated' : '', 'novalidate',
                                ]) !!}
                            @endif
                            <div class="form-group">
                                <div class="col-12">{!! Form::label('nome', 'Nome', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                <div class="col-12"> {!! Form::text('nome', null, ['class' => 'form-control rounded-0', 'placeholder' => 'Nome']) !!}
                                    <label class="invalid-feedback">{!! $errors->first('nome') !!}</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-12">{!! Form::label('email', 'E-mail', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                <div class="col-12"> {!! Form::text('email', null, ['class' => 'form-control rounded-0', 'placeholder' => 'E-mail']) !!}
                                    <label class="invalid-feedback">{!! $errors->first('email') !!}</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-12">{!! Form::label('cpf', 'CPF', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                <div class="col-12"> {!! Form::text('cpf', null, ['class' => 'form-control rounded-0', 'placeholder' => 'CPF']) !!}
                                    <label class="invalid-feedback">{!! $errors->first('cpf') !!}</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-12">{!! Form::label('telefone', 'Telefone', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                <div class="col-12"> {!! Form::text('telefone', null, ['class' => 'form-control rounded-0',
                                    'placeholder' => 'Telefone', 'id' => 'telefone',
                                ]) !!}
                                    <label class="invalid-feedback">{!! $errors->first('telefone') !!}</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-12">{!! Form::label('created_at', 'Data de cadastro', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                <div class="col-12"> {!! Form::text('created_at', null, ['class' => 'form-control rounded-0', 'readonly']) !!}
                                    <label class="invalid-feedback">{!! $errors->first('created_at') !!}</label>
                                </div>
                            </div>
                            @if (isset($data))
                                <div class="form-group col-6">
                                    <div class="col-12 ps-0"><span class="font-weight-bold">Situação:</span>
                                        {!! Status($data->status) !!}
                                    </div>
                                </div>
                            @endif

                            <div class="form-group py-4">
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-primary d-block w-100 rounded-0"><i
                                            class="fas fa-save"></i> Salvar</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="tab-pane fade bg-white" id="address" role="tabpanel" aria-labelledby="address-tab">
                            @if (isset($address))
                                {!! Form::model($address, [
                                    'method' => 'put', 'autocomplete' => false,
                                    'route' => ['dashboard.address.update', $address->id, http_build_query(Request::input())],
                                    'class' => $errors->any() ? 'was-validated' : '', 'novalidate',
                                ]) !!}
                            @else
                                {!! Form::open([
                                    'method' => 'post', 'autocomplete' => false,
                                    'route' => ['dashboard.address.store','user', http_build_query(Request::input())],
                                    'class' => $errors->any() ? 'was-validated' : '', 'novalidate',
                                ]) !!}
                            @endif
                            <div class="form-group">
                                <div class="col-12">{!! Form::label('street', 'Logradouro', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                <div class="col-12"> {!! Form::text('street', null, [
                                    'class' => 'form-control rounded-0',
                                    'placeholder' => 'Digite a rua ou avenida onde reside',
                                ]) !!}
                                    <label class="invalid-feedback">{!! $errors->first('street') !!}</label>
                                </div>
                            </div>
                            @if (isset($data))
                                {!! Form::hidden('user_id', $data->id) !!}
                            @endif
                            <div class="row px-2 justify-content-between">
                                <div class="form-group">
                                    <div class="col-12">{!! Form::label('neighborhood', 'Bairro', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                    <div class="col-12 px-3"> {!! Form::text('neighborhood', null, ['class' => 'form-control rounded-0 pr-5', 'placeholder' => 'Bairro']) !!}
                                        <label class="invalid-feedback">{!! $errors->first('neighborhood') !!}</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-12">{!! Form::label('zipcode', 'CEP', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                    <div class="col-12"> {!! Form::text('zipcode', null, ['class' => 'form-control rounded-0', 'placeholder' => 'CEP']) !!}
                                        <label class="invalid-feedback">{!! $errors->first('zipcode') !!}</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-12">{!! Form::label('complement', 'Complemento', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                    <div class="col-12"> {!! Form::text('complement', null, ['class' => 'form-control rounded-0', 'placeholder' => 'Complemento']) !!}
                                        <label class="invalid-feedback">{!! $errors->first('complement') !!}</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-12">{!! Form::label('number', 'Número', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                    <div class="col-12"> {!! Form::text('number', null, ['class' => 'form-control rounded-0', 'placeholder' => 'Número']) !!}
                                        <label class="invalid-feedback">{!! $errors->first('number') !!}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-12">{!! Form::label('city', 'Cidade', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                <div class="col-12"> {!! Form::text('city', null, ['class' => 'form-control rounded-0', 'placeholder' => 'Cidade']) !!}
                                    <label class="invalid-feedback">{!! $errors->first('city') !!}</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-12">{!! Form::label('state', 'Estado', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                <div class="col-12"> {!! Form::text('state', null, ['class' => 'form-control rounded-0', 'placeholder' => 'Estado']) !!}
                                    <label class="invalid-feedback">{!! $errors->first('state') !!}</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-12">{!! Form::label('country', 'País', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                <div class="col-12"> {!! Form::text('country', null, ['class' => 'form-control rounded-0', 'placeholder' => 'País']) !!}
                                    <label class="invalid-feedback">{!! $errors->first('country') !!}</label>
                                </div>
                            </div>
                            <div class="form-group py-4">
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-primary d-block w-100 rounded-0"><i
                                            class="fas fa-save"></i> Salvar</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="tab-pane fade bg-white" id="dependents" role="tabpanel"
                            aria-labelledby="dependents-tab">
                            <div class="container-fluid">
                                <div class="row py-4">
                                    <div class="col-12">
                                        <div class="text-right">
                                            <button data-user-id="{!! @$data->id !!}" data-user-name="{!! @$data->nome !!}" data-type="usuario"
                                                data-toggle="modal" data-target="#formDependents" class="btn btn-info rounded-0 btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-upload"></i>
                                                </span>
                                                <span class="text">Cadastrar dependente</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-12 py-4">
                                        <table class="table table-bordered table-striped">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th scope="col" class="text-center"><input type="checkbox" name="all" id="all" class="form-checkbox"></th>
                                                    <th scope="col">Nome</th>
                                                    <th scope="col">E-mail</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col" colspan="2"  class="text-center">Ação</th>
                                                </tr>
                                            </thead>
                                            @if (!isset($data->dependents))
                                                <tbody>
                                                    <tr>
                                                        <td colspan="4" class="text-center">Não possuí documento para analise.</td>
                                                    </tr>
                                                </tbody>
                                            @else
                                                @foreach ($data->dependents as $key => $item)
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center"><input type="checkbox" name="all[{!! $item->id !!}]" id="all[]" class="form-checkbox"></td>
                                                            <td>{!! $item->nome !!}</td>
                                                            <td>{!! $item->email !!}</td>
                                                            <td class="text-center">{!! Status($item->status) !!}</td>
                                                            <td colspan="2" class="text-center">
                                                                <a href="{!! route('dashboard.patient.show',$item->id) !!}" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                                                                <a href="{!! route('dashboard.patient.delete',$item->id) !!}" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a>
                                                            </td>
                                                            {{-- <a href="javascript:void()" data-document-id="{!! $document->id !!}" data-status="2" data-action="rejeitar"
                                                                    data-type="usuario" data-toggle="modal"data-target="#applyDocumentProvider"
                                                                    class="btn btn-danger btn-apply-or-reject-document rounded-0 btn-icon-split">
                                                                    <span class="icon text-white-50">
                                                                        <i class="fas fa-thumbs-down"></i>
                                                                    </span>
                                                                </a> --}}
                                                        </tr>
                                                    </tbody>
                                                @endforeach
                                            @endif
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade bg-white" id="document" role="tabpanel"
                            aria-labelledby="document-tab">
                            <div class="container-fluid">
                                <div class="row py-4">
                                    <div class="col-12">
                                        <div class="text-right">
                                            <button data-user-id="{!! @$data->id !!}" data-user-name="{!! @$data->nome !!}" data-type="usuario"
                                                data-toggle="modal" data-target="#documentUser" class="btn btn-info btn-upload-document rounded-0 btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-upload"></i>
                                                </span>
                                                <span class="text">Enviar Documento</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-12 py-4">
                                        <table class="table table-bordered table-striped">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th scope="col" class="text-center"><input type="checkbox" name="all" id="all" class="form-checkbox"></th>
                                                    <th scope="col">Documento</th>
                                                    <th scope="col">Arquivo</th>
                                                    <th scope="col" class="text-center">Status</th>
                                                </tr>
                                            </thead>
                                            @if (!isset($data->user_documents))
                                                <tbody>
                                                    <tr>
                                                        <td colspan="4" class="text-center">Não possuí documento para analise.</td>
                                                    </tr>
                                                </tbody>
                                            @else
                                                @foreach ($data->user_documents as $key => $document)
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center"><input type="checkbox"
                                                                    name="all[{!! $document->id !!}]" id="all[]"
                                                                    class="form-checkbox"></td>
                                                            <td>{!! $document->type_document->name !!}</td>
                                                            <td>{!! $document->name !!}</td>
                                                            <td class="text-center">

                                                                @if ($document->status == 0)
                                                                    <a href="javascript:void()"
                                                                        data-document-id="{!! $document->id !!}"data-status="1" data-action="aprovar" data-type="usuario"
                                                                        data-toggle="modal" data-target="#applyDocumentProvider"
                                                                        class="btn btn-warning btn-apply-or-reject-document rounded-0 btn-icon-split">
                                                                        <span class="icon text-white-50">
                                                                            <i class="fas fa-thumbs-up"></i>
                                                                        </span>
                                                                    </a>
                                                                    <a href="javascript:void()" data-status="2" data-action="rejeitar" data-type="usuario"
                                                                        data-toggle="modal"data-target="#applyDocumentProvider"
                                                                        class="btn btn-danger btn-apply-or-reject-document rounded-0 btn-icon-split">
                                                                        <span class="icon text-white-50">
                                                                            <i class="fas fa-thumbs-down"></i>
                                                                        </span>
                                                                    </a>
                                                                @elseif($document->status == 1)
                                                                    <i class="fas fa-check" style="color: green"></i>
                                                                @elseif($document->status == 2)
                                                                    <i class="fas fa-times" style="color: red"></i>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                @endforeach
                                            @endif
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="documentUser" tabindex="-1" aria-labelledby="documentUserLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    {!! Form::open([
                        'method' => 'post','autocomplete' => false,
                        'route' => ['dashboard.type-document-user.store', http_build_query(Request::input())],
                        'class' => $errors->any() ? 'was-validated' : '', 'novalidate', 'files' => true,
                    ]) !!}

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="documentUserLabel">Enviar arquivo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="user_id" value="{!! @$data->id !!}">
                            <input type="hidden" name="user_name" value="{!! @$data->nome !!}">
                            <div class="form-group">
                                <div class="col-12"><label for="type_documents_id">Tipo de Documento</label></div>
                                <div class="col-12">
                                    <select name="type_documents_id" id="type_documents_id"
                                        class="form-control"></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-12"><label for="file">Enviar arquivo</label></div>
                                <div class="col-12">
                                    <input type="file" name="file" id="file" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>

                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="modal fade" id="formDependents" tabindex="-1" aria-labelledby="formDependentsLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                        {!! Form::open([
                            'method' => 'post', 'autocomplete' => false, 'route' => ['dashboard.dependent.store', http_build_query(Request::input())],
                            'class' => $errors->any() ? 'was-validated' : '', 'novalidate',
                        ]) !!}
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="documentUserLabel">Cadastrar/Editar Dependente</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="form-group">
                            <div class="col-12">{!! Form::label('parent_id', 'Titular', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                            <div class="col-12"> {!! Form::select('parent_id', $holders, null, ['class' => 'form-control rounded-0', 'placeholder' => 'Titular']) !!}
                                <label class="invalid-feedback">{!! $errors->first('parent_id') !!}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12">{!! Form::label('nome', 'Nome', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                            <div class="col-12"> {!! Form::text('nome', null, ['class' => 'form-control rounded-0', 'placeholder' => 'Nome']) !!}
                                <label class="invalid-feedback">{!! $errors->first('nome') !!}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12">{!! Form::label('email', 'E-mail', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                            <div class="col-12"> {!! Form::text('email', null, ['class' => 'form-control rounded-0', 'placeholder' => 'E-mail']) !!}
                                <label class="invalid-feedback">{!! $errors->first('email') !!}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12">{!! Form::label('cpf', 'CPF', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                            <div class="col-12"> {!! Form::text('cpf', null, ['class' => 'form-control rounded-0', 'placeholder' => 'CPF']) !!}
                                <label class="invalid-feedback">{!! $errors->first('cpf') !!}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12">{!! Form::label('telefone', 'Telefone', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                            <div class="col-12"> {!! Form::text('telefone', null, ['class' => 'form-control rounded-0', 'placeholder' => 'Telefone', 'id' => 'telefone', ]) !!}
                                <label class="invalid-feedback">{!! $errors->first('telefone') !!}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12">{!! Form::label('password', 'Password', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                            <div class="col-12"> {!! Form::password('password', ['class' => 'form-control rounded-0', 'placeholder' => 'Password', 'id' => 'password', ]) !!}
                                <label class="invalid-feedback">{!! $errors->first('password') !!}</label>
                            </div>
                        </div>
                        @if (isset($dependent))
                            <div class="form-group col-6">
                                <div class="col-12 ps-0"><span class="font-weight-bold">Situação:</span>
                                    {!! Status($dependent->status) !!}
                                </div>
                            </div>
                        @endif
                        <div class="form-group py-4">
                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-primary d-block w-100 rounded-0"><i class="fas fa-save"></i> Salvar</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>


@endsection
