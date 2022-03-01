{{ $viewModel->bbs->name }}<br>

@foreach ($viewModel->bbs->comments as $comment)
    {{ $comment->postedAt }}&nbsp;{{ $comment->content }}<br>
@endforeach

<form action="/bbs/comment" method="POST">
    @csrf
    <input type="hidden" name="bbs_id" value="{{$viewModel->bbs->id}}">
    <textarea name="comment"></textarea>
    <input type="submit" value="投稿">
</form>

<a href="/bbs">戻る</a>