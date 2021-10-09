<?php

namespace App\Http\Controllers\adminControllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Traits\categoryTrait;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use categoryTrait;
    public function index()
    {
        $categories =  Category::with('products')->get();
        $this->productsCount($categories);
        return view('admin.categories', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
            'icon' => 'required|min:3',
        ]);
        $imagePath = time() . '_category.' . $request->image->extension();
        $request->image->move(public_path('images/CategoriesImages'), $imagePath);
        Category::create([
            'name' => $request->name,
            'image' => $imagePath,
            'icon' => $request->icon,
        ]);
        Session()->flash('done', 'Category Has Been Added !');
        return redirect()->back();
    }
    public function edit($id)
    {
        $category = Category::where('id', $id)->first();
        return view('admin.categoryEdit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
            'icon' => 'required|min:3',
        ]);
        $imagePath = time() . '_category.' . $request->image->extension();
        $request->image->move(public_path('images/CategoriesImages'), $imagePath);
        @unlink(public_path("images/CategoriesImages/$request->image"));
        Category::where('id', $id)->update([
            'name' => $request->name,
            'image' => $imagePath,
            'icon' => $request->icon,
        ]);
        Session()->flash('done', 'Category Has Been Updated !');
        return redirect(route('admin.category.index'));
    }
    public function delete($id)
    {
        $category = Category::where('id', $id)->first();
        if (!$category) {
            Session()->flash('error', 'Category Not Found !');
            return redirect(route('admin.category.index'));
        }
        $category->delete();
        @unlink(public_path("images/CategoriesImages/$category->image"));
        
        Session()->flash('done', 'Category Has Been Deleted !');
        return redirect(route('admin.category.index'));
    }
}
