<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionDecryptions extends Model
{
    use HasFactory;

    protected $fillable = [
        'psycho_type_id',
        'answers',
    ];

    protected $casts = [
        'answers' => 'array',
    ];
}
