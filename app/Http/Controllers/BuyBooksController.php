<?php

namespace App\Http\Controllers;
use App\Lib\BookShopLib;
use Illuminate\Support\Facades\DB;
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

            if ($store) {
                return redirect('/buydbooks');
            }
        }
        catch (\Exception $e) {
            Log::error($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());

            return false;
        }

    }

// Method to VIEW BOOK AFTER BUY.
    public function viewBooksAfterBuy()
    {

        try {
            $data = new BookShopLib();
            $data = $data->viewBooksAfterBuy();

            if ($data) {
                return view('Buydbooks', ['buydbooks' => $data]);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage() . " => on file " . $e->getFile() . " => on line number = " . $e->getLine());

            return false;
        }


    }

}