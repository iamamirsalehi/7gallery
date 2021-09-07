<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CheckoutController extends Controller
{
    public function show()
    {
        $products = !is_null(Cookie::get('basket')) ? json_decode(Cookie::get('basket'), true) : [];

        $productsPrice = array_sum(array_column($products, 'price'));

        return view('frontend.checkout', compact('products', 'productsPrice'));
    }
}
