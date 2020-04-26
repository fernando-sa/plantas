<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantCare extends Model
{
    protected $table = 'plantCares';
    
    protected $guarded = [];

    public function plants()
    {
        $this->hasMany('App\Plants');
    }

}
