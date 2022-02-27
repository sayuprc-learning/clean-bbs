<?php

namespace packages\UseCase\Bbs\AddComment;

class BbsAddCommentResponse
{
    public int $bbsId;

    public function __construct(int $bbsId)
    {
        $this->bbsId = $bbsId;
    }
}
