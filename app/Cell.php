<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cell extends Model
{
    public function sector()
    {
        return $this->belongsTo(Sector::class, 'sectorcode', 'codecell');
    }
    public function cell(){
        return $this->hasMany(Village::class, 'CodeVillage');

    }
}
