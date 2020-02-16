<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientRequest extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'client_request';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'phone',
        'email',
        'name',
        'status',

    ];
}
