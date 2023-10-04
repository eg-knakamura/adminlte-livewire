<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminUser extends \Illuminate\Foundation\Auth\User
{
    use HasFactory;

    protected $table = 'admin_users';

    protected $hidden = [
        'password'
    ];

    protected $fillable = [
        'name',
        'email',
        'password'
    ];
}
