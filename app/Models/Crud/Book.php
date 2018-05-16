<?php

namespace App\Models\Crud;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable=['name',"price", "author_name","special_price", "book_created_date", "quantity"];
}
