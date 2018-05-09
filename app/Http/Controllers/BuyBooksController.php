<?php

namespace App\Http\Controllers;
use App\Lib\BookShopLib;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;


class BuyBooksController extends Controller
{
    // Method to store BOOK AFTER BUY.
    public function storeBookAfterBuy(Request $request)
    {
        try {
            $data = new BookShopLib();
            $store = $data->storeBookAfterBuy($request);
            
            return redirect('/buydbooks');
            
        }
        catch (\Exception $e) {
           return ($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());

          
        }

    }

// Method to VIEW BOOK AFTER BUY.
    public function viewBooksAfterBuy()
    {

        try {
            $data = new BookShopLib();
            $data = $data->viewBooksAfterBuy();

             return view('Buydbooks', ['buydbooks' => $data]);
           
        } catch (\Exception $e) {
            return ($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());

            
        }


    }

}
