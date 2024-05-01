<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test_Save extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'true_answers',
        'quantity',
    ];
    public $timestamps = false;
    public $table = "test_saves";
}
