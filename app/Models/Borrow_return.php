<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrow_return extends Model
{
    
    protected $fillable = [
        'Borrow_id',
        'Admin_id',
        'Return_date',
        'Create_date',
        'Create_by',
        'Update_date',
        'Update_by',
        'Status',
        'IsAction',
    ];
    protected $primaryKey = 'Id';
    protected $table = 'borrow_return';
    public $timestamps = false;
}
