<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'setting';

    public $timestamps = false;

    protected $fillable = [
        'baner_contact',
        'hotline',
        'project_name',
        'address',
        'email',
        'facebook',
        'zalo',
        'contact_info',
    ];

    public function panels()
    {
        return $this->hasMany(LandingPage::class, 'panel_id');
    }
}
