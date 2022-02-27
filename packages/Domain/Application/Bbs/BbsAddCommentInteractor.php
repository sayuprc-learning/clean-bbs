<?php

namespace packages\Domain\Application\Bbs;

use DateTime;
use packages\Domain\Domain\Bbs\BbsId;
use packages\Domain\Domain\Bbs\BbsRepositoryInterface;
use packages\Domain\Domain\Bbs\Comment;
use packages\Domain\Domain\Bbs\CommentContent;
use packages\Domain\Domain\Bbs\CommentId;
use packages\Domain\Domain\Bbs\CommentPostedAt;
use packages\UseCase\Bbs\AddComment\BbsAddCommentRequest;
use packages\UseCase\Bbs\AddComment\BbsAddCommentResponse;
use packages\UseCase\Bbs\AddComment\BbsAddCommentUseCaseInterface;

class BbsAddCommentInteractor implements BbsAddCommentUseCaseInterface
{
    private BbsRepositoryInterface $bbsRepository;

    public function __construct(BbsRepositoryInterface $bbsRepository)
    {
        $this->bbsRepository = $bbsRepository;
    }

    public function handle(BbsAddCommentRequest $request): BbsAddCommentResponse
    {
        $bbsId = new BbsId($request->bbsId);

        $commentId = new CommentId($this->bbsRepository->getNextCommentId());
        $content = new CommentContent($request->content);
        $postedAt = new CommentPostedAt(new DateTime());

        $comment = new Comment($bbsId, $commentId, $content, $postedAt);

        $this->bbsRepository->saveComment($comment);

        return new BbsAddCommentResponse($comment->getBbsId()->getValue());
    }
}
