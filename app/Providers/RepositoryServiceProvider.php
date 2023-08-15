<?php

namespace App\Providers;

use App\Repositories\AddressRepository;
use App\Repositories\AdministratorRepository;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\AddressRepositoryInterface;
use App\Repositories\Contracts\AdministratorRepositoryInterface;
use App\Repositories\Contracts\BaseRepositoryInterface;
use App\Repositories\Contracts\NotificationRepositoryInterface;
use App\Repositories\Contracts\PatientsRepositoryInterface;
use App\Repositories\Contracts\PlanRepositoryInterface;
use App\Repositories\Contracts\ProviderDocumentRepositoryInterface;
use App\Repositories\Contracts\ProviderProfessionalDataRepositoryInterface;
use App\Repositories\Contracts\ProviderRepositoryInterface;
use App\Repositories\Contracts\SpecialtiesRepositoryInterface;
use App\Repositories\Contracts\UserDocumentRepositoryInterface;
use App\Repositories\NotificationRepository;
use App\Repositories\PatientsRepository;
use App\Repositories\PlanRepository;
use App\Repositories\ProviderDocumentRepository;
use App\Repositories\ProviderProfessionalDataRepository;
use App\Repositories\ProviderRepository;
use App\Repositories\SpecialtiesRepository;
use App\Repositories\UserDocumentRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(PlanRepositoryInterface::class, PlanRepository::class);
        $this->app->bind(AdministratorRepositoryInterface::class, AdministratorRepository::class);
        $this->app->bind(SpecialtiesRepositoryInterface::class, SpecialtiesRepository::class);
        $this->app->bind(ProviderRepositoryInterface::class, ProviderRepository::class);
        $this->app->bind(ProviderDocumentRepositoryInterface::class, ProviderDocumentRepository::class);
        $this->app->bind(PatientsRepositoryInterface::class, PatientsRepository::class);
        $this->app->bind(UserDocumentRepositoryInterface::class, UserDocumentRepository::class);
        $this->app->bind(NotificationRepositoryInterface::class, NotificationRepository::class);
        $this->app->bind(ProviderProfessionalDataRepositoryInterface::class, ProviderProfessionalDataRepository::class);
        $this->app->bind(AddressRepositoryInterface::class, AddressRepository::class);
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
