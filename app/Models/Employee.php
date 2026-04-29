<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_prenom',
        'grade',
        'cin',
        'drpp',
        'effet_localite_direction',
    ];
}