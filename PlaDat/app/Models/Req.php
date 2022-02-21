<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Req extends Model
{
    use HasFactory;

    protected $table = 'request';
    protected $primaryKey = ['student_email', 'idPlacement'];
    protected $keyType = 'integer';
    protected $connection = 'mysql';

    protected $fillable = [
        'student_email',
        'presentation_letter',
        'idPlacement',
        'path_curriculum',
    ];

    protected function setKeysForSaveQuery($query)
    {
        $query
            ->where('student_email', '=', $this->getAttribute('student_email'))
            ->where('idPlacement', '=', $this->getAttribute('idPlacement'));

        return $query;
    }


}
