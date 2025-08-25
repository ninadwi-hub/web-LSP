<?php

return [

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'), // default tetap admin
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    'guards' => [
        // Guard untuk Admin (tabel users)
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        // Guard untuk Publik (tabel login_users)
        'publik' => [
            'driver' => 'session',
            'provider' => 'login_users',
        ],
    ],

    'providers' => [
        // Admin pakai tabel users
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        // Publik pakai tabel login_users
        'login_users' => [
            'driver' => 'eloquent',
            'model' => App\Models\LoginUser::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'login_users' => [
            'provider' => 'login_users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
