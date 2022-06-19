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
        'lat',
        'long',
        'status',
        'read',
        'tanggal',
        'waktu',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
