<?php

namespace packages\UseCase\Bbs\GetList;

use packages\UseCase\Bbs\Common\BbsModel;

class BbsGetListResponse
{
    /**
     * @var BbsModel[] $bbses
     */
    public array $bbses;

    /**
     * @param BbsModel[] $bbses
     */
    public function __construct(array $bbses)
    {
        $this->bbses = $bbses;
    }
}
