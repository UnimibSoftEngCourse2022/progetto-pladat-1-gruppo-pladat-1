<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'Photo';
    protected $primaryKey = 'idPhoto';
    protected $keyType = 'integer';
    protected $connection = 'mysql';

    protected $fillable = [
        'description',
        'path',
    ];

    use HasFactory;
}
