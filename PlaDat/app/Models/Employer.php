<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    protected $table = 'Employer';
    protected $primaryKey = 'email';
    protected $keyType = 'string';
    protected $connection = 'mysql';

    protected $fillable = [
        'name',
        'email',
        'address',
        'description',
    ];

    protected $hidden = [
        'password'
    ];


}
