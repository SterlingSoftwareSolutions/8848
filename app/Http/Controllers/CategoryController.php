<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public function index_client(Request $request)
    {
        $categories = Category::with('children')->where('parent_id', null)->get();

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'categories' => $categories
            ]);
        }

        return view('app.category', compact('categories'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::with('children')->where('parent_id', null)->get();

        if($request->wantsJson()){
            return response()->json([
                'success' => true,
                'categories' => $categories
            ]);
        }

        return view('admin.categories.index', compact('categories'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parent_categories = Category::with('children')->where('parent_id', null)->get();
        return view('admin.categories.create-edit', compact('parent_categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "parent_id" => 'nullable|exists:categories,id',
            "name" => 'required',
            "description" => 'nullable',
            "icon" => 'nullable|file',
            "background_image" => 'nullable|file'
        ]);

        $category = Category::create([
            "parent_id" => $request->parent_id ?? null,
            "name" => $request->name,
            "description" => $request->description ?? null,
            "icon_url" => $request->icon ? $request->icon->store('public/category_images') : null,
            "background_image_url" => $request->icon ? $request->icon->store('public/category_images') : null
        ]);

        if($request->wantsJson()){
            return response()->json([
                'success' => true,
                'category' => $category->load('parent', 'children')
            ]);
        }

        return redirect()->intended('/admin/categories');

    }

    /**
     * Display the specified resource.
     */
    public function show_client(Category $category, Request $request)
    {
        if($request->wantsJson()){
            return response()->json([
                'success' => true,
                'category' => $category->load('parent', 'children')
            ]);
        }
        return view('app.category', [
            'category' => $category,
            'categories' => $category->children
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Category $category)
    {   
        if($request->wantsJson())
        {
            return response()->json([
                'success' => true,
                'category' => $category->load('parent', 'children')
            ]);  
        }

        return view('admin.categories.index', [
            'parent' => $category,
            'categories' => $category->children
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $parent_categories = Category::with('children')->where('parent_id', null)->get();
        return view('admin.categories.create-edit', compact(['parent_categories', 'category']));    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            "parent_id" => 'nullable|exists:categories,id',
            "name" => 'required',
            "description" => 'nullable',
            "icon" => 'nullable|file',
            "background_image" => 'nullable|file'
        ]);

        $category->update([
            "parent_id" => $request->parent_id ?? null,
            "name" => $request->name,
            "description" => $request->description,
            "icon_url" => $request->icon ? $request->icon->store('public/category_images') : $category->icon_url,
            "background_image_url" => $request->background_image ? $request->background_image->store('public/category_images') : $category->background_image_url
        ]);

        if($request->wantsJson()){
            return response()->json([
                'success' => true,
                'category' => $category->load('parent', 'children')
            ]);
        }

        return redirect()->intended('/admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Category $category)
    {
        $category->delete();
        if($request->wantsJson()){
            return response()->json([
                'success' => true,
            ]);
        }
        return redirect()->intended('/admin/categories');
    }
}
