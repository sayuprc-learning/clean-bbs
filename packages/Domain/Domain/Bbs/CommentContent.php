<?php

namespace packages\Domain\Domain\Bbs;

use InvalidArgumentException;

class CommentContent
{
    const MAX_LENGTH = 1024;
    private string $value;

    public function __construct(string $value)
    {
        if (empty($value) || self::MAX_LENGTH < mb_strlen($value)) {
            throw new InvalidArgumentException('コメントは1文字以上1024文字以内である必要があります。');
        }

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
