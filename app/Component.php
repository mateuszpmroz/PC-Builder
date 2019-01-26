<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    const TYPE_PROCESSOR = 0;
    const TYPE_GRAPHICS_CARD = 1;
    const TYPE_RAM = 2;
    const TYPE_POWER_SUPPLY = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'type', 'points', 'price'
    ];

    public function getNameWithPrice()
    {
        return "$this->name - {$this->price}.00zł";
    }
}
