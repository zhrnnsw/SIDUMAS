<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tingkatan extends Model
{
    use HasFactory;
    protected $table = 'tingkatan';

    protected $fillable = [
        'id', 
        'keterangan',
    ];
    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class, 'id','id_tingkatan');
    }
}
