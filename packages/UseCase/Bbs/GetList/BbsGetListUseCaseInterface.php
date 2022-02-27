<?php

namespace packages\UseCase\Bbs\GetList;

interface BbsGetListUseCaseInterface
{
    public function handle(BbsGetListRequest $request): BbsGetListResponse;
}
