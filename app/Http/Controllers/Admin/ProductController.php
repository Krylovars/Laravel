<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImg;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        foreach ($products as $product) {
            $imgs = $product->imgs;
            $product->push($imgs);
        }


        return view('products.index')->with(compact(['products']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create')->with(compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        if ($request->category) {
            $categories = Category::find([$request->category]);
            $product->categories()->attach($categories);
        }


        $fileImg = $request->file('image');

        $fileImg->store('public/productsImage');
        $filename = $fileImg->hashName();

        $productImg = ProductImg::create([
            'product_id' => $product->id,
            'file_name' => $filename,
        ]);


        // Storage::delete([$path]);


        if ($product and $productImg) {
            return redirect()->route('admin.products.index')->with(['text' => 'Добавилось']);
        }

        return redirect()->route('admin.products.index')->with(['erorr' => 'Ошибка']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {


        $product_categories = $product->categories;

        $categories = Category::all();

        return view('products.edit')->with(compact(['product', 'categories', 'product_categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->name = $request->name;

        $product->price = $request->price;

        $category = Category::find($product->categories);
        $product->categories()->detach($category);

        $categories = Category::find([$request->category]);
        $product->categories()->attach($categories);

        if ($request->image_checkbox) {
            $imgs = $product->imgs()->get();


            Storage::delete(['public/productsImage/' . $imgs->first()->file_name]);

            $product->imgs()->delete();

            $fileImg = $request->file('image');


            $fileImg->store('public/productsImage');
            $filename = $fileImg->hashName();

            $productImg = ProductImg::create([
                'product_id' => $product->id,
                'file_name' => $filename,
            ]);
        }

        if ($product->save()) {
            return redirect()->route('admin.products.index')->with(['success' => 'Category successfully updated.']);
        }

        return redirect()->back()->with(['fail' => 'Unable to update category.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->delete()) {
            return redirect()->back()->with(['success' => 'Товар Удален']);
        }

        return redirect()->back()->with(['fail' => 'Не удалось удалить']);
    }
}
