<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'gallery';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'panel_id',
    ];

    public function panels()
    {
        return $this->hasMany(LandingPage::class, 'panel_id');
    }


}
