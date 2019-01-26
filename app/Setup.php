<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setup extends Model
{
    /**
     * Get the phone record associated with the user.
     */
    public function user()
    {
        return $this->hasMany('App\User');
    }

    public function getComponentName($id)
    {
        return Component::findOrFail($id)->name;
    }

    protected $fillable = [
      'user_id', 'graphic_id', 'processor_id', 'power_supply_id', 'ram_id'
    ];
}
