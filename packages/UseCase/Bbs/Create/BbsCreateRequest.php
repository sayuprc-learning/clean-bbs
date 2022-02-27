<?php

namespace packages\UseCase\Bbs\Create;

class BbsCreateRequest
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
