<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table = 'Request';
    protected $primaryKey = ['Student_email', 'Placement_idPlacement'];
    protected $keyType = 'integer';
    protected $connection = 'mysql';

    use HasFactory;
}
