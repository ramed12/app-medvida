<?php

namespace App\Providers;

use App\Services\AddressService;
use App\Services\AdministratorService;
use App\Services\BaseService;
use App\Services\Contracts\AddressServiceInterface;
use App\Services\Contracts\AdministratorServiceInterface;
use App\Services\Contracts\BaseServiceInterface;
use App\Services\Contracts\NotificationServiceInterface;
use App\Services\Contracts\PatientsServiceInterface;
use App\Services\Contracts\PlanServiceInterface;
use App\Services\Contracts\ProviderDocumentServiceInterface;
use App\Services\Contracts\ProviderProfessionalDataServiceInterface;
use App\Services\Contracts\ProviderServiceInterface;
use App\Services\Contracts\SpecialtiesServiceInterface;
use App\Services\Contracts\UserDocumentServiceInterface;
use App\Services\NotificationService;
use App\Services\PatientsService;
use App\Services\PlanService;
use App\Services\ProviderDocumentService;
use App\Services\ProviderProfessionalDataService;
use App\Services\ProviderService;
use App\Services\SpecialtiesService;
use App\Services\UserDocumentService;
use Illuminate\Support\ServiceProvider;

class ServicesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BaseServiceInterface::class, BaseService::class);
        $this->app->bind(PlanServiceInterface::class, PlanService::class);
        $this->app->bind(AdministratorServiceInterface::class, AdministratorService::class);
        $this->app->bind(SpecialtiesServiceInterface::class, SpecialtiesService::class);
        $this->app->bind(ProviderServiceInterface::class, ProviderService::class);
        $this->app->bind(ProviderDocumentServiceInterface::class, ProviderDocumentService::class);
        $this->app->bind(PatientsServiceInterface::class, PatientsService::class);
        $this->app->bind(UserDocumentServiceInterface::class, UserDocumentService::class);
        $this->app->bind(NotificationServiceInterface::class, NotificationService::class);
        $this->app->bind(ProviderProfessionalDataServiceInterface::class, ProviderProfessionalDataService::class);
        $this->app->bind(AddressServiceInterface::class, AddressService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
