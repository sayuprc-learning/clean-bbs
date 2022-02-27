{{ $viewModel->bbs->name }}<br>

@foreach ($viewModel->bbs->comments as $comment)
    {{ $comment->postedAt }}&nbsp;{{ $comment->content }}<br>
@endforeach