<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;
    protected $table = 'words';

    // fillable fields
    protected $fillable = [
        'wordFirstLang',
        'sentenceFirstLang',
        'wordSecondLang',
        'sentenceSecondLang',
    ];
}

