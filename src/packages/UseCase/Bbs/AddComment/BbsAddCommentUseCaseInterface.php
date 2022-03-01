<?php

namespace packages\UseCase\Bbs\AddComment;

interface BbsAddCommentUseCaseInterface
{
    public function handle(BbsAddCommentRequest $request): BbsAddCommentResponse;
}
