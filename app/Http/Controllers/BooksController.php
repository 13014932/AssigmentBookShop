<?php

namespace App\Http\Controllers;

use App\Lib\BookShopLib;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    // method to get adminbooks View.
    public function adminbooks()
    {
        try {
            $adminbooks = view('admin.adminbooks');
            if ($adminbooks) {
                return $adminbooks;
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());

            return false;
        }
    }

    // method to get all books to user View page.
    public function userbooks()
    {

        try {
            $data = new BookShopLib();
            $BookData = $data->getBooks();
            if ($BookData) {
                return view('user.userbooks', ['showdata' => $BookData]);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());

            return false;
        }


    }

    // method to store NEW BOOK data
    public function storeNewBook(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'book_name' => 'required|max:2',
            'book_created_date' => 'required|date'

        ]);
        if ($validator->fails()) {
            return redirect('errors')
                ->withErrors($validator)
                ->withInput();
        }

        try {

            $data = new BookShopLib();
            $store = $data->storeNewBook($request);
            if ($store) {
                return redirect('/adminbooks');
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());

            return false;
        }

    }

    // method to DELETE Book.
    public function bookdelete(Request $request)
    {
        try {
            $delBook = new BookShopLib();
            $delBook = $delBook->bookdelete($request);
            if ($delBook) {
                return redirect('/adminbooks');
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());

            return false;
        }
    }

    //method to UPDATE Book  Data.

    public function bookUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'book_name' => 'required|max:2',
            'book_created_date' => 'required|date'

        ]);
        if ($validator->fails()) {
            return redirect('errors')
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $bookUpdate = new BookShopLib();
            $bookUpdate = $bookUpdate->bookUpdate($request);
            if ($bookUpdate) {
                return redirect('/adminbooks');
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());

            return false;
        }

    }
    public function errors()
    {
        try {
            $adminerror = view('post.errors');
            if ($adminerror) {
                return $adminerror;
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());

            return false;
        }
    }
}
