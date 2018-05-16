<?php

namespace App\Http\Controllers\Crud;

use App\Lib\Crud\BookShopLib;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;


class BooksAPIController extends Controller
{
    //method to get all books (to admin page).
    public function getBooks()
    {
        try
        {
            $data = new BookShopLib();
            $query = $data->getAPIBooks();

                return datatables($query)->make(true);


        }
        catch (\Exception $e) {
            return ($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());


        }


    }
}
