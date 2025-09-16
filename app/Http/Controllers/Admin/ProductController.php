<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.index');
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create',compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $validated = $request->validated();

        if(request()->hasFile('image')){
            $validated['image'] = request()->file('image')->store('images','public');
        }

        Product::create($validated);

        return redirect()->route('admin.products');
    }

}
