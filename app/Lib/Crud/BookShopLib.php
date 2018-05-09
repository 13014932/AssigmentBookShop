<?php


namespace App\Lib\Crud;

use Illuminate\Support\Facades\Log;
use App\Models\Crud\Book;




class BookShopLib
{

    //Method Retrun User Books.
    public function getBooks()
    {
        try {
            $getbooks = Book::all()->toArray();

                return $getbooks;

        } catch (\Exception $e) {
            return ($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());


        }
    }

    // method to store NEW BOOK data
    public function storeNewBook($data)
    {
        try {
            $saveBooks = new Book;

            $saveBooks->name = $data->book_name;
            $saveBooks->price = $data->price;
            $saveBooks->author_name = $data->author_name;
            $saveBooks->special_price = $data->special_price;
            $saveBooks->book_created_date = $data->book_created_date;
            $saveBooks->quantity = $data->quantity;

            return $saveBooks->save();


        } catch (\Exception $e) {
           return ($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());


        }
    }

    // method to DELETE Book.
    public function bookdelete($id)
    {
        try {
            $delBook = Book::destroy($id);

                return $delBook;

        } catch (\Exception $e) {
            return ($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());


        }
    }

    //method to UPDATE Book  Data.
    public function bookUpdate($data)
    {
        try {


            $bookUpdate= Book::find($data->update_book_id);

            $bookUpdate->name = $data->update_book_name;
            $bookUpdate->price = $data->update_book_price;
            $bookUpdate->author_name = $data->update_book_author_name;
            $bookUpdate->special_price = $data->update_book_special_price;
            $bookUpdate->book_created_date = $data->update_book_created_date;
            $bookUpdate->quantity = $data->update_book_quantity;

            return $bookUpdate->save();


        } catch (\Exception $e) {
            return ($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());


        }
    }

    public function getAPIBooks()
    {
        try {
            $getbooks =  Book::select('id','name', 'price', 'special_price','author_name','book_created_date','quantity');

            return $getbooks;

        } catch (\Exception $e) {
            return ($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());


        }
    }


}