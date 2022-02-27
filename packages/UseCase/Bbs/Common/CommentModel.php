<?php

namespace packages\UseCase\Bbs\Common;

class CommentModel
{
    public int $id;
    public string $content;

    public function __construct(int $id, string $content)
    {
        $this->id = $id;
        $this->content = $content;
    }
}
