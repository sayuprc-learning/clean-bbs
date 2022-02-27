<?php

namespace packages\UseCase\Bbs\GetDetail;

interface BbsGetDetailUseCaseInterface
{
    public function handle(BbsGetDetailRequest $request): BbsGetDetailResponse;
}
