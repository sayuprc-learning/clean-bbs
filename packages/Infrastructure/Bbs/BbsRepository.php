<?php

namespace packages\Infrastructure\Bbs;

use App\Models\BbsEloquentModel;
use packages\Domain\Domain\Bbs\Bbs;
use packages\Domain\Domain\Bbs\BbsId;
use packages\Domain\Domain\Bbs\BbsName;
use packages\Domain\Domain\Bbs\BbsRepositoryInterface;
use packages\Domain\Domain\Bbs\Comment;
use packages\Domain\Domain\Bbs\CommentContent;
use packages\Domain\Domain\Bbs\CommentId;

class BbsRepository implements BbsRepositoryInterface
{
    public function __construct()
    {
    }

    /**
     * @return Bbs[]
     */
    public function findAll(): array
    {
        $eloquentBbses = BbsEloquentModel::with('comments')->get()->all();

        $bbses = [];

        foreach ($eloquentBbses as $eloquentBbs) {
            $comments = [];
            foreach ($eloquentBbs->comments as $comment) {
                $commentId = new CommentId($comment->comment_id);
                $commentContent = new CommentContent($comment->content);
                $comments[] = new Comment($commentId, $commentContent);
            }
            $bbses[] = new Bbs(new BbsId($eloquentBbs->bbs_id), new BbsName($eloquentBbs->name), $comments);
        }

        return $bbses;
    }
}
