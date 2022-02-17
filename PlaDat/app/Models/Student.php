<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /*
     * Associa a Studente la rispettiva tabella nel db
     */
    protected $table = 'Student';
    protected $primaryKey = 'email';
    protected $keyType = 'string';
    protected $connection = 'mysql';

    /*
     * Questo metodo indica quali metodi si possono assegnare in massa
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'surname',
        'birth_date',
        'Presentation',
        'photo_idPhoto'
    ];

    /*
     * Attributi che devono essere nascosti nella serializzazione
     */
    protected $hidden = [
        'password'
    ];

    /*
     * Qui devo scrivere le possibili i metodi che servono alla mia applicazione.
     * I metodi base sono gia instanziati di default.
     */


    use HasFactory;
}
