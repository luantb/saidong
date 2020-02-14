<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'banner';

    public $timestamps = false;

    protected $fillable = [
        'title',
        'description',
        'image',
        'status',
    ];
}
