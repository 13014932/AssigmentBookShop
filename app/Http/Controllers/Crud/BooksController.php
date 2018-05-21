<?php

namespace App\Http\Controllers\Crud;

use App\Lib\Crud\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class BooksController extends Controller
{
    // method to get adminbooks View.
    public function adminBooks()
    {
        return view('admin.adminbooks');

    }

    // method to get all books to user View page.
    public function userBooks()
    {

        try {
            $data = new Book();
            $books = $data->getBooks();

            return view('user.userbooks', ['showdata' => $books]);

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
//            $request_array=$request->all();
            $data = new Book();

           $book=$data->storeNewBook($request);

            if (!empty($book))
            {

                return back()->with('success', ['New Book Successfully Created.']);
            }
            throw new \Exception ();

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
            $book_update = new Book();
            $book_update=$book_update->storeNewBook($request);

            if (!empty($book_update)){

                return back()->with('success', ['Book Successfully Updated.']);
            }
            throw new \Exception ();


        } catch (\Exception $e) {
            return back()->withErrors('OOPS.! Error In Book Update.');


        }

    }

    // method to DELETE BOOK.
    public function bookDelete(Request $request)
    {
        try {
            $del_book = new Book();
            $del_book= $del_book->bookDelete($request->book_del_id);

            if (!empty($del_book)) {
                return back()->with('success', ['Book Successfully Deleted.']);

            }

            throw new \Exception ();

        }
        catch (\Exception $e) {
            return back()->withErrors('OOPS. Error In Book Delete..!');

        }
    }

    // Method to display error on a page.
    public function errors()
    {
        return view('post.errors');
    }


}
