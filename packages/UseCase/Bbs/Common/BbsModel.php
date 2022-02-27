<?php

namespace packages\UseCase\Bbs\Common;

use packages\UseCase\Bbs\Common\CommentModel;

class BbsModel
{
    public int $id;
    public string $name;

    /**
     * @var CommentModel[] $comments
     */
    public array $comments;

    public function __construct(int $id, string $name, array $comments = [])
    {
        $this->id = $id;
        $this->name = $name;
        $this->comments = $comments;
    }
}
