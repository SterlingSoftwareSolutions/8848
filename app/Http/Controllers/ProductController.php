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
                        'price' => $requestData['variant_price_' . $variantIndex]
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

            $category = Category::findOrFail($request->category_id);

            if($category->parent != null){
                $query->where('category_id', $category->id);
            } else{
                $query->whereIn('category_id', $category->children->pluck('id'));
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
        }

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'products' => $query->get()
            ]);
        }

        return view('app.products.index', [
            'products' => $query->get()
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

            $category = Category::findOrFail($request->category_id);

            if($category->parent != null){
                $query->where('category_id', $category->id);
            } else{
                $query->whereIn('category_id', $category->children->pluck('id'));
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
        }

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'products' => $query->get()
            ]);
        }

        return view('admin.products.index', [
            'products' => $query->get()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
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
            'sku' => 'required|unique:products,sku',
            'in_stock' => 'required',
            'image_1' => 'required|file|max:4096',
            'image_2' => 'nullable|file|max:4096',
            'image_3' => 'nullable|file|max:4096',
            'image_4' => 'nullable|file|max:4096',

            'variant_name_01' => 'required',
            'variant_price_01' => 'required'
        ]);

        $variants = $this->parse_variants($request);

        $product = Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'short_description' => $request->description,
            'category_id' => $request->category_id,
            'sku' => $request->sku,
            'in_stock' => $request->in_stock,
            'image_1_url' => $request->image_1 ? $request->image_1->store('public/prodduct_images') : null,
            'image_2_url' => $request->image_2 ? $request->image_2->store('public/prodduct_images') : null,
            'image_3_url' => $request->image_3 ? $request->image_3->store('public/prodduct_images') : null,
            'image_4_url' => $request->image_4 ? $request->image_4->store('public/prodduct_images') : null
        ]);



        foreach($variants as $variant) {
            Variant::create([
                'product_id' => $product->id,
                'name' => $variant['name'],
                'price' => $variant['price']
            ]);
        }

        return response()->json([
            'success' => true,
            'product' => $product
        ]);
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

        return view('admin.products.create',[
            'product' => $product->load('variants')
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
            'description' => 'required',
            'short_description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'sku' => 'required|unique:products,sku,' . $product->id,
            'in_stock' => 'required',
            'image_1' => 'nullable|file|max:4096',
            'image_2' => 'nullable|file|max:4096',
            'image_3' => 'nullable|file|max:4096',
            'image_4' => 'nullable|file|max:4096',
        ]);

        $variants = $this->parse_variants($request);

        $product->update([
            'title' => $request->title,
            'description' => $request->description,
            'short_description' => $request->description,
            'category_id' => $request->category_id,
            'sku' => $request->sku,
            'in_stock' => $request->in_stock,
            'image_1_url' => $request->image_1 ? $request->image_1->store('public/prodduct_images') : $product->image_1_url,
            'image_2_url' => $request->image_2 ? $request->image_2->store('public/prodduct_images') : $product->image_2_url,
            'image_3_url' => $request->image_3 ? $request->image_3->store('public/prodduct_images') : $product->image_3_url,
            'image_4_url' => $request->image_4 ? $request->image_4->store('public/prodduct_images') : $product->image_4_url
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
                    'price' => $variant['price']
                ]);
            } else{
                $existing_variant = Variant::where('product_id', $product->id)->where('id', $variant['id'])->firstOrFail();
                $existing_variant->update([
                    'name' => $variant['name'],
                    'price' => $variant['price']
                ]);
            }
        }

        return response()->json([
                'success' => true,
                'product' => $product->load('variants')
        ]);
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
