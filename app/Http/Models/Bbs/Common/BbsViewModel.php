<?php

namespace App\Http\Models\Bbs\Common;

class BbsViewModel
{
    public string $name;
    /**
     * @var CommentViewModel[] $comments
     */
    public array $comments;

    public function __construct(string $name, array $comments = [])
    {
        $this->name = $name;
        $this->comments = $comments;
    }
}
