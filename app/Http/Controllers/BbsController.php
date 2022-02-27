<?php

namespace App\Http\Controllers;

use App\Http\Models\Bbs\Common\BbsViewModel;
use App\Http\Models\Bbs\Common\CommentViewModel;
use App\Http\Models\Bbs\GetList\BbsGetListViewModel;
use Illuminate\Http\Request;
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
                    $commentViewModels[] = new CommentViewModel($comment->content);
                }
            }
            $bbsViewModels[] = new BbsViewModel($bbs->name, $commentViewModels);
        }

        $viewModel = new BbsGetListViewModel($bbsViewModels);

        return view('bbs.index', compact('viewModel'));
    }
}
