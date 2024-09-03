<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    protected $filable=[
        'room_id',
        'name',
        'email',
        'phone',
        'status',
        'start_date',
        'end_date',

    ];

    public function room(){
        return $this->hasOne('App\Models\Room','id','room_id');
    }
    use HasFactory;
}
