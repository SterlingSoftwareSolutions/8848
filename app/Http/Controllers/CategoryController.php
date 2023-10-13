<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{


    public function index_client()
    {
        $user = Auth::user();
        $categories = Category::query()->where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('app.index', [
            'categories' => $categories
        ]);
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "parent_id" => 'nullable',
            "name" => 'required',
            "description" => 'required',
            "icon" => 'required|file',
            "background_image" => 'required|file'
        ]);

        $category = Category::create([
            "parent_id" => $request->parent_id ?? null,
            "name" => $request->name,
            "description" => $request->description,
            "icon_url" => $request->icon->store('category_images'),
            "background_image_url" => $request->background_image->store('category_images')
        ]);

        if($request->wantsJson()){
            return response()->json([
                'success' => true,
                'category' => $category->load('parent', 'children')
            ]);
        }

        return redirect('/categories');

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {

        return response()->json([
            'success' => true,
            'category' => $category->load('parent', 'children')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            "parent_id" => 'nullable',
            "name" => 'required',
            "description" => 'required',
            "icon" => 'nullable|file',
            "background_image" => 'nullable|file'
        ]);

        $category->update([
            "parent_id" => $request->parent_id ?? null,
            "name" => $request->name,
            "description" => $request->description,
            "icon_url" => $request->icon ? $request->icon->store('category_images') : $category->icon_url,
            "background_image_url" => $request->background_image ? $request->background_image->store('category_images') : $category->background_image_url
        ]);

        return response()->json([
            'success' => true,
            'category' => $category->load('parent', 'children')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json([
            'success' => true,
        ]);
    }
}
