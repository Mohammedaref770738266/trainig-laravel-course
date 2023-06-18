<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::paginate(25);
        return view('products.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('products.create')
            ->with('categories',$categories)
            ->with('brands',$brands);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $bath=$request->file('image')->store('products');
        $product =Product::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'brand_id'=>$request->brand_id,
            'price'=>$request->price,
            'image'=>$bath,
            'status'=>isset($request->status)
        ]);
        $product->categories()->sync($request->categories);
        toastr()->success('added successfully.');
        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('products.edit')
            ->with('categories',$categories)
            ->with('brands',$brands)
            ->with('product',$product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
            storage::delete($product->image);
            $product->delete();
            toastr()->success('deleted successfully.');
            toastr()->error('deleted filed.');
        return redirect(route('products.index'));
    }
}
