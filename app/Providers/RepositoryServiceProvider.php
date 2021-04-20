<?php

namespace App\Providers;

use App\Repositories\Contract\UserRepositoryInterface;
use App\Repositories\Contract\MemberRepositoryInterface;
use App\Repositories\Contract\PaymentRepositoryInterface;
use App\Repositories\Contract\MemberAttendanceRepositoryInterface;
use App\Repositories\Contract\ExerciseRepositoryInterface;
use App\Repositories\Contract\TrainerRepositoryInterface;
use App\Repositories\Contract\InventoryRepositoryInterface;
use App\Repositories\Contract\NoticeRepositoryInterface;
use App\Repositories\Contract\MemberStatusRepositoryInterface;
use App\Repositories\Contract\GymStatusRepositoryInterface;
use App\Repositories\Contract\TrainerShiftRepositoryInterface;
use App\Repositories\Contract\WorkoutScheduleRepositoryInterface;
use App\Repositories\Contract\OnlineStoreRepositoryInterface;
use App\Repositories\Contract\FitnessBlogRepositoryInterface;
use App\Repositories\Contract\OnlineCoachRepositoryInterface;

use App\Repositories\Contract\MemberFeedbackRepositoryInterface;

use App\Repositories\UserRepository;
use App\Repositories\MemberRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\MemberAttendanceRepository;
use App\Repositories\ExerciseRepository;
use App\Repositories\NoticeRepository;
use App\Repositories\MemberStatusRepository;
use App\Repositories\GymStatusRepository;
use App\Repositories\TrainerRepository;
use App\Repositories\InventoryRepository;
use App\Repositories\TrainerShiftRepository;
use App\Repositories\WorkoutScheduleRepository;
use App\Repositories\OnlineStoreRepository;
use App\Repositories\FitnessBlogRepository;
use App\Repositories\OnlineCoachRepository;

use App\Repositories\MemberFeedbackRepository;

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
        $this->app->bind(NoticeRepositoryInterface::class, NoticeRepository::class);
        $this->app->bind(MemberStatusRepositoryInterface::class, MemberStatusRepository::class);
        $this->app->bind(GymStatusRepositoryInterface::class, GymStatusRepository::class);
        $this->app->bind(TrainerShiftRepositoryInterface::class, TrainerShiftRepository::class);
        $this->app->bind(TrainerRepositoryInterface::class, TrainerRepository::class);
        $this->app->bind(InventoryRepositoryInterface::class, InventoryRepository::class);
        $this->app->bind(WorkoutScheduleRepositoryInterface::class, WorkoutScheduleRepository::class);
        $this->app->bind(OnlineStoreRepositoryInterface::class, OnlineStoreRepository::class);
        $this->app->bind(FitnessBlogRepositoryInterface::class, FitnessBlogRepository::class);
        $this->app->bind(OnlineCoachRepositoryInterface::class, OnlineCoachRepository::class);

        $this->app->bind(MemberFeedbackRepositoryInterface::class, MemberFeedbackRepository::class);

    }
}
