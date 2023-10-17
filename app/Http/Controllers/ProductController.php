<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    private function parse_variants(Request $request){
        $variants = [];

        $requestData = $request->all();

        foreach ($requestData as $key => $value) {
            if (strpos($key, 'variant_name_') === 0) {

                $variantIndex = substr($key, strlen('variant_name_'));

                if (isset($requestData['variant_price_' . $variantIndex])) {
                    $variant = [
                        'id' => $variantIndex,
                        'name' => $value,
                        'price' => $requestData['variant_price_' . $variantIndex],
                        'sku' => $requestData['variant_sku_' . $variantIndex]
                    ];

                    $variants[] = $variant;
                }
            }
        }

        return $variants;
    }

    /**
     * Display a listing of the resource.
     */
    public function index_client(Request $request)
    {
        $query = Product::query();

        $query->with('variants');

        if($request->category_id){

            $category = Category::find($request->category_id);
            if($category){
                $ids = $category->children->pluck('id');
                $ids[] = $category->id;
                $query->whereIn('category_id', $ids);
            } else{
                $query->where('category_id', $request->category_id);
            }
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
        } else{
            $query->orderBy('created_at', 'desc');
        }

        // Search in all fields
        if ($request->q) {
            $query->where('title', 'like', '%' . $request->q . '%');
        }

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'products' => $query->with(['image_1, image_2', 'image_3', 'image_4'])
            ]);
        }

        return view('app.products.index', [
            'products' => $query->paginate(12),
            'category' => $category ?? null
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::query();

        $query->with('variants');

        if($request->category_id){

            $category = Category::find($request->category_id);
            if($category){
                $ids = $category->children->pluck('id');
                $ids[] = $category->id;
                $query->whereIn('category_id', $ids);
            } else{
                $query->where('category_id', $request->category_id);
            }
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
        } else{
            $query->orderBy('created_at', 'desc');
        }

        // Search in all fields
        if ($request->q) {
            $query->where('title', 'like', '%' . $request->q . '%');
        }

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'products' => $query->get()
            ]);
        }

        return view('admin.products.index', [
            'products' => $query->paginate(10),
            'categories' => Category::where('parent_id', null)->get()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create-edit', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'short_description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'nullable|exists:categories,id',
            'in_stock' => 'nullable',

            'image_1' => 'required|image|max:4096',
            'image_2' => 'nullable|image|max:4096',
            'image_3' => 'nullable|image|max:4096',
            'image_4' => 'nullable|image|max:4096',
            'pdf_file' => 'nullable|file|max:4096',

            'variant_name_01' => 'required',
            'variant_price_01' => 'required',
            'variant_sku_01' => 'required'
        ]);

        $variants = $this->parse_variants($request);

        $product = Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'short_description' => $request->description,
            'category_id' => $request->sub_category_id ?? $request->category_id,
            'sku' => null,
            'in_stock' => $request->in_stock ? true : false,
            'image_1_url' => $request->image_1 ? $request->image_1->store('public/product_images') : null,
            'image_2_url' => $request->image_2 ? $request->image_2->store('public/product_images') : null,
            'image_3_url' => $request->image_3 ? $request->image_3->store('public/product_images') : null,
            'image_4_url' => $request->image_4 ? $request->image_4->store('public/product_images') : null,
            'file_url' => $request->pdf_file ? $request->pdf_file->store('public/product_files') : null
        ]);

        foreach($variants as $variant) {
            Variant::create([
                'product_id' => $product->id,
                'name' => $variant['name'],
                'price' => $variant['price'],
                'sku' => $variant['sku']
            ]);
        }

        if($request->expectsJson()){
            return response()->json([
                'success' => true,
                'product' => $product
            ]);            
        }

        return redirect('/admin/products?category_id=' . $product->category_id)->withErrors(['success' => 'Product created']);
    }

    /**
     * Display the specified resource.
     */
    public function show_client(Request $request, Product $product)
    {
        $product->load('variants');

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'product' => $product
            ]);
        }

        return view('app.products.show',[
            'product' => $product->load('variants')
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Product $product)
    {
        $product->load('variants');

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'product' => $product
            ]);
        }

        return view('admin.products.create-edit',[
            'product' => $product->load('variants'),
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.products.create-edit',[
            'product' => $product->load('variants'),
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'short_description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'nullable|exists:categories,id',
            'in_stock' => 'nullable',
            'image_1' => 'nullable|file|max:4096',
            'image_2' => 'nullable|file|max:4096',
            'image_3' => 'nullable|file|max:4096',
            'image_4' => 'nullable|file|max:4096',
            'pdf_file' => 'nullable|file|max:4096',
        ]);


        $variants = $this->parse_variants($request);

        $product->update([
            'title' => $request->title,
            'description' => $request->description,
            'short_description' => $request->description,
            'category_id' => $request->sub_category_id ?? $request->category_id,
            'sku' => null,
            'in_stock' => $request->in_stock ? true : false,
            'image_1_url' => $request->image_1 ? $request->image_1->store('public/product_images') : $product->image_1_url,
            'image_2_url' => $request->image_2 ? $request->image_2->store('public/product_images') : $product->image_2_url,
            'image_3_url' => $request->image_3 ? $request->image_3->store('public/product_images') : $product->image_3_url,
            'image_4_url' => $request->image_4 ? $request->image_4->store('public/product_images') : $product->image_4_url,
            'file_url' => $request->pdf_file ? $request->pdf_file->store('public/product_files') : $product->file_url
        ]);

        // Delete variants
        $variant_ids = array_map(function ($item){
            return $item['id'][0] == 0 ? null : $item['id'];
        }, $variants);
        $existing_variant_ids = $product->variants->pluck('id')->toArray();
        $variants_to_delete = array_diff($existing_variant_ids, $variant_ids);

        foreach ($variants_to_delete as $id) {
            Variant::find($id)->delete();
        }

        // Add new variants & update exisiting
        foreach($variants as $variant) {
            if($variant['id'][0] == 0){
                Variant::create([
                    'product_id' => $product->id,
                    'name' => $variant['name'],
                    'price' => $variant['price'],
                    'sku' => $variant['sku']
                ]);
            } else{
                $existing_variant = Variant::where('product_id', $product->id)->where('id', $variant['id'])->firstOrFail();
                $existing_variant->update([
                    'name' => $variant['name'],
                    'price' => $variant['price'],
                    'sku' => $variant['sku']
                ]);
            }
        }

        // If product has no variants, create a default one
        if(!$product->variants->count()){
                Variant::create([
                    'product_id' => $product->id,
                    'name' => 'Default',
                    'price' => null,
                    'sku' => null
                ]);
        }

        if($request->wantsJson()){
             return response()->json([
                'success' => true,
                'product' => $product->load('variants')
            ]);
        }

        return redirect('/admin/products?category_id=' . $product->category_id)->withErrors(['success' => 'Product updated.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Product $product)
    {
        $product->delete();
        if($request->wantsJson()){
            return response()->json([
                'success' => true
            ]);
        }
        return back()->withErrors(['success' => "Product deleted"]);
    }
}
