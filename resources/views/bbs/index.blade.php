<form action="/bbs" method="POST">
    @csrf
    掲示板名: <input type="text" name="name"><br>
    <input type="submit" value="作成">
</form>

@if (empty($viewModel->bbses))
    掲示板がありません。    
@else
    @foreach ($viewModel->bbses as $bbs)
        <a href={{"/bbs/$bbs->id"}}>{{ $bbs->name }}</a><br>
    @endforeach
@endif