<?php

namespace packages\Domain\Domain\Bbs;

interface BbsRepositoryInterface
{
    /**
     * @return Bbs[]
     */
    public function findAll(): array;

    public function find(BbsId $bbsId): Bbs;

    public function save(Bbs $bbs): void;

    public function getNextBbsId(): int;

    public function getNextCommentId(): int;
}
