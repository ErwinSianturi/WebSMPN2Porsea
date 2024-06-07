<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    protected $table = 'sekolah';
    protected $fillable = [
        'nama_sekolah',
        'alamat_sekolah',
        'no_telp',
        'email',
        'visi',
        'misi',
        'profil_sekolah',
        'tujuan_sekolah',
        'filosofi_sekolah',
        'foto',
        'youtube',
        'fb',
        'ig',
        'tiktok',
    ];
}
