<?php

namespace App\Http\Controllers\Crud;

use App\Lib\Crud\BookShopLib;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


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
            return redirect('errors')->withErrors('OOPS.! Error In Loading... Books.');


        }


    }

    // method to store NEW BOOK .
    public function storeNewBook(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:8',
            'book_created_date' => 'required|date'

        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        try {

            $data = new BookShopLib();
            $data->storeNewBook($request->toArray());

            return back()->with('success', ['New Book Successfully Created.']);

        } catch (\Exception $e) {
            return back()->withErrors('OOPS.! Error In Creating New Book.');

        }

    }


    //method to UPDATE Book  Data.

    public function bookUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:8',
            'book_created_date' => 'required|date'

        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $bookUpdate = new BookShopLib();
            $bookUpdate->bookUpdate($request->toArray());

            return back()->with('success', ['Book Successfully Updated.']);

        } catch (\Exception $e) {
            return back()->withErrors('OOPS.! Error In Book Update.');


        }

    }

    // method to DELETE BOOK.
    public function bookdelete(Request $request)
    {
        try {
            $delBook = new BookShopLib();
            $delBook->bookdelete($request->book_del_id);

            return back()->with('success', ['Book Successfully Deleted.']);

        } catch (\Exception $e) {
            return back()->withErrors('OOPS. Error In Book Delete..!');

        }
    }

    // Method to display error on a page.
    public function errors()
    {
        return view('post.errors');
    }


}
