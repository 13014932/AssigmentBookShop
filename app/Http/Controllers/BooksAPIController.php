<?php

namespace App\Http\Controllers;

use App\Lib\BookShopLib;
use Illuminate\Support\Facades\Log;


class BooksAPIController extends Controller
{
    //method to get all books (to admin page).
    public function getBooks()
    {
        try
        {
            $data = new BookShopLib();
            $BooksData = $data->getAllBook();
           
                return datatables($BooksData)->make(true);
            

        }
        catch (\Exception $e) {
            return ($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());

         
        }


    }
}
