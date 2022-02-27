<?php

namespace App\Http\Models\Bbs\GetList;

use App\Http\Models\Bbs\Common\BbsViewModel;

class BbsGetListViewModel
{
    /**
     * @var BbsViewModel[] $bbses
     */
    public array $bbses;

    /**
     * @param BbsViewModel[] $bbses
     */
    public function __construct(array $bbses)
    {
        $this->bbses = $bbses;
    }
}
