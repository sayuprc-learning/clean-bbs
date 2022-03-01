<?php

namespace packages\UseCase\Bbs\Create;

interface BbsCreateUseCaseInterface
{
    public function handle(BbsCreateRequest $request): BbsCreateResponse;
}
