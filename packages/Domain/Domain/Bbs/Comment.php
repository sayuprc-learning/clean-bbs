<?php

namespace packages\Domain\Domain\Bbs;

class Comment
{
    private CommentId $commentId;
    private CommentContent $commentContent;
    private CommentPostedAt $commentPostedAt;

    public function __construct(CommentId $commentId, CommentContent $commentContent, CommentPostedAt $commentPostedAt)
    {
        $this->commentId = $commentId;
        $this->commentContent = $commentContent;
        $this->commentPostedAt = $commentPostedAt;
    }

    public function getCommentId(): CommentId
    {
        return $this->commentId;
    }

    public function getCommentContent(): CommentContent
    {
        return $this->commentContent;
    }

    public function getCommentPostedAt(): CommentPostedAt
    {
        return $this->commentPostedAt;
    }
}
