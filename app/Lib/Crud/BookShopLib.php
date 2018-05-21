<?php


namespace App\Lib\Crud;

use Illuminate\Support\Facades\Log;
use App\Models\Crud\Book;
use Mockery\Exception;


class BookShopLib
{

    // for testing PuposeOnly test -tests-
    public static function  sum($a,$b){

        return $c=$a+$b;
    }

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
//          dd($data);

            $saveBooks = new Book;

            $saveBooks->name = $data['name'];
            $saveBooks->price = $data['price'];
            $saveBooks->author_name = $data['author_name'];
            $saveBooks->special_price = $data['special_price'];
            $saveBooks->book_created_date = $data['book_created_date'];
            $saveBooks->quantity = $data['quantity'];

            return $saveBooks->save();

    }


    //method to UPDATE Book  Data.
    public function bookUpdate($data)
    {
            $id = array("id" => $data['id']);


            $bookUpdates = array("name" => $data['name'], "price" => $data['price'], "author_name" => $data['author_name'],
                "special_price" => $data['special_price'], "book_created_date" => $data['book_created_date'], "quantity" => $data['quantity']);



           $updates= Book::updateOrCreate($id, $bookUpdates);

           return $updates;

            
    }

    // method to DELETE Book.
    public function bookdelete($id)
    {

        return Book::destroy($id);
    }

// method to get books to admin books view. (to datatable)
    public function getAPIBooks()
    {

           return Book::select('id', 'name', 'price', 'special_price', 'author_name', 'book_created_date', 'quantity');

    }

    // method SUBTRACT  the buying quantity from BOOKS table.
    public function subtractBookQuantity($id,$buyedBookQty)
    {

        $book=  Book::find($id);
        $bookqty = $book->quantity;
//            dd($bookqty);


        $book->quantity = $bookqty - ($buyedBookQty);

       return $book->save();



    }


}
