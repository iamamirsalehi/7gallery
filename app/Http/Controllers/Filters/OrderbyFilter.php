<?php


namespace App\Http\Controllers\Filters;

use App\Models\Product;

class OrderbyFilter
{
    public function newest()
    {
        return Product::orderBy('created_at', 'desc')->get();
    }

    public function mostPopular()
    {
        return Product::all();
    }

    public function default()
    {
        return Product::all();
    }

    public function lowToHigh()
    {
        return Product::orderBy('price', 'asc')->get();
    }

    public function highToLow()
    {
        return Product::orderBy('price', 'desc')->get();
    }
}