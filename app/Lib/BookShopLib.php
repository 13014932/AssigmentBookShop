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
        
             return Book::all()->toArray();
        
      
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
           return redirect('/adminbooks');
            

        } catch (\Exception $e) {
           return ($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());

           
        }


    }

    // method to DELETE Book.
    public function bookdelete($data)
    {
        try {
            $delBook = Book::destroy($data->book_del_id);

            return $delBook;
            
        } catch (\Exception $e) {
            return ($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());
         
        }
    }

    //method to UPDATE Book  Data.
    public function bookUpdate($data)
    {
        try {
                     
            $bookUpdate= Book::find($data('update_book_id'));
            $bookUpdate->name = $data->update_book_name;
            $bookUpdate->price = $data->update_book_price;
            $bookUpdate->author_name = $data->update_book_author_name;
            $bookUpdate->special_price = $data->update_book_special_price;
            $bookUpdate->book_created_date = $data->update_book_created_date;
            $bookUpdate->quantity = $data->update_book_quantity;
        $bookUpdate->save();
           
        } catch (\Exception $e) {
            return ($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());

          
        }
    }

// Method to store BOOK AFTER BUY.
    public function storeBookAfterBuy($data)
    {
        try {
            $saveBook = new Buybook;

        $saveBook->book_id = $request->book_id;
        $saveBook->book_price = $request->book_price;
        $saveBook->quantity = $request->mbook_quantity;
        
        $saveBook->save();
            
                $data = Buybook::find($data->book_id);
                $buydbook = $data->quantity;
                
                $saveBookQtyUpdate=Book::find($data('book_id'));
             $saveBookQtyUpdate->quantity = $buydbook - ($data->mbook_quantity);
                $saveBookQtyUpdate->save();
            
          return redirect('/buydbooks');

        } catch (\Exception $e) {
           return ($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());

           
        }


    }

    // Method to VIEW BOOK AFTER BUY.
    public function viewBooksAfterBuy()
    {

        return Buybook::all()->toArray();


    }
    // Method to give book data to BookAPIController.
    public function getAllBook()
    {

      return Book::select('id','name', 'price', 'special_price','author_name','book_created_date','quantity');


    }

}
