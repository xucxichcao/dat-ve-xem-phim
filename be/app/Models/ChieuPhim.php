<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChieuPhim extends Model
{
    public function phim()
    {
        return $this->belongsTo(Phim::class, 'maPhim', 'maPhim');
    }

    public function cumRap()
    {
        return $this->belongsTo(CumRap::class, 'maCumRap', 'maCumRap');
    }

    public function lichChieu()
    {
        return $this->hasMany(LichChieu::class, 'maChieu', 'maChieu');
    }
}
