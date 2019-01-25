<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'graphic_points',
        'processor_points',
        'ram_points',
        'name',
        'image_url',
        'is_program',
        'power_supplies_points',
    ];
}
