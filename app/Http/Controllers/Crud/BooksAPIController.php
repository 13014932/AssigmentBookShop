<?php

namespace App\Http\Controllers\Crud;

use App\Lib\Crud\Book;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;


class BooksAPIController extends Controller
{
    //method to get all books (to admin page).
    public function getBooks()
    {
        try
        {
            $data = new Book();
            $query = $data->getAPIBooks();

                return datatables($query)->make(true);


        }
        catch (\Exception $e) {
            log::error($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());


        }


    }
}
