@if (empty($viewModel->bbses))
    掲示板がありません。    
@else
    @foreach ($viewModel->bbses as $bbs)
        {{ $bbs->name }}<br>
    @endforeach
@endif