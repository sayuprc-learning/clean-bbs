<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use packages\Domain\Application\Bbs\BbsGetDetailInteractor;
use packages\Domain\Application\Bbs\BbsGetListInteractor;
use packages\Domain\Domain\Bbs\BbsRepositoryInterface;
use packages\Infrastructure\Bbs\BbsRepository;
use packages\InMemoryInfrastructure\Bbs\InMemoryBbsRepository;
use packages\UseCase\Bbs\GetDetail\BbsGetDetailUseCaseInterface;
use packages\UseCase\Bbs\GetList\BbsGetListUseCaseInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (config('app.inMemory')) {
            $bbsRepositoryClass = InMemoryBbsRepository::class;
        } else {
            $bbsRepositoryClass = BbsRepository::class;
        }

        // リポジトリ設定
        $this->app->singleton(BbsRepositoryInterface::class, $bbsRepositoryClass);

        // BBS一覧取得ユースケース設定
        $this->app->bind(BbsGetListUseCaseInterface::class, BbsGetListInteractor::class);

        // BBS詳細表示ユースケース設定
        $this->app->bind(BbsGetDetailUseCaseInterface::class, BbsGetDetailInteractor::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
