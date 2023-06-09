<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengaduan extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'pengaduan';

    protected $fillable = [
        'name', 
        'description', 
        'image', 
        'status', 
        'user_id',
        'id_tingkatan',
        'id_bidang'
    ];

    protected $hidden = [

    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function tingkatan()
    {
        return $this->belongsTo(Tingkatan::class);
    }
    public function bidang()
    {
        return $this->belongsTo(Bidang::class);
    }
}
