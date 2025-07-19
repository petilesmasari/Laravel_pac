<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat',
        'telepon',
        'email',
        'pekerjaan',
        'program',
        'metode_pembayaran',
        'bukti_pembayaran_path',
        'status'
    ];

    // Accessor untuk URL bukti pembayaran
    public function getBuktiPembayaranUrlAttribute()
    {
        return asset('storage/' . $this->bukti_pembayaran_path);
    }
}