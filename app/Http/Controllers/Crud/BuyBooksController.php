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
           return $data->storeBookAfterBuy($request);


//            return redirect('buydbooks')->with('success', ['New Book Successfully Createsdasdasdad.']);

        }
        catch (\Exception $e) {
            return redirect('userbooks')->withErrors( 'OOPS.! Error In purchesing Book.');


        }

    }

// Method to VIEW BOOK AFTER BUY.
    public function viewBooksAfterBuy()
    {

              $data = new BuyBookShopLib();
            $data = $data->viewBooksAfterBuy();

              return view('user.Buydbooks', ['buydbooks' => $data]);


    }

}