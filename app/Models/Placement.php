<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Placement extends Model
{
    protected $table = 'Placement';
    protected $primaryKey = 'idPlacement';
    protected $keyType = 'integer';
    protected $connection = 'mysql';

    protected $fillable = [
        'title',
        'description',
        'duration',
        'start_date',
        'expiration_date',
        'start_placement',
        'salary',
    ];

    use HasFactory;
}
