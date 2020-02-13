<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'post';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'title',
        'seo_url',
        'description',
        'keywords',
        'image',
        'content',
        'is_top',
        'type',
        'status',
        'post_relate',
        'created_at',
        'updated_at',
        'description',
    ];
}
