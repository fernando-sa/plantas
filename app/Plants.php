<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plants extends Model
{
    protected $guarded = [];

    public function PlantCare()
    {
        $this->belongsTo('App\PlantCare', 'plantCareId');
    }
}
