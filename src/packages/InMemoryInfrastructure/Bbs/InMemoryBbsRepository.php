<?php

namespace packages\InMemoryInfrastructure\Bbs;

use DateTime;
use packages\Domain\Domain\Bbs\Bbs;
use packages\Domain\Domain\Bbs\BbsId;
use packages\Domain\Domain\Bbs\BbsName;
use packages\Domain\Domain\Bbs\BbsRepositoryInterface;
use packages\Domain\Domain\Bbs\Comment;
use packages\Domain\Domain\Bbs\CommentContent;
use packages\Domain\Domain\Bbs\CommentId;
use packages\Domain\Domain\Bbs\CommentPostedAt;

class InMemoryBbsRepository implements BbsRepositoryInterface
{
    /**
     * @var Bbs[] $db
     */
    private array $db = [];

    public function __construct()
    {
        foreach (range(1, 10) as $val) {
            $bbsId = new BbsId($val);
            $bbsName = new BbsName('掲示板名:' . $val);
            $commentId = new CommentId($val);
            $commentContent = new CommentContent('コメント:' . $val);
            $this->db[$bbsId->getValue()] = new Bbs(
                $bbsId,
                $bbsName,
                [new Comment($commentId, $commentContent, new CommentPostedAt(new DateTime()))]
            );
        }
    }

    public function findAll(): array
    {
        return $this->db;
    }

    public function find(BbsId $bbsId): Bbs
    {
        return $this->db[$bbsId->getValue()];
    }

    public function save(Bbs $bbs): void
    {
        $this->db[$bbs->getBbsId()->getValue()] = $bbs;
    }

    public function getNextBbsId(): int
    {
        return rand(1, 100);
    }

    public function getNextCommentId(): int
    {
        return rand(1, 100);
    }
}
