<?php

namespace packages\UseCase\Bbs\Common;

use DateTime;

class CommentModel
{
    public int $id;
    public string $content;
    public DateTime $postedAt;

    public function __construct(int $id, string $content, DateTime $postedAt)
    {
        $this->id = $id;
        $this->content = $content;
        $this->postedAt = $postedAt;
    }
}
