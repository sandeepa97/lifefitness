<?php

namespace App\Providers;

use App\Repositories\Contract\UserRepositoryInterface;

use App\Repositories\Contract\CustomerRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\Contract\InquiryRepositoryInterface;
use App\Repositories\InquiryRepository;
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
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);

    }
}
