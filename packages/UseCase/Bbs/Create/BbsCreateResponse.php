<?php

namespace packages\UseCase\Bbs\Create;

class BbsCreateResponse
{
    public int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }
}
