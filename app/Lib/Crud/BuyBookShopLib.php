<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 09-05-2018
 * Time: 11:38 AM
 */

namespace App\Lib\Crud;

use App\Models\Crud\BuyBook;
use App\Models\Crud\Book;

class BuyBookShopLib
{
// Method to store BOOK AFTER BUY.
    public function storeBookAfterBuy($data)
    {
        try {

            $saveBook = new Buybook;

            $saveBook->book_id = $data->book_id;
            $saveBook->book_price = $data->book_price;
            $saveBook->quantity = $data->model_book_quantity;

            $saveBook->save();
// SUBTRACT  the buying quantity from BOOKS table.
            $saveBooks = Book::find($data->book_id);

            $buydbook = $saveBooks->quantity;

//            dd($buydbook);

            $saveBooks->quantity = $buydbook - ($data->model_book_quantity);


            return $saveBooks->save();


        } catch (\Exception $e) {
            return ($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());


        }


    }

    // Method to VIEW BOOK AFTER BUY.
    public function viewBooksAfterBuy()  {



        return Buybook::all()->toArray();

    }
}