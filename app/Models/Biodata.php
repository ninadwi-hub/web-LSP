<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;
    protected $table = 'biodata';
    protected $fillable = [
        'user_id','nama_lengkap','jenis_kelamin','tempat_lahir','tanggal_lahir',
        'alamat','provinsi','kabupaten','kewarganegaraan','no_identitas','organisasi','no_hp',
        'pendidikan','nama_pt','program_studi','pekerjaan','nama_perusahaan','alamat_perusahaan',
        'telp_perusahaan','email_perusahaan','jabatan',
        'foto','ktp','ijazah','sertifikat','cv','tanda_tangan'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
