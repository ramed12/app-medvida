<?php

use App\Http\Controllers\CadastroController;
use App\Http\Controllers\Dashboard\Auth\LoginController;
use App\Http\Controllers\Dashboard\DashBoardController;
use App\Http\Controllers\Dashboard\PlanController;
use App\Http\Controllers\Dashboard\SpecialtiesController;
use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'store'])->name('envia-dados-login');


Route::get('/cadastro', [App\Http\Controllers\CadastroController::class, 'index'])->name('cadastro-inicio');
Route::get('/cadastro/formulario', [App\Http\Controllers\CadastroController::class, 'form'])->name('cadastro-formulario');
Route::post('/cadastro/formulario', [App\Http\Controllers\CadastroController::class, 'store'])->name('cadastro-formulario-envia');
Route::get('/cadastro/recuperar-senha', [App\Http\Controllers\CadastroController::class, 'senha'])->name('recuperar-senha');
Route::post('/cadastro/recuperar-senha', [App\Http\Controllers\CadastroController::class, 'senhaStore'])->name('recuperar-senha-store');
Route::get('/cadastro/senha/{id}', [App\Http\Controllers\CadastroController::class, 'senhaStoreVerify'])->name('recuperar-senha-store-send');

Route::group(['middleware' => 'auth:web'], function () {
    Route::get('/dash/inicio', [DashBoardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/principal', [DashBoardController::class, 'index'])->name('dashboard.home');
});

Route::group(['namespace' => 'Dashboard', 'prefix' => 'dashboard'], function () {

    Route::get('/', [App\Http\Controllers\Dashboard\Auth\LoginController::class, 'index'])->name('dashboard.index');
    Route::post('/login', [App\Http\Controllers\Dashboard\Auth\LoginController::class, 'store'])->name('dashboard.login');
    Route::group(['middleware' => 'auth:adm'], function () {
        Route::get('/sair', [App\Http\Controllers\Dashboard\Auth\LoginController::class, 'logout'])->name('logout');
        Route::get('/dashboard/principal', [App\Http\Controllers\Dashboard\DashBoardController::class, 'index'])->name('dashboard.home');

        Route::get('/planos', [App\Http\Controllers\Dashboard\PlanController::class, 'index'])->name('dashboard.plan');
        Route::get('/planos/adicionar', [App\Http\Controllers\Dashboard\PlanController::class, 'create'])->name('dashboard.plan.create');
        Route::post('/planos/adicionar', [App\Http\Controllers\Dashboard\PlanController::class, 'store'])->name('dashboard.plan.store');
        Route::get('/planos/editar/{id}', [App\Http\Controllers\Dashboard\PlanController::class, 'show'])->name('dashboard.plan.show');
        Route::put('/planos/editar/{id}', [App\Http\Controllers\Dashboard\PlanController::class, 'update'])->name('dashboard.plan.update');
        Route::get('/planos/deletar/{id}', [App\Http\Controllers\Dashboard\PlanController::class, 'destroy'])->name('dashboard.plan.delete');

        Route::get('/especialidades', [SpecialtiesController::class, 'index'])->name('dashboard.specialties');
        Route::get('/especialidades/cadastrar', [SpecialtiesController::class, 'create'])->name('dashboard.specialties.create');
        Route::post('/especialidades/adicionar', [SpecialtiesController::class, 'store'])->name('dashboard.specialties.store');
        Route::get('/especialidades/editar/{id}', [SpecialtiesController::class, 'show'])->name('dashboard.specialties.show');
        Route::put('/especialidades/update/{id}', [SpecialtiesController::class, 'update'])->name('dashboard.specialties.update');
        Route::delete('/especialidades/deletar/{id}', [SpecialtiesController::class, 'destroy'])->name('dashboard.specialties.delete');

        Route::get('/usuarios', [App\Http\Controllers\Dashboard\AdministratorController::class, 'index'])->name('dashboard.administrator');
        Route::get('/usuarios/adicionar', [App\Http\Controllers\Dashboard\AdministratorController::class, 'create'])->name('dashboard.administrator.create');
        Route::post('/usuarios/adicionar', [App\Http\Controllers\Dashboard\AdministratorController::class, 'store'])->name('dashboard.administrator.store');
        Route::get('/usuarios/editar/{id}', [App\Http\Controllers\Dashboard\AdministratorController::class, 'show'])->name('dashboard.administrator.show');
        Route::put('/usuarios/editar/{id}', [App\Http\Controllers\Dashboard\AdministratorController::class, 'update'])->name('dashboard.administrator.update');
        Route::get('/usuarios/deletar/{id}', [App\Http\Controllers\Dashboard\AdministratorController::class, 'destroy'])->name('dashboard.administrator.delete');

        Route::get('/prestador-de-servicos', [App\Http\Controllers\Dashboard\ProviderController::class, 'index'])->name('dashboard.provider');
        Route::get('/prestador-de-servicos/adicionar', [App\Http\Controllers\Dashboard\ProviderController::class, 'create'])->name('dashboard.provider.create');
        Route::post('/prestador-de-servicos/adicionar', [App\Http\Controllers\Dashboard\ProviderController::class, 'store'])->name('dashboard.provider.store');
        Route::get('/prestador-de-servicos/editar/{id}', [App\Http\Controllers\Dashboard\ProviderController::class, 'show'])->name('dashboard.provider.show');
        Route::put('/prestador-de-servicos/editar/{id}', [App\Http\Controllers\Dashboard\ProviderController::class, 'update'])->name('dashboard.provider.update');
        Route::get('/prestador-de-servicos/deletar/{id}', [App\Http\Controllers\Dashboard\ProviderController::class, 'destroy'])->name('dashboard.provider.delete');
        Route::post('/tipo-de-documento/adicionar', [App\Http\Controllers\Dashboard\ProviderDocumentController::class, 'store'])->name('dashboard.type-document.store');
        Route::put('/tipo-de-documento-prestador/aprovar-ou-rejeitar/{id}', [App\Http\Controllers\Dashboard\ProviderDocumentController::class, 'approveOrRejectDocument'])->name('dashboard.aprove-or-reject-document-provider');

        Route::get('/prestador-de-servicos/dados-profissionais', [App\Http\Controllers\Dashboard\ProviderProfessionalDataController::class, 'index'])->name('dashboard.professional-data');
        Route::get('/prestador-de-servicos/dados-profissionais/adicionar', [App\Http\Controllers\Dashboard\ProviderProfessionalDataController::class, 'create'])->name('dashboard.professional-data.create');
        Route::post('/prestador-de-servicos/dados-profissionais/adicionar', [App\Http\Controllers\Dashboard\ProviderProfessionalDataController::class, 'store'])->name('dashboard.professional-data.store');
        Route::get('/prestador-de-servicos/dados-profissionais/editar/{id}', [App\Http\Controllers\Dashboard\ProviderProfessionalDataController::class, 'show'])->name('dashboard.professional-data.show');
        Route::put('/prestador-de-servicos/dados-profissionais/editar/{id}', [App\Http\Controllers\Dashboard\ProviderProfessionalDataController::class, 'update'])->name('dashboard.professional-data.update');
        Route::get('/prestador-de-servicos/dados-profissionais/deletar/{id}', [App\Http\Controllers\Dashboard\ProviderProfessionalDataController::class, 'destroy'])->name('dashboard.professional-data.delete');
        
        Route::get('/endereco', [App\Http\Controllers\Dashboard\AddressControllerController::class, 'index'])->name('dashboard.address');
        Route::get('/endereco/adicionar', [App\Http\Controllers\Dashboard\AddressController::class, 'create'])->name('dashboard.address.create');
        Route::post('/endereco/adicionar/{type}', [App\Http\Controllers\Dashboard\AddressController::class, 'store'])->name('dashboard.address.store');
        Route::get('/endereco/editar/{id}', [App\Http\Controllers\Dashboard\AddressController::class, 'show'])->name('dashboard.address.show');
        Route::put('/endereco/editar/{id}', [App\Http\Controllers\Dashboard\AddressController::class, 'update'])->name('dashboard.address.update');
        Route::get('/endereco/deletar/{id}', [App\Http\Controllers\Dashboard\AddressController::class, 'destroy'])->name('dashboard.address.delete');

        //Usuários Pacientes do sistema!
        
        Route::get('/pacientes', [App\Http\Controllers\Dashboard\PatientsController::class, 'index'])->name('dashboard.patient');
        Route::get('/pacientes/adicionar', [App\Http\Controllers\Dashboard\PatientsController::class, 'create'])->name('dashboard.patient.create');
        Route::post('/pacientes/adicionar', [App\Http\Controllers\Dashboard\PatientsController::class, 'store'])->name('dashboard.patient.store');
        Route::get('/pacientes/editar/{id}', [App\Http\Controllers\Dashboard\PatientsController::class, 'show'])->name('dashboard.patient.show');
        Route::put('/pacientes/editar/{id}', [App\Http\Controllers\Dashboard\PatientsController::class, 'update'])->name('dashboard.patient.update');
        Route::put('/pacientes/deletar/{id}', [App\Http\Controllers\Dashboard\PatientsController::class, 'destroy'])->name('dashboard.patient.delete');
        Route::post('/tipo-de-documento-usuario/adicionar', [App\Http\Controllers\Dashboard\UserDocumentController::class, 'store'])->name('dashboard.type-document-user.store');
        Route::put('/tipo-de-documento-usuario/aprovar-ou-rejeitar/{id}', [App\Http\Controllers\Dashboard\UserDocumentController::class, 'approveOrRejectDocument'])->name('dashboard.aprove-or-reject-document-user');
        
        Route::post('/dependentes/adicionar', [App\Http\Controllers\Dashboard\PatientsController::class, 'storeDependent'])->name('dashboard.dependent.store');
        Route::put('/dependentes/editar/{id}', [App\Http\Controllers\Dashboard\PatientsController::class, 'update'])->name('dashboard.dependent.update');

        Route::get('/notificacoes/listar/{id}', [App\Http\Controllers\Dashboard\NotificationController::class, 'index'])->name('dashboard.notification');

    });
});
