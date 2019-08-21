<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function province(){
        return $this->belongsTo(Province::class,'provincecode','districtcode');
    }

    public function sectors(){
        return $this->hasMany('App\Sector');
    }


}
