<?php

namespace jwwisniewski\Jigsaw\Subpage;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use jwwisniewski\Jigsaw\Core\Traits\MultiLangSupport;

class Subpage extends Model
{
    use SoftDeletes, MultiLangSupport;

    protected $casts = [
        'title' => 'array',
        'url' => 'array',
        'keywords' => 'array',
        'description' => 'array',
        'contents' => 'array',
    ];

    protected $multiLang = ['title', 'url', 'keywords', 'description', 'contents'];
    protected $fillable = ['title', 'url', 'keywords', 'description', 'contents'];
}
