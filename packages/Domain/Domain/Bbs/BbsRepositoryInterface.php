<?php

namespace packages\Domain\Domain\Bbs;

interface BbsRepositoryInterface
{
    /**
     * @return Bbs[]
     */
    public function findAll(): array;

    public function find(BbsId $bbsId): Bbs;
}
