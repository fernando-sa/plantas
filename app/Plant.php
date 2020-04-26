<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $guarded = [];

    public function plantCare()
    {
        return $this->belongsTo('App\PlantCare', 'plantCareId', 'id');
    }

    public function translatedSize()
    {
        switch($this->size){
            case "small": return 'pequeno';
            case "medium": return 'médio';
            case "big": return 'grande';
        }
    }
}
