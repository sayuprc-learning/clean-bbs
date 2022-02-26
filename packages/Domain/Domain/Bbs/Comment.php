<?php

namespace packages\Domain\Domain\Bbs;

class Comment
{
    private CommentId $commentId;
    private CommentContent $commentContent;

    public function __construct(CommentId $commentId, CommentContent $commentContent)
    {
        $this->commentId = $commentId;
        $this->commentContent = $commentContent;
    }

    public function getCommentId(): CommentId
    {
        return $this->commentId;
    }

    public function getCommentContent(): CommentContent
    {
        return $this->commentContent;
    }
}
