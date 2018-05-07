<?php


namespace App\Lib;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BuyBook;
use Illuminate\Support\Facades\DB;

class BookShopLib
{

 // Retrun Venors Data.
    public function getBooks()
    {

        return	Book::all();

    }

    // method to store NEW BOOK data
    public function storeNewBook(Request $request)
    {
        $saveBooks = Book::create(request()->all());

           if ($saveBooks)
           {
+                return redirect('/adminbooks');
+            }
    }
    // method to DELETE Book.
    public function bookdelete(Request $request)
    {
        $delBook=Book::destroy($request->vendor_del_id);
        return $delBook;
    }
    //method to UPDATE Book  Data.
    public function bookUpdate(Request $request)
    {

        $bookUpdate = DB::table('books')
//            ->where('product_title', $request->Product_Titlee)
            ->where('id', $request->ubook_id)
            ->update(['name' => $request->ubook_name, 'price' => $request->uprice,
                'author_name' => $request->uauthor_name, 'special_price' => $request->uspecial_price,'book_created_date' => $request->ubook_created_date,'quantity' => $request->uquantity]);


            return $bookUpdate;


    }
// Method to store BOOK AFTER BUY.
    public function storeBookAfterBuy(Request $request)
    {
         $saveBook = Buybook::create(request()->all());

        if( $saveBook){
            $data=Buybook::find($request->book_id);
            $buydbook=$data->quantity;

            $saveBook=  DB::table('books')
                ->where('id', $request->book_id)
                ->update(['quantity' => $buydbook -($request->mbook_quantity)]);

            return $saveBook;

        }


    }
    // Method to VIEW BOOK AFTER BUY.
    public function viewBooksAfterBuy() {

        $data=Buybook::all();

        return $data;


    }

}
