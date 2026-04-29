<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    /**
     * L-hwayj li m-ogdor n-3mrohom b store() awla update()
     */
    protected $fillable = [
        'title',
        'file_path',
    ];
}