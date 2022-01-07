<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rap extends Model
{
    use HasFactory;

    public function cumRap()
    {
        return $this->belongsTo(CumRap::class, 'maCumRap', 'maCumRap');
    }

    public function lichChieu()
    {
        return $this->hasMany(LichChieu::class, 'maRap', 'maRap');
    }
}
