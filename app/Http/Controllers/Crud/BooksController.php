<?php

namespace App\Http\Controllers\Crud;

use App\Lib\Crud\BookShopLib;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    // method to get adminbooks View.
    public function adminbooks()
    {
            return view('admin.adminbooks');

    }

    // method to get all books to user View page.
    public function userbooks()
    {

        try {
            $data = new BookShopLib();
            $Books = $data->getBooks();

            return view('user.userbooks', ['showdata' => $Books]);

        } catch (\Exception $e) {
           return ($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());


        }


    }

    // method to store NEW BOOK .
    public function storeNewBook(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'book_name' => 'required|max:6',
            'book_created_date' => 'required|date'

        ]);
        if ($validator->fails()) {
            return redirect('errors')
                ->withErrors($validator)
                ->withInput();
        }

        try {

            $data = new BookShopLib();
            $data->storeNewBook($request);

            return redirect('/adminbooks');

        } catch (\Exception $e) {
            return ($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());

        }

    }

    // method to DELETE BOOK.
    public function bookdelete(Request $request)
    {
        try {
            $delBook = new BookShopLib();
            $delBook->bookdelete($request->book_del_id);

                return redirect('/adminbooks');

        } catch (\Exception $e) {
            return ($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());

        }
    }

    //method to UPDATE Book  Data.

    public function bookUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'update_book_name' => 'required|max:6',
            'update_book_created_date' => 'required|date'

        ]);
        if ($validator->fails()) {
            return redirect('errors')
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $bookUpdate = new BookShopLib();
            $bookUpdate->bookUpdate($request);

                return redirect('/adminbooks');

        } catch (\Exception $e) {
            return ($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());


        }

    }

    public function errors()
    {
        try {
            return view('post.errors');

        } catch (\Exception $e) {
            return ($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());


        }
    }
}
