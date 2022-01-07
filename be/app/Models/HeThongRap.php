<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeThongRap extends Model
{
    // protected $hidden = [
    //     'id', 'timestamp'
    // ];
    public function cumRap()
    {
        return $this->hasMany(CumRap::class, 'maHeThongRap', 'maHeThongRap');
    }
}
