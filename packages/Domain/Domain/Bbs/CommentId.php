<?php

namespace packages\Domain\Domain\Bbs;

use InvalidArgumentException;

class CommentId
{
    private int $value;

    public function __construct(int $value)
    {
        if ($value < 1) {
            throw new InvalidArgumentException('コメントIDは1以上の数値である必要があります。');
        }

        $this->value = $value;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
