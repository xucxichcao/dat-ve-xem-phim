<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phim extends Model
{
    use HasFactory;

    public function chieuPhim()
    {
        return $this->hasMany(ChieuPhim::class, 'maPhim', 'maPhim');
    }

    protected $primaryKey = 'maPhim';
}
