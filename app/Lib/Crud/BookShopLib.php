<?php


namespace App\Lib\Crud;

use Illuminate\Support\Facades\Log;
use App\Models\Crud\Book;
use Mockery\Exception;


class BookShopLib
{

    //Method Retrun User Books.
    public function getBooks(): array
    {
        $getbooks = Book::all()->toArray();

        if (!empty($getbooks)) {
            return $getbooks;
        } else {

            return [];
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


            $id = array("id" => $data->id);

            $bookUpdates = array("name" => $data->name, "price" => $data->price, "author_name" => $data->author_name,
                "special_price" => $data->special_price, "book_created_date" => $data->book_created_date, "quantity" => $data->quantity);

            $result = Book::updateOrCreate($id, $bookUpdates);
            
               
            if (!$result) {
                throw new Exception("Error in book updateOrCreate");
            }



        } catch (\Exception $e) {
            Log::error($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());


        }
    }

// method to get books to admin books view. (to datatable)
    public function getAPIBooks()
    {
        try {
            $getbooks = Book::select('id', 'name', 'price', 'special_price', 'author_name', 'book_created_date', 'quantity');

            return $getbooks;

        } catch (\Exception $e) {
            return ($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());


        }
    }

    // method SUBTRACT  the buying quantity from BOOKS table.
    public function subtractBookQuantity($id)
    {
        try {

            $saveBook = Book::find($id);

            return $saveBook;


        } catch (\Exception $e) {
            return ($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());


        }
    }


}
