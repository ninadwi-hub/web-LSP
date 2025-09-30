<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalAsesmen extends Model
{
    protected $fillable = [
        'no_sk',
        'tgl_terbit_sk',
        'tanggal_asesmen',
        'skema_id',
        'tipe',
        'harga',
        'kuota'
    ];

    protected $casts = [
        'tgl_terbit_sk' => 'date',
        'tanggal_asesmen' => 'date',
        'harga' => 'decimal:0',
    ];

    public function skema()
    {
        return $this->belongsTo(Skema::class);
    }

    public function asesorUji()
    {
        return $this->belongsToMany(User::class, 'jadwal_asesor', 'jadwal_id', 'asesor_id')
                    ->wherePivot('role', 'uji')
                    ->withPivot('is_lead')
                    ->withTimestamps();
    }

    public function asesorValidator()
    {
        return $this->belongsToMany(User::class, 'jadwal_asesor', 'jadwal_id', 'asesor_id')
                    ->wherePivot('role', 'validator')
                    ->withPivot('is_lead')
                    ->withTimestamps();
    }

    public function leadAsesorUji()
    {
        return $this->asesorUji()->wherePivot('is_lead', true)->first();
    }

    public function leadAsesorValidator()
    {
        return $this->asesorValidator()->wherePivot('is_lead', true)->first();
    }
}