<?php

namespace packages\Infrastructure\Bbs;

use App\Models\BbsEloquentModel;
use DateTime;
use Illuminate\Support\Facades\DB;
use packages\Domain\Domain\Bbs\Bbs;
use packages\Domain\Domain\Bbs\BbsId;
use packages\Domain\Domain\Bbs\BbsName;
use packages\Domain\Domain\Bbs\BbsRepositoryInterface;
use packages\Domain\Domain\Bbs\Comment;
use packages\Domain\Domain\Bbs\CommentContent;
use packages\Domain\Domain\Bbs\CommentId;
use packages\Domain\Domain\Bbs\CommentPostedAt;

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
            $bbsId = new BbsId($eloquentBbs->bbs_id);
            foreach ($eloquentBbs->comments as $comment) {
                $commentId = new CommentId($comment->comment_id);
                $commentContent = new CommentContent($comment->content);
                $commentPostedAt = new CommentPostedAt(new DateTime($comment->posted_at));
                $comments[] = new Comment($bbsId, $commentId, $commentContent, $commentPostedAt);
            }
            $bbses[] = new Bbs($bbsId, new BbsName($eloquentBbs->name), $comments);
        }

        return $bbses;
    }

    public function find(BbsId $bbsId): Bbs
    {
        $found = BbsEloquentModel::with('comments')->where('bbses.bbs_id', '=', $bbsId->getValue())->get()[0];

        $comments = [];

        foreach ($found->comments as $comment) {
            $comments[] = new Comment(
                $bbsId,
                new CommentId($comment->comment_id),
                new CommentContent($comment->content),
                new CommentPostedAt(new DateTime($comment->posted_at))
            );
        }

        return new Bbs($bbsId, new BbsName($found->name), $comments);
    }

    public function save(Bbs $bbs): void
    {
        DB::table('bbses')->updateOrInsert([
            'bbs_id' => $bbs->getBbsId()->getValue(),
            'name' => $bbs->getBbsName()->getValue(),
        ]);
    }

    public function getNextBbsId(): int
    {
        $next = DB::select("SELECT nextval('seq_bbs_id') AS bbs_id")[0]->bbs_id;

        return $next;
    }

    public function getNextCommentId(): int
    {
        $next = DB::select("SELECT nextval('seq_comment_id') AS comment_id")[0]->comment_id;

        return $next;
    }

    public function saveComment(Comment $comment): void
    {
        DB::table('comments')->updateOrInsert([
            'bbs_id' => $comment->getBbsId()->getValue(),
            'comment_id' => $comment->getCommentId()->getValue(),
            'content' => $comment->getCommentContent()->getValue(),
            'posted_at' => $comment->getCommentPostedAt()->getValue()->format('Y/m/d H:i:s'),
        ]);
    }
}
