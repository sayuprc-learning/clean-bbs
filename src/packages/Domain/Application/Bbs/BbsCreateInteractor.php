<?php

namespace packages\Domain\Application\Bbs;

use packages\Domain\Domain\Bbs\Bbs;
use packages\Domain\Domain\Bbs\BbsId;
use packages\Domain\Domain\Bbs\BbsName;
use packages\Domain\Domain\Bbs\BbsRepositoryInterface;
use packages\UseCase\Bbs\Create\BbsCreateRequest;
use packages\UseCase\Bbs\Create\BbsCreateResponse;
use packages\UseCase\Bbs\Create\BbsCreateUseCaseInterface;

class BbsCreateInteractor implements BbsCreateUseCaseInterface
{
    private BbsRepositoryInterface $bbsRepository;

    public function __construct(BbsRepositoryInterface $bbsRepository)
    {
        $this->bbsRepository = $bbsRepository;
    }

    public function handle(BbsCreateRequest $request): BbsCreateResponse
    {
        $bbsId = new BbsId($this->bbsRepository->getNextBbsId());
        $bbsName = new BbsName($request->name);

        $bbs = new Bbs($bbsId, $bbsName, []);

        $this->bbsRepository->save($bbs);

        return new BbsCreateResponse($bbs->getBbsId()->getValue());
    }
}
