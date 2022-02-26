<?php

namespace packages\Domain\Domain\Bbs;

class Bbs
{
    private BbsId $bbsId;
    private BbsName $bbsName;
    
    /**
     * @var Comment[] $comments
     */
    private array $comments;

    public function __construct(BbsId $bbsId, BbsName $bbsName, array $comments)
    {
        $this->bbsId = $bbsId;
        $this->bbsName = $bbsName;
        $this->comments = $comments;
    }

    public function getBbsId(): BbsId
    {
        return $this->bbsId;
    }

    public function getBbsName(): BbsName
    {
        return $this->bbsName;
    }

    /**
     * @return Comment[]
     */
    public function getComments(): array
    {
        return $this->comments;
    }
}
