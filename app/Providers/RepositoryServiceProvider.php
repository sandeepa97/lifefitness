<?php

namespace App\Providers;

use App\Repositories\Contract\RepositoryInterface;
use App\Repositories\Contract\UserRepositoryInterface;
use App\Repositories\Contract\MemberRepositoryInterface;
use App\Repositories\Contract\PaymentRepositoryInterface;
use App\Repositories\Contract\MemberAttendanceRepositoryInterface;
use App\Repositories\Contract\ExerciseRepositoryInterface;
use App\Repositories\Contract\TrainerRepositoryInterface;

use App\Repositories\UserRepository;
use App\Repositories\MemberRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\MemberAttendanceRepository;
use App\Repositories\ExerciseRepository;
use App\Repositories\NoticeRepository;
use App\Repositories\MemberStatusRepository;
use App\Repositories\TrainerRepository;

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
        $this->app->bind(PaymentRepositoryInterface::class, PaymentRepository::class);
        $this->app->bind(MemberAttendanceRepositoryInterface::class, MemberAttendanceRepository::class);
        $this->app->bind(ExerciseRepositoryInterface::class, ExerciseRepository::class);
        $this->app->bind(RepositoryInterface::class, NoticeRepository::class);
        $this->app->bind(RepositoryInterface::class, MemberStatusRepository::class);
        $this->app->bind(TrainerRepositoryInterface::class, TrainerRepository::class);

    }
}
