<?php

namespace packages\Domain\Domain\Bbs;

use DateTime;

class CommentPostedAt
{
    private DateTime $value;

    public function __construct(DateTime $value)
    {
        $this->value = $value;
    }

    public function getValue(): DateTime
    {
        return $this->value;
    }
}
