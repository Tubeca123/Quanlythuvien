<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Punish extends Model
{
    public function return_detail()
    {
        return $this->belongsTo(Borrow_return_detail::class, 'Return_detail_id');
    }
    use HasFactory;
    protected $fillable = [
        'Return_detail_id',
        'Admin_id',
        'User_id',
        'Status',
        'Price',
        'Create_date',
        'Create_by',
        'Update_date',
        'Update_by',
        'IsActive'
    ];
    protected $primaryKey = 'Id';
    protected $table = 'punish';
    public $timestamps = false;
}
