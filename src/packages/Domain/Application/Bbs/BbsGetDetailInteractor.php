<?php

namespace packages\Domain\Application\Bbs;

use packages\Domain\Domain\Bbs\BbsId;
use packages\Domain\Domain\Bbs\BbsRepositoryInterface;
use packages\UseCase\Bbs\Common\BbsModel;
use packages\UseCase\Bbs\Common\CommentModel;
use packages\UseCase\Bbs\GetDetail\BbsGetDetailRequest;
use packages\UseCase\Bbs\GetDetail\BbsGetDetailResponse;
use packages\UseCase\Bbs\GetDetail\BbsGetDetailUseCaseInterface;

class BbsGetDetailInteractor implements BbsGetDetailUseCaseInterface
{
    private BbsRepositoryInterface $bbsRepository;

    public function __construct(BbsRepositoryInterface $bbsRepository)
    {
        $this->bbsRepository = $bbsRepository;
    }

    public function handle(BbsGetDetailRequest $request): BbsGetDetailResponse
    {
        $bbsId = new BbsId($request->bbsId);

        $found = $this->bbsRepository->find($bbsId);

        $commentModels = [];
        foreach ($found->getComments() as $comment) {
            $commentModels[] = new CommentModel(
                $comment->getCommentId()->getValue(),
                $comment->getCommentContent()->getValue(),
                $comment->getCommentPostedAt()->getValue()
            );
        }

        $bbsModel = new BbsModel($bbsId->getValue(), $found->getBbsName()->getValue(), $commentModels);

        return new BbsGetDetailResponse($bbsModel);
    }
}
