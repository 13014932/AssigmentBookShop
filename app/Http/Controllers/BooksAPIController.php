<?php

namespace App\Http\Controllers;

use App\Models\Book;

use Illuminate\Support\Facades\Log;


class BooksAPIController extends Controller
{
    //method to get all books (to admin page).
    public function getBooks()
    {
        try
        {
            $query = Book::select('id','name', 'price', 'special_price','author_name','book_created_date','quantity');
           
                return datatables($query)->make(true);
            

        }
        catch (\Exception $e) {
            return ($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());

         
        }


    }
}
