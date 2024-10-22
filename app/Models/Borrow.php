<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $fillable = [
        'Borrow_user_id',
        'Borrow_admin_id',
        'Return_date',
        'Create_date',
        'Create_by',
        'Update_date',
        'Update_by',
        'Status',
        'IsAction'
    ];
    protected $primaryKey = 'Id';
    protected $table = 'borrow';
    public $timestamps = false;
}
