<?php

namespace App\Http\Models\Bbs\GetDetail;

use App\Http\Models\Bbs\Common\BbsViewModel;

class BbsGetDetailViewModel
{
    public BbsViewModel $bbs;

    public function __construct(BbsViewModel $bbs)
    {
        $this->bbs = $bbs;
    }
}
