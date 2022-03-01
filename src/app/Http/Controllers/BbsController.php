<?php

namespace App\Http\Controllers;

use App\Http\Models\Bbs\Common\BbsViewModel;
use App\Http\Models\Bbs\Common\CommentViewModel;
use App\Http\Models\Bbs\GetDetail\BbsGetDetailViewModel;
use App\Http\Models\Bbs\GetList\BbsGetListViewModel;
use Illuminate\Http\Request;
use packages\UseCase\Bbs\AddComment\BbsAddCommentRequest;
use packages\UseCase\Bbs\AddComment\BbsAddCommentUseCaseInterface;
use packages\UseCase\Bbs\Create\BbsCreateRequest;
use packages\UseCase\Bbs\Create\BbsCreateUseCaseInterface;
use packages\UseCase\Bbs\GetDetail\BbsGetDetailRequest;
use packages\UseCase\Bbs\GetDetail\BbsGetDetailUseCaseInterface;
use packages\UseCase\Bbs\GetList\BbsGetListRequest;
use packages\UseCase\Bbs\GetList\BbsGetListUseCaseInterface;

class BbsController extends Controller
{
    public function index(BbsGetListUseCaseInterface $interactor)
    {
        $response = $interactor->handle(new BbsGetListRequest());

        $bbsViewModels = [];

        foreach ($response->bbses as $bbs) {
            $comments = $bbs->comments;
            $commentViewModels = [];
            if (!empty($comments)) {
                foreach ($comments as $comment) {
                    $commentViewModels[] = new CommentViewModel($comment->id, $comment->content, $comment->postedAt);
                }
            }
            $bbsViewModels[] = new BbsViewModel($bbs->id, $bbs->name, $commentViewModels);
        }

        $viewModel = new BbsGetListViewModel($bbsViewModels);

        return view('bbs.index', compact('viewModel'));
    }

    public function show(BbsGetDetailUseCaseInterface $interactor, $bbsId)
    {
        $request = new BbsGetDetailRequest($bbsId);

        $response = $interactor->handle($request);

        $commentViewModels = [];
        if (!empty($response->bbs->comments)) {
            foreach ($response->bbs->comments as $comment) {
                $commentViewModels[] = new CommentViewModel($comment->id, $comment->content, $comment->postedAt);
            }
        }

        $bbsViewModel = new BbsViewModel($response->bbs->id, $response->bbs->name, $commentViewModels);

        $viewModel = new BbsGetDetailViewModel($bbsViewModel);

        return view('bbs.show', compact('viewModel'));
    }

    public function create(BbsCreateUseCaseInterface $interactor, Request $request)
    {
        $createRequest = new BbsCreateRequest($request->input('name'));

        $response = $interactor->handle($createRequest);

        return redirect('/bbs/' . $response->id);
    }

    public function addComment(BbsAddCommentUseCaseInterface $interactor, Request $request)
    {
        $addRequest = new BbsAddCommentRequest($request->input('bbs_id'), $request->input('comment'));

        $response = $interactor->handle($addRequest);

        return redirect('/bbs/' . $response->bbsId);
    }
}
