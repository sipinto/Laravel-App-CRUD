<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    public function images()
    {
        return $this->hasMany('App\Models\BoardImage', 'boardId');
    }
    protected $fillable = [
        'title',
        'content',
        'writer',
        'email',
    ];
}
