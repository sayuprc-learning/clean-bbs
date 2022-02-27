<?php

namespace App\Http\Models\Bbs\Common;

use DateTime;

class CommentViewModel
{
    public int $id;
    public string $content;
    public string $postedAt;

    public function __construct(int $id, string $content, DateTime $postedAt)
    {
        $this->id = $id;
        $this->content = $content;
        $this->postedAt = $postedAt->format('Y/m/d H:i:s');
    }
}
