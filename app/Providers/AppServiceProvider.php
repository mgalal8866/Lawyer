<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositoryinterface\UsersRepositoryinterface;
use App\Repositoryinterface\IssueRepositoryinterface;
use App\Repository\DBIssueRepository;
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
            IssueRepositoryinterface::class          => DBIssueRepository::class,

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
