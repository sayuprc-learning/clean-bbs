<?php

namespace packages\InMemoryInfrastructure\Bbs;

use packages\Domain\Domain\Bbs\Bbs;
use packages\Domain\Domain\Bbs\BbsId;
use packages\Domain\Domain\Bbs\BbsName;
use packages\Domain\Domain\Bbs\BbsRepositoryInterface;
use packages\Domain\Domain\Bbs\Comment;
use packages\Domain\Domain\Bbs\CommentContent;
use packages\Domain\Domain\Bbs\CommentId;

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
            $this->db[$bbsId->getValue()] = new Bbs($bbsId, $bbsName, [new Comment($commentId, $commentContent)]);
        }
    }

    public function findAll(): array
    {
        return $this->db;
    }
}
