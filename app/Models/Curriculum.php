<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    protected $table = 'Curriculum';
    protected $primaryKey = 'idCurriculum';
    protected $keyType = 'string';
    protected $connection = 'mysql';

    use HasFactory;
}
