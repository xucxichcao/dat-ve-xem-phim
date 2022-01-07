<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CumRap extends Model
{
    public function heThongRap()
    {
        return $this->belongsTo(HeThongRap::class, 'maHeThongRap', 'maHeThongRap');
    }
    public function danhSachRap()
    {
        return $this->hasMany(Rap::class, 'maCumRap', 'maCumRap');
    }
    public function chieuPhim()
    {
        return $this->hasMany(ChieuPhim::class, 'maCumRap', 'maCumRap');
    }
}
