<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ve extends Model
{
    public function nguoiDung()
    {
        return $this->belongsTo(User::class, 'taiKhoanNguoiDat', 'taiKhoan');
    }

    public function lichChieu()
    {
        return $this->belongsTo(LichChieu::class, 'maLichChieu', 'maLichChieu');
    }
}
