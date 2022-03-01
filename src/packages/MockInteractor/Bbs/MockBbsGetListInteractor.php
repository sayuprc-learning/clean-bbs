<?php

namespace packages\MockInteractor\Bbs;

use Exception;
use packages\UseCase\Bbs\GetList\BbsGetListRequest;
use packages\UseCase\Bbs\GetList\BbsGetListResponse;
use packages\UseCase\Bbs\GetList\BbsGetListUseCaseInterface;

class MockBbsGetListInteractor implements BbsGetListUseCaseInterface
{
    public function __construct()
    {
    }

    public function handle(BbsGetListRequest $request): BbsGetListResponse
    {
        throw new Exception('例外発生');
    }
}
