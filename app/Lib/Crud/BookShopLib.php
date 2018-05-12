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
            $saveBooks->save();

            return back()->with('success', ['New Book Successfully Created.']);


        } catch (\Exception $e) {
            return back()->withErrors( 'OOPS.! Error In Creating New Book.');


        }
    }

    // method to DELETE Book.
    public function bookdelete($id)
    {
        try {
          Book::destroy($id);
//           if (!empty($bookdel))
//                {-
//                    return back()->with('success', ['Book Successfully Deleted']);
//
//                }
//                else{
//                    return back()->withErrors( 'OOPS.! Error In Book Deletefirst.');
//                }
            return back()->with('success', ['Book Successfully Deleted.']);

        } catch (\Exception $e) {
            return back()->withErrors( 'OOPS.! Error In Book Delete.');


        }
    }

    //method to UPDATE Book  Data.
    public function bookUpdate($data)
    {
        try {


            $id = array("id" => $data->id);

            $bookUpdates = array("name" => $data->name, "price" => $data->price, "author_name" => $data->author_name,
                "special_price" => $data->special_price, "book_created_date" => $data->book_created_date, "quantity" => $data->quantity);


            Book::updateOrCreate($id, $bookUpdates);

            return back()->with('success', ['Book Successfully Updated.']);

        } catch (\Exception $e) {
            return back()->withErrors( 'OOPS.! Error In Book Update.');


        }
    }

// method to get books to admin books view. (to datatable)
    public function getAPIBooks()
    {

           return Book::select('id', 'name', 'price', 'special_price', 'author_name', 'book_created_date', 'quantity');

    }

    // method SUBTRACT  the buying quantity from BOOKS table.
    public function subtractBookQuantity($id)
    {

            return  Book::find($id);

    }


}