<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 21-05-2018
 * Time: 01:27 PM
 */

namespace App\Lib\Crud;
use Illuminate\Support\Facades\Log;
use App\Models\Crud\Book as BookModel;
use Illuminate\Support\Facades\Validator;
class Book
{

    public static function createBook($book_data): BookModel
    {

            $book = new BookModel;
            $book->fill($book_data);
            $book->save();

            return $book;

    }

    public static function updateBook($book_data): BookModel
    {
        $validator=Validator::make($book_data, [
            'name' => 'required|max:8',
            'price' => 'required|integer|min:0',
            'quantity' => 'required|integer|min:0',

        ]);
        if ($validator->fails()) {
            log::error('validate error');
            $book = new BookModel;
            return $book;

        }

        try {


            $book = BookModel::find($book_data['id']);

            $book = $book->fill($book_data);

            $book->save();

            return $book;
        }
        catch (\Exception $e) {
            log::error($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());

            $book = new BookModel;
            return $book;
        }
    }

    public static function deleteBook($id): BookModel
    {

        $book=BookModel::find($id);

        $book->destroy($id);

        return $book;
    }

}