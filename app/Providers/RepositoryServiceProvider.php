<?php

namespace App\Providers;

use App\Repositories\Contract\UserRepositoryInterface;
use App\Repositories\Contract\MemberRepositoryInterface;

use App\Repositories\UserRepository;
use App\Repositories\MemberRepository;

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
        $this->app->bind(MemberRepositoryInterface::class, MemberRepository::class);

    }
}
