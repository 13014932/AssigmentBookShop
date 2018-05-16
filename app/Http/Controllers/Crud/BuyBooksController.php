<?php

namespace App\Http\Controllers\Crud;

use App\Lib\Crud\BuyBookShopLib;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;


class BuyBooksController extends Controller
{
    // Method to store BOOK AFTER BUY.
    public function storeBookAfterBuy(Request $request)
    {
        try {
            $data = new BuyBookShopLib();
           $data->storeBookAfterBuy($request);


                return redirect('buydbooks');

        }
        catch (\Exception $e) {
            return ($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());


        }

    }

// Method to VIEW BOOK AFTER BUY.
    public function viewBooksAfterBuy()
    {

        try {
            $data = new BuyBookShopLib();
            $data = $data->viewBooksAfterBuy();

                return view('user.Buydbooks', ['buydbooks' => $data]);

        } catch (\Exception $e) {
            return ($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());


        }


    }

}