<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BbsEloquentModel extends Model
{
    use HasFactory;

    protected $table = 'bbses';

    protected $primaryKey = 'bbs_id';

    public function comments()
    {
        return $this->hasMany(CommentEloquentModel::class, 'bbs_id');
    }
}
