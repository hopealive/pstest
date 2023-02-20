<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'psycho_type_id',
        'answers',
        'user_info'
    ];

    protected $casts = [
        'answers' => 'array',
        'user_info' => 'object',
    ];
}
