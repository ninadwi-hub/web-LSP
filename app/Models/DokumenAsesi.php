<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DokumenAsesi extends Model
{
    protected $table = 'dokumen_asesi';

    protected $fillable = [
        'user_id','foto','ktp_sim_paspor','ijazah','sertifikat','cv','tanda_tangan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
