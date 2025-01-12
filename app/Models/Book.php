<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    public function Category()
    {
        return $this->belongsTo(Category::class, 'Categories_id'); 
    }
    public function Publisher()
    {
        return $this->belongsTo(Publisher::class, 'Publisher_id'); 
    }
     use HasFactory;

    protected $fillable = [
        'Name',
        'About',
        'Image',
        'Categories_id',
        'Publisher_id',
        'Quantity',
        'Stock',
        'Number_borowed',
        'Price',
        'Shelf',
        'Publised_year',
        'author',
        'Create_date',
        'Create_by',
        'Update_date',
        'Update_by',
        'IsActive'
    ];
    protected $primaryKey = 'Id';
    protected $table = 'books';
    public $timestamps = false;

}
