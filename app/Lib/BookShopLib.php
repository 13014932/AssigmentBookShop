<?php


namespace App\Lib;

use Illuminate\Support\Facades\Log;
use App\Models\Book;
use App\Models\BuyBook;
use Illuminate\Support\Facades\DB;

class BookShopLib
{

    //Method Retrun User Books.
    public function getBooks()
    {
        try {
            $getbooks = Book::all();
            if ($getbooks) {
                return $getbooks;
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());

            return false;
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

            if ($saveBooks->save()) {
                return true;
            }

<<<<<<< HEAD
        } catch (\Exception $e) {
            Log::error($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());

            return false;
        }
=======
           if ($saveBooks)
           {
+                return redirect('/adminbooks');
+            }
>>>>>>> f48a358c62ccc61ef50cc91adaead58bfd3a7676
    }

    // method to DELETE Book.
    public function bookdelete($data)
    {
        try {
            $delBook = Book::destroy($data->book_del_id);

            if ($delBook) {
                return $delBook;
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());

            return false;
        }
    }

    //method to UPDATE Book  Data.
    public function bookUpdate($data)
    {
        try {
            $bookUpdate = DB::table('books')
//            ->where('product_title', $request->Product_Titlee)
                ->where('id', $data->update_book_id)
                ->update(['name' => $data->update_book_name, 'price' => $data->update_book_price,
                    'author_name' => $data->update_book_author_name, 'special_price' => $data->update_book_special_price,
                    'book_created_date' => $data->update_book_created_date,
                    'quantity' => $data->update_book_quantity]);

            if ($bookUpdate) {
                return $bookUpdate;
            }

        } catch (\Exception $e) {
            Log::error($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());

            return false;
        }
    }

// Method to store BOOK AFTER BUY.
    public function storeBookAfterBuy($data)
    {
        try {
            $saveBook = Buybook::create($data()->all());

            if ($saveBook) {
                $data = Buybook::find($data->book_id);
                $buydbook = $data->quantity;

                $saveBook = DB::table('books')
                    ->where('id', $data->book_id)
                    ->update(['quantity' => $buydbook - ($data->mbook_quantity)]);

                return $saveBook;

            }

        } catch (\Exception $e) {
            Log::error($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());

            return false;
        }


    }

    // Method to VIEW BOOK AFTER BUY.
    public function viewBooksAfterBuy()
    {

        try {
            $data = Buybook::all();
            if ($data) {
                return $data;
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());

            return false;
        }


    }

}
