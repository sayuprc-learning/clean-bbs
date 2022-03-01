<?php

namespace packages\UseCase\Bbs\AddComment;

class BbsAddCommentRequest
{
    public int $bbsId;
    public string $content;

    public function __construct(int $bbsId, string $content)
    {
        $this->bbsId = $bbsId;
        $this->content = $content;
    }
}
