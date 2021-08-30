<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Utilities\ImageUploader;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Products\StoreRequest;

class ProductsController extends Controller
{
    public function create()
    {
        $categories = Category::all();

        return view('admin.products.add', compact('categories'));
    }

    public function store(StoreRequest $request)
    {
        $validatedData = $request->validated();
       
        $admin = User::where('email', 'admin@gmail.com')->first();

        $createdProduct = Product::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'category_id' => $validatedData['category_id'],
            'price' => $validatedData['price'],
            'owner_id' => $admin->id,
        ]);

        try{

            $basePath = 'products/' . $createdProduct->id . '/';

            $sourceImageFullPath = $basePath . 'source_url_' . $validatedData['source_url']->getClientOriginalName();
            
            $images = [
                'thumbnail_url' => $validatedData['thumbnail_url'],
                'demo_url' => $validatedData['demo_url'],
            ];
    
            $imagesPath = ImageUploader::uploadMany($images, $basePath);
    
            ImageUploader::upload($validatedData['source_url'], $sourceImageFullPath, 'local_storage');
    
            $updatedProduct = $createdProduct->update([
                'thumbnail_url' => $imagesPath['thumbnail_url'],
                'demo_url' => $imagesPath['demo_url'],
                'source_url' => $sourceImageFullPath,
            ]);

            if(!$updatedProduct){
                throw new \Exception('تصاویر آپلود نشدند');
            }

            return back()->with('success', 'محصول ایجاد شد');

        }catch(\Exception $e){
            return back()->with('failed', $e->getMessage());
        }
    }
}
