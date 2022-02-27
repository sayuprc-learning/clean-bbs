<?php

namespace App\Http\Models\Bbs\Common;

class CommentViewModel
{
    public string $content;

    public function __construct(string $content)
    {
        $this->content = $content;
    }
}
