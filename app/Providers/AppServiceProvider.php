<?php

namespace App\Providers;

use App\Repository\DBIssueRepository;
use App\Repository\DBUsersRepository;
use App\Repository\DBCommentRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\DBIssueAnswerRepository;
use App\Repository\DBNotificationRepository;
use App\Repositoryinterface\IssueRepositoryinterface;
use App\Repositoryinterface\UsersRepositoryinterface;
use App\Repositoryinterface\CommentRepositoryinterface;
use App\Repositoryinterface\IssueAnswerRepositoryinterface;
use App\Repositoryinterface\NotificationRepositoryinterface;

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
            IssueAnswerRepositoryinterface::class    => DBIssueAnswerRepository::class,
           NotificationRepositoryinterface::class    => DBNotificationRepository::class,
          CommentRepositoryinterface::class    => DBCommentRepository::class,

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
