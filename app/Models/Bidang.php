<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    use HasFactory;
    protected $table = 'bidang';

    protected $fillable = [
        'id', 
        'nama_bidang',
    ];
    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class, 'id','id_bidang');
    }
}