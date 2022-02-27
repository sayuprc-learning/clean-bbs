<?php

namespace packages\Domain\Application\Bbs;

use packages\Domain\Domain\Bbs\BbsRepositoryInterface;
use packages\UseCase\Bbs\Common\BbsModel;
use packages\UseCase\Bbs\Common\CommentModel;
use packages\UseCase\Bbs\GetList\BbsGetListRequest;
use packages\UseCase\Bbs\GetList\BbsGetListResponse;
use packages\UseCase\Bbs\GetList\BbsGetListUseCaseInterface;

class BbsGetListInteractor implements BbsGetListUseCaseInterface
{
    private BbsRepositoryInterface $bbsRepository;

    public function __construct(BbsRepositoryInterface $bbsRepository)
    {
        $this->bbsRepository = $bbsRepository;
    }

    public function handle(BbsGetListRequest $request): BbsGetListResponse
    {
        $bbses = $this->bbsRepository->findAll();

        $bbsModels = [];

        foreach ($bbses as $bbs) {
            $comments = $bbs->getComments();
            $commentModels = [];
            if (!empty($comments)) {
                foreach ($comments as $comment) {
                    $commentModels[] = new CommentModel($comment->getCommentId()->getValue(), $comment->getCommentContent()->getValue());
                }
            }
            $bbsModels[] = new BbsModel($bbs->getBbsId()->getValue(), $bbs->getBbsName()->getValue(), $commentModels);
        }

        return new BbsGetListResponse($bbsModels);
    }
}
