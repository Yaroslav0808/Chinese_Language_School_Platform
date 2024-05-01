<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word_Know extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'word_id',
    ];

    public $table = "word_knows";
    public $timestamps = false;
}
