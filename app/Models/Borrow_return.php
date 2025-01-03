<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrow_return extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'User_id', 'Id');
    }
    public function details()
    {
        return $this->hasMany(Borrow::class, 'Borrow_id', 'Id');
    }
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
