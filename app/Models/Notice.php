<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;
    
    public function images()
    {
        return $this->hasMany('App\Models\NoticeImage', 'noticeId');
    }
    protected $fillable = [
        'title',
        'content',
        'writer',
        'email',
    ];
}
