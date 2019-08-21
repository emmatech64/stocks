<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $table="vilages";
    public function village(){
        return $this->belongsTo(Cell::class, 'codecell', 'CodeVillage');
}
}
