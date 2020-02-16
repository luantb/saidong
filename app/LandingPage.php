<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    protected $table = 'landing_page';

    public $timestamps = false;

    protected $fillable = [
        'title',
        'slug_title',
        'position',
        'page_type',
        'type',
        'content',
        'status',
        'order_number',
        'in_menu',
    ];

    public function gallerys()
    {
        return $this->hasMany(Gallery::class, 'panel_id');
    }

}
