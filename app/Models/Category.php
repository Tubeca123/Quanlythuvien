<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name',
        'About',
        'Create_date',
        'Create_by',
        'Update_date',
        'Update_by',
        'IsActive'
    ];
    protected $primaryKey = 'Id';
    protected $table = 'categories';
    public $timestamps = false;
}
