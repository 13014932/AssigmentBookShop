<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 21-05-2018
 * Time: 01:27 PM
 */

namespace App\Lib\Crud;

use App\Models\Crud\Book as BookModel;
use Illuminate\Support\Facades\Validator;
class Book
{

    public static function createBook($array): BookModel
    {
        $validator = Validator::make($array, [
            'name' => 'required|max:8',
            'book_created_date' => 'required|date'

        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $book = new BookModel;
        $book->fill($array);
        $book->save();

        return $book;
    }

    public static function updateBook($array): BookModel
    {


        $book = BookModel::find($array['id']);

        $book = $book->fill($array);

        $book->save();

        return $book;
    }

    public static function deleteBook($id): BookModel
    {

        $book=BookModel::find($id);

        $book->destroy($id);

        return $book;
    }

}