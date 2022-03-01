<?php

namespace packages\Domain\Domain\Bbs;

use InvalidArgumentException;

class BbsName
{
    const MAX_LENGTH = 512;

    private string $value;

    public function __construct(string $value)
    {
        if (empty($value) || self::MAX_LENGTH < mb_strlen($value)) {
            throw new InvalidArgumentException('掲示板名は1文字以上512文字以内である必要があります。');
        }

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
