<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'id',
        'Ma_sv',
        'Name',
        'Gmail'
    ];
    
    protected $table = 'studens';
    public $timestamps = false;
    
}
