<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsesorKompetensi extends Model
{
    use HasFactory;

    protected $table = 'asesor_kompetensis'; // nama tabel (ubah jika berbeda di database)

    protected $fillable = [
        'no_registrasi',
        'nama',
        'email',
        'hp',
        'tgl_expired',
        'username',
    ];

    // Jika kolom `tgl_expired` bertipe date, tambahkan:
    protected $dates = ['tgl_expired'];

    // Jika primary key bukan 'id', misalnya 'no_registrasi'
    // hapus komentar di bawah ini:
    // protected $primaryKey = 'no_registrasi';
    // public $incrementing = false;
    // protected $keyType = 'string';
}
