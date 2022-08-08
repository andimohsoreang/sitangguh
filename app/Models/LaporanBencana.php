<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanBencana extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kronologi',
        'bukti',
        'url_gmaps',
        'status',
        'read',
        'tanggal',
        'waktu',
        'kerusakan',
        'kerugian',
        'petugas_id',
        'darurat',
        'alasan',
    ];

    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function petugas()
    {
        return $this->belongsTo(User::class, 'petugas_id', 'id');
    }

}
