<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'Sv_id',
        'Full_name',
        'Email',
        'Phone',
        'Avatar',
        'Address',
        'Role_id',
        'Create_date',
        'Create_by',
        'Update_date',
        'Update_by',
        'IsActive'
    ];
    protected $primaryKey = 'Id';
    // protected $table = 'users';
    public $timestamps = false;
    protected $hidden = [
        'Pw'
    ];
}
