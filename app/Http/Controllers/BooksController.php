<?php

namespace App\Http\Controllers;
use App\Lib\BookShopLib;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    // method to get adminbooks View.
    public function adminbooks() {

        return view('admin.adminbooks');
    }
    // method to get all books to user View page.
    public function userbooks() {

        try {
            $data = new BookShopLib();
            $BookData = $data->getBooks();

            return view('userbooks', ['showdata' => $BookData]);
        }
        catch (\Exception $exception) {

            Log::info($exception->getMessage());
        }


    }

    // method to store NEW BOOK data
    public function storeNewBook(Request $request)
    {
        try {
            $data = new BookShopLib();
            $store = $data->storeNewBook();
            if ($store){
                return redirect('/adminbooks');
            }
        }

        catch (\Exception $exception) {

            Log::info($exception->getMessage());
        }

    }
 // method to DELETE Book.
    public function bookdelete(Request $request)
    {
        try {
            $delBook = new BookShopLib();
            $delBook = $delBook->bookdelete();
            if ($delBook){
                return redirect('/adminbooks');
            }
        }

        catch (\Exception $exception) {

            Log::info($exception->getMessage());
        }

    }

   //method to UPDATE Book  Data.

    public function bookUpdate(Request $request)
    {

        try {
            $bookUpdate = new BookShopLib();
            $bookUpdate = $bookUpdate->bookUpdate();
            if ($bookUpdate){
                return redirect('/adminbooks');
            }
        }

        catch (\Exception $exception) {

            Log::info($exception->getMessage());
        }

    }

}
