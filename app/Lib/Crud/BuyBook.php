<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 09-05-2018
 * Time: 11:38 AM
 */

namespace App\Lib\Crud;

use App\Models\Crud\BuyBook as Model;


class BuyBook
{
// Method to store BOOK AFTER BUY.
    public function storeBookAfterBuy($data):bool 
    {


            $save_book = new Model;

        $save_book->book_id = $data['book_id'];
        $save_book->book_price = $data['book_price'];
        $save_book->quantity = $data['model_book_quantity'];

        $save_book->save();
// SUBTRACT  the buying quantity from BOOKS table.
            $buyed_book_qty=$data['model_book_quantity'];
            $book_id=$data['book_id'];

            $sub_book = new Book();
        $sub_book->subtractBookQuantity($book_id,$buyed_book_qty);
        return true;


    }

    // Method to VIEW BOOK AFTER BUY.
    public function viewBooksAfterBuy():array  {

        $viewbooks=Model::all()->toArray();

        if(!empty($viewbooks))
        {

            return $viewbooks;
        }
        else {
            return [];
        }

    }
}