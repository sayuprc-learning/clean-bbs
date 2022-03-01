<?php

namespace packages\UseCase\Bbs\GetDetail;

class BbsGetDetailRequest
{
    public int $bbsId;

    public function __construct(int $bbsId)
    {
        $this->bbsId = $bbsId;
    }
}
