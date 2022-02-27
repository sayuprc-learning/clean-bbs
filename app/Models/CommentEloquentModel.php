<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentEloquentModel extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $primaryKey = 'comment_id';

    public function bbs()
    {
        return $this->belongsTo(BbsEloquentModel::class);
    }
}
