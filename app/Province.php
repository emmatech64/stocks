<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $primaryKey = 'provincecode';

    public function districts()
    {
        return $this->hasMany(District::class, 'provincecode');
    }
}
