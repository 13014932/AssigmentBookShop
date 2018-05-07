<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
 use App\Models\Buybook;
use App\Models\Book;
class BuyBooksController extends Controller
{
    // Method to store BOOK AFTER BUY.
    public function storeBookAfterBuy(Request $request)
    {
        try {
            $data = new BookShopLib();
            $store = $data->storeBookAfterBuy();

            if ($store){
                return redirect('/buydbooks');
            }
        }

        catch (\Exception $exception) {

            Log::info($exception->getMessage());
        }


    }

// Method to VIEW BOOK AFTER BUY.
    public function viewBooksAfterBuy() {

        try {
            $data = new BookShopLib();
            $data = $data->viewBooksAfterBuy();

            if ($data){
                return view('Buydbooks',['buydbooks' => $data]);
            }
        }

        catch (\Exception $exception) {

            Log::info($exception->getMessage());
        }


    }

}