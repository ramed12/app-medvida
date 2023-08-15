@extends('layouts.dashboard')
@section('content')


    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">{!! isset($data) ? 'Editar' : 'Cadastrar' !!} Prestador de serviço</h1>

                <a href="{!! route('dashboard.provider') !!}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
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
                            <button class="nav-link border-left-warning" id="professional-tab" data-toggle="tab"
                                data-target="#professional" type="button" role="tab" aria-controls="professional"
                                aria-selected="false">Dados Profissionais</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link border-left-success" id="address-tab" data-toggle="tab"
                                data-target="#address" type="button" role="tab" aria-controls="address"
                                aria-selected="false">Endereço</button>
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
                                {!! Form::model($data, ['method' => 'put','autocomplete' => false,'route' => ['dashboard.provider.update', $data->id, http_build_query(Request::input())],'class' => $errors->any() ? 'was-validated' : '','novalidate',]) !!}
                            @else
                                {!! Form::open([ 'method' => 'post','autocomplete' => false,'route' => ['dashboard.provider.store', http_build_query(Request::input())],'class' => $errors->any() ? 'was-validated' : '','novalidate',]) !!}
                            @endif
                            <div class="form-group">
                                <div class="col-12">{!! Form::label('name', 'Nome', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                <div class="col-12"> {!! Form::text('name', null, ['class' => 'form-control rounded-0', 'placeholder' => 'Nome']) !!}
                                    <label class="invalid-feedback">{!! $errors->first('name') !!}</label>
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
                                <div class="col-12">{!! Form::label('password', 'Senha', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                <div class="col-12"> {!! Form::password('password', ['class' => 'form-control rounded-0', 'placeholder' => 'Senha']) !!}
                                    <label class="invalid-feedback">{!! $errors->first('password') !!}</label>
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
                        <div class="tab-pane fade bg-white" id="professional" role="tabpanel" aria-labelledby="professional-tab">
                            @if (isset($professionalData))
                                {!! Form::model($professionalData, ['method' => 'put','autocomplete' => false,'route' => ['dashboard.professional-data.update', $professionalData->id, http_build_query(Request::input())],'class' => $errors->any() ? 'was-validated' : '','novalidate',]) !!}
                            @else
                                {!! Form::open([ 'method' => 'post','autocomplete' => false,'route' => ['dashboard.professional-data.store', http_build_query(Request::input())],'class' => $errors->any() ? 'was-validated' : '','novalidate',]) !!}
                            @endif
                            <div class="form-group">
                                <div class="col-12">{!! Form::label('crm', 'CRM', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                <div class="col-12"> {!! Form::text('crm', null, ['class' => 'form-control rounded-0', 'placeholder' => 'CRM']) !!}
                                    <label class="invalid-feedback">{!! $errors->first('crm') !!}</label>
                                </div>
                            </div>
                            @if(isset($data))
                                {!!Form::hidden('providers_id', $data->id)!!}
                            @endif
                            @if (isset($specialties))
                                <div class="form-group">
                                    <div class="col-12">{!! Form::label('specialties_id', 'Especialidades', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                    <div class="col-12"> {!! Form::select('specialties_id', $specialties, null, [ 'class' => 'form-control', 'placeholder' => 'Especialidades' ]) !!}
                                        @if (!empty($errors->first('specialties_id')))
                                            <label class="invalid-feedback d-block">{!! $errors->first('specialties_id') !!}</label>
                                        @endif
                                    </div>
                                </div>
                            @else
                                <div class="form-group">
                                    <div class="col-12">{!! Form::label('specialties_id', 'Especialidades', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                    <div class="col-12"> {!! Form::text('specialties_id', null, [
                                        'class' => 'form-control',
                                        'placeholder' => 'Especialidades não cadastradas',
                                        'readonly' => true,
                                    ]) !!}
                                        @if (!empty($errors->first('specialties_id')))
                                            <label class="invalid-feedback d-block">{!! $errors->first('specialties_id') !!}</label>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="col-12">{!! Form::label('bank_name', 'Nome do banco', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                <div class="col-12"> {!! Form::text('bank_name', null, ['class' => 'form-control rounded-0', 'placeholder' => 'Nome do banco']) !!}
                                    <label class="invalid-feedback">{!! $errors->first('bank_name') !!}</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-12">{!! Form::label('salary_account', 'Conta salário', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                <div class="col-12"> {!! Form::text('salary_account', null, ['class' => 'form-control rounded-0', 'placeholder' => 'Conta salário']) !!}
                                    <label class="invalid-feedback">{!! $errors->first('salary_account') !!}</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-12">{!! Form::label('agency', 'Agência', ['class' => 'col-form-label font-weight-bold']) !!}</div>
                                <div class="col-12"> {!! Form::text('agency', null, ['class' => 'form-control rounded-0', 'placeholder' => 'Agência']) !!}
                                    <label class="invalid-feedback">{!! $errors->first('agency') !!}</label>
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
                        <div class="tab-pane fade bg-white" id="address" role="tabpanel" aria-labelledby="address-tab">
                            @if (isset($address))
                                {!! Form::model($address, ['method' => 'put','autocomplete' => false,'route' => ['dashboard.address.update', $address->id, http_build_query(Request::input())],'class' => $errors->any() ? 'was-validated' : '','novalidate',]) !!}
                            @else
                                {!! Form::open([ 'method' => 'post','autocomplete' => false,'route' => ['dashboard.address.store', http_build_query(Request::input())],'class' => $errors->any() ? 'was-validated' : '','novalidate',]) !!}
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
                            @if(isset($data))
                                {!!Form::hidden('providers_id', $data->id)!!}
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
                        <div class="tab-pane fade bg-white" id="document" role="tabpanel" aria-labelledby="document-tab">
                            <div class="container-fluid">
                                <div class="row py-4">
                                    <div class="col-12">
                                        <div class="text-right">
                                            <button data-provider-id="{!! @$data->id !!}" data-provider-name="{!! @$data->name !!}" data-type="prestador" data-toggle="modal" data-target="#documentProvider" class="btn btn-info btn-upload-document rounded-0 btn-icon-split">
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
                                            @if (!isset($data->provider_documents))
                                                <tbody>
                                                    <tr>
                                                        <td colspan="4" class="text-center">Não possuí documento para
                                                            analise.</td>
                                                    </tr>
                                                </tbody>
                                            @else
                                                @foreach ($data->provider_documents as $key => $document)
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center"><input type="checkbox"
                                                                    name="all[{!! $document->id !!}]" id="all[]"
                                                                    class="form-checkbox"></td>
                                                            <td>{!! $document->type_document->name !!}</td>
                                                            <td>{!! $document->name !!}</td>
                                                            <td class="text-center">

                                                                @if ($document->status == 0)
                                                                    <a href="javascript:void()" data-document-id="{!! $document->id !!}" data-status="1" data-action="aprovar" data-type="prestador" data-toggle="modal"
                                                                        data-target="#applyDocumentProvider" class="btn btn-warning btn-apply-or-reject-document rounded-0 btn-icon-split">
                                                                        <span class="icon text-white-50">
                                                                            <i class="fas fa-thumbs-up"></i>
                                                                        </span>
                                                                    </a>
                                                                    <a href="javascript:void()" data-document-id="{!! $document->id !!}" data-status="2" data-action="rejeitar" data-type="prestador" data-toggle="modal"
                                                                        data-target="#applyDocumentProvider" class="btn btn-danger btn-apply-or-reject-document rounded-0 btn-icon-split">
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
            <div class="modal fade" id="documentProvider" tabindex="-1" aria-labelledby="documentProviderLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    {!! Form::open([
                        'method' => 'post',
                        'autocomplete' => false,
                        'route' => ['dashboard.type-document.store', http_build_query(Request::input())],
                        'class' => $errors->any() ? 'was-validated' : '',
                        'novalidate',
                        'files' => true,
                    ]) !!}

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="documentProviderLabel">Enviar arquivo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="providers_id" value="{!! @$data->id !!}">
                            <input type="hidden" name="providers_name" value="{!! @$data->name !!}">
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


        </div>
        <!-- /.container-fluid -->

    </div>


@endsection
