<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\StoreRequest;
use App\Http\Requests\Admin\Categories\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(StoreRequest $request)
    {
       $validatedData = $request->validated();

       $createdCategory = Category::create([
           'title' => $validatedData['title'],
           'slug' => $validatedData['slug'],
       ]);

       if(!$createdCategory){
           return back()->with('failed', 'دسته بندی ایجاد نشد');
       }

       return back()->with('success', 'دسته بندی ایجاد شد');
    }

    public function all()
    {
        $categories = Category::paginate(10);

        return view('admin.categories.all', compact('categories'));
    }

    public function delete($category_id)
    {
        $category = Category::find($category_id);

        $category->delete();

        return back()->with('success', 'دسته بندی حذف شد');
    }

    public function edit($category_id)
    {
        $category = Category::find($category_id);

        return view('admin.categories.edit', compact('category'));
    } 

    public function update(UpdateRequest $request,$category_id)
    {
        $validatedData = $request->validated();

        $category = Category::find($category_id);
        
        $updatedCategory = $category->update([
            'title' => $validatedData['title'],
            'slug' => $validatedData['slug'],
        ]);

        if(!$updatedCategory){
            return back()->with('failed', 'دسته بندی برزورسانی نشد');
        }

        return back()->with('success', 'دسته بندی برزورسانی شد');
    }
}
