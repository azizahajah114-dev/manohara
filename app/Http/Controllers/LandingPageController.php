<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class LandingPageController extends Controller
{
    //buat di landing page 
    //untuk mengambil best seller 
    public function index(Request $request)
    {
        // $bestSeller = (int) $request->get('best_seller', 0);

        //ini ambil 3 produk best seller
        $Produk = Produk::where('best_seller', 1)
                                ->take(3)
                                ->get();

        $allProduk = Produk::take(6)->get();
        return view('landingpage.landingpage', ['produk' => $Produk, 'allProduk' => $allProduk]);
    }
}
