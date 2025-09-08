<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class LoginUser extends Authenticatable
{
    use Notifiable;

    // pakai tabel login_users
    protected $table = 'login_users';

    protected $fillable = [
        'role',
        'name',
        'phone',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function biodata()
{
    return $this->hasOne(Biodata::class);
}

}
