<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class main extends Model
{
    protected $fillable=[
        'title',
        'mainimage',
    ];
    use HasFactory;
}
