<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // LIST
    public function index()
    {
        $products = Product::with('category')->latest()->get();
        return view('admin.products.index', compact('products'));
    }

    // FORM TAMBAH
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    // SIMPAN
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $image = null;

        if($request->hasFile('image')){
            $image = $request->file('image')->store('products','public');
        }

        Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $image,
            'publisher' => $request->publisher,
            'publish_year' => $request->publish_year
        ]);

        return redirect()->route('products.index')
            ->with('success','Produk berhasil ditambah');
    }

    // DETAIL
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    // FORM EDIT
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product','categories'));
    }

    // UPDATE
    public function update(Request $request, Product $product)
    {
        if($request->hasFile('image')){
            if($product->image){
                Storage::disk('public')->delete($product->image);
            }

            $product->image = $request->file('image')->store('products','public');
        }

        $product->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'price'=>$request->price,
            'category_id'=>$request->category_id,
            'image'=>$product->image,
            'publisher'=>$request->publisher,
            'publish_year'=>$request->publish_year
        ]);

        return redirect()->route('products.index')
            ->with('success','Produk berhasil diupdate');
    }

    // DELETE
    public function destroy(Product $product)
    {
        if($product->image){
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return back()->with('success','Produk dihapus');
    }
}
