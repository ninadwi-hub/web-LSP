<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BiodataAsesi extends Model
{
    protected $table = 'biodata_asesi';

    protected $fillable = [
        'user_id','no_hp','jenis_kelamin','kewarganegaraan','no_identitas',
        'tempat_lahir','tanggal_lahir','organisasi','alamat','provinsi','kabupaten',
        'pendidikan','nama_perguruan_tinggi','program_studi','pekerjaan',
        'nama_perusahaan','alamat_perusahaan','no_telp_perusahaan','email_perusahaan','jabatan_perusahaan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
