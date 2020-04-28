<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantCare extends Model
{
    protected $table = 'plantCares';
    
    protected $guarded = [];

    public function plants()
    {
        return $this->hasMany('App\Plant', 'plantCareId', 'id');
    }

    public function responsibleUser()
    {
        return $this->belongsTo('App\User', 'responsibleUserId', 'id');
    }

    public function readableStatus()
    {
        if(! $this->isActive) return "Pedido inativo";
        if($this->isTaken) return "<span style='color: green'>Pedido aceito por <a href=" . route('showProfile', ['id' => $this->responsibleUser->id]) . "> {$this->responsibleUser->name} </a></span>";
        if(strtotime('today') > strtotime($this->beginDate)) return "<span style='color: red'>Pedido vencido</span>";
        return "Pedido em aberto";
    }
    
    public function maxPlantSize()
    {
        $maxSize = 'small';
        foreach($this->plants as $plant){
            if($plant->size == 'big') return 'big';
            
            if($plant->size == 'medium') $maxSize = 'medium';
        }
        return $maxSize;
    }
}
