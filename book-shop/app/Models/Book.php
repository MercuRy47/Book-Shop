<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';
    protected $primaryKey = 'bk_id';
    public $timestamps = false;

    protected $fillable = [
        'bk_title', 'bk_author', 'bk_publisher', 'bk_genre', 
        'bk_price', 'bk_stock', 'bk_published_year', 'bk_description', 'bk_image_url'
    ];
}
