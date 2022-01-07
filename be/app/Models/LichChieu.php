<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LichChieu extends Model
{
    public function rap()
    {
        return $this->belongsTo(Rap::class, 'maRap', 'maRap');
    }

    public function chieuPhim()
    {
        return $this->belongsTo(ChieuPhim::class, 'maChieu', 'maChieu');
    }

    public function ve()
    {
        return $this->hasMany(Ve::class, 'maLichChieu', 'maLichChieu');
    }
}
