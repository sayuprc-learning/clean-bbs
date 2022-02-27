<?php

namespace App\Http\Models\Bbs\Common;

class BbsViewModel
{
    public int $id;
    public string $name;

    /**
     * @var CommentViewModel[] $comments
     */
    public array $comments;

    public function __construct(int $id, string $name, array $comments = [])
    {
        $this->id = $id;
        $this->name = $name;
        $this->comments = $comments;
    }
}
