<?php

namespace App\Models\Cert;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userr extends Model
{
    use HasFactory;

    protected $table = "Users";
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

}
