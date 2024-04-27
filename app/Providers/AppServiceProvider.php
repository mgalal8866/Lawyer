<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositoryinterface\UsersRepositoryinterface;
use App\Repositoryinterface\QuestionRepositoryinterface;
use App\Repository\DBQuestionRepository;
use App\Repository\DBUsersRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $repositories = [
            UsersRepositoryinterface::class          => DBUsersRepository::class,
            QuestionRepositoryinterface::class          => DBQuestionRepository::class,

        ];

        foreach ($repositories as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
