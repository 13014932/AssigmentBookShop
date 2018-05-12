<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 09-05-2018
 * Time: 11:38 AM
 */

namespace App\Lib\Crud;

use App\Models\Crud\BuyBook;


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

            $buyedbook=$data->model_book_quantity;
            $book_id=$data->book_id;

            $book = new BookShopLib();
            $saveBook = $book->subtractBookQuantity($book_id);
            $bookqty = $saveBook->quantity;
//            dd($buydbook);

            $saveBook->quantity = $bookqty - ($buyedbook);

             $saveBook->save();

           return redirect('buydbooks')->with('success', ['Book purchesed Successfully.']);

        } catch (\Exception $e) {
            return redirect('userbooks')->withErrors( 'OOPS.! Error In purchesing Book.');


        }

    }

    // Method to VIEW BOOK AFTER BUY.
    public function viewBooksAfterBuy():array  {

        $viewbooks=Buybook::all()->toArray();

        if(!empty($viewbooks))
        {

            return $viewbooks;
        }
        else {
            return [];
        }

    }
}