<?php

namespace App\Http\Controllers\Crud;

use App\Lib\Crud\BuyBook;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;


class BuyBooksController extends Controller
{
    // Method to store BOOK AFTER BUY.
    public function storeBookAfterBuy(Request $request)
    {
        try {
            $request_array=$request->all();
            $data = new BuyBook();
           $data->storeBookAfterBuy($request_array);


            return redirect('buydbooks')->with('success', ['Book *purchesed* Successfully.']);

        }
        catch (\Exception $e) {
            log::error($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());
            return redirect('userbooks')->withErrors( 'OOPS.! Error In purchesing Book.');


        }

    }

// Method to VIEW BOOK AFTER BUY.
    public function viewBooksAfterBuy()
    {

             $data = new BuyBook();
            $data = $data->viewBooksAfterBuy();

              return view('user.Buydbooks', ['buydbooks' => $data]);


    }

}