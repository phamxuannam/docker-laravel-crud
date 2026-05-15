<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model  //Model
{
    //HasRoles: add into User

    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed'
        ];
    }
}
