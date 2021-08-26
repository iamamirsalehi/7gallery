<?php

use Illuminate\Support\Facades\Route;

Route::get('products/all', function (){
    return view('frontend.products.all');
});

Route::get('admin/index', function () {
    return view('admin.index');
});

Route::get('admin/users', function () {
    return view('admin.users.index');
});