<?php

namespace packages\UseCase\Bbs\GetDetail;

use packages\UseCase\Bbs\Common\BbsModel;

class BbsGetDetailResponse
{
    public BbsModel $bbs;

    public function __construct(BbsModel $bbs)
    {
        $this->bbs = $bbs;
    }
}
