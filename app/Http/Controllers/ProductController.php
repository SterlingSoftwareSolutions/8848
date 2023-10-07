<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::query();

        if($request->category_id){
            $query->where('category_id', $request->category_id);
        }

        if($request->in_stock != null){
            $query->where('in_stock', $request->in_stock);
        }

        if($request->has('sort')){
            switch($request->sort){
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                case 'date_asc':
                    $query->orderBy('created_at', 'asc');
                    break;
                case 'date_desc':
                    $query->orderBy('created_at', 'desc');
                    break;
            }
        }

        return response()->json([
            'success' => true,
            'products' => $query->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'sku' => 'required|unique',
            'in_stock' => 'required',
            'image_1' => 'required|file|max:4096',
            'image_2' => 'required|file|max:4096',
            'image_3' => 'required|file|max:4096',
            'image_4' => 'required|file|max:4096'
        ]);

        $product = Product::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'sku' => $request->sku,
            'in_stock' => $request->in_stock,
            'image_1_url' => $request->image_1 ? $request->image_1->store('prodduct_images') : null,
            'image_2_url' => $request->image_2 ? $request->image_2->store('prodduct_images') : null,
            'image_3_url' => $request->image_3 ? $request->image_3->store('prodduct_images') : null,
            'image_4_url' => $request->image_4 ? $request->image_4->store('prodduct_images') : null
        ]);

        return response()->json([
            'success' => true,
            'product' => $product
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return response()->json([
            'success' => true,
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'sku' => 'required|unique:products,sku,' . $product->id,
            'in_stock' => 'required',
            'image_1' => 'nullable|file|max:4096',
            'image_2' => 'nullable|file|max:4096',
            'image_3' => 'nullable|file|max:4096',
            'image_4' => 'nullable|file|max:4096'
        ]);

        $product->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'sku' => $request->sku,
            'in_stock' => $request->in_stock,
            'image_1_url' => $request->image_1 ? $request->image_1->store('prodduct_images') : $product->image_1_url,
            'image_2_url' => $request->image_2 ? $request->image_2->store('prodduct_images') : $product->image_2_url,
            'image_3_url' => $request->image_3 ? $request->image_3->store('prodduct_images') : $product->image_3_url,
            'image_4_url' => $request->image_4 ? $request->image_4->store('prodduct_images') : $product->image_4_url
        ]);

        return response()->json([
            'success' => true,
            'product' => $product
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if($product){
            $product->delete();
            return response()->json([
                'success' => true
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Product not found'
        ]);
    }
}
