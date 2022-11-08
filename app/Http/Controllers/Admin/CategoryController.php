<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    // show the category page
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    // add category form page
    public function addCategory()
    {
        return view('admin.category.addCategory');
    }

    // Store/Add category
    public function storeCategory(Request $request)
    {
        $category = new Category();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/category', $filename);
            $category->image = $filename;
        }


        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->has('status') ? '1' : '0';
        $category->popular = $request->has('popular') ? '1' : '0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_description = $request->input('meta_description');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->save();
        return redirect('/categories')->with('message', 'Category Added Successfully');
        Session::forget('message');
    }

    // show edit category form
    public function showEdit($id)
    {
        $category = Category::find($id);
        return view('admin.category.editCategory', compact('category'));
    }

    // update category
    public function editCategory(Request $request, $id)
    {
        $category = Category::find($id);
        if ($request->hasFile('image')) {
            $path = '/assets/uploads/category/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/category', $filename);
            $category->image = $filename;
        }

        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->has('status') ? '1' : '0';
        $category->popular = $request->has('popular') ? '1' : '0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_description = $request->input('meta_description');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->update();
        return redirect('/categories')->with('message', 'Category updated successfully');
        Session::forget('message');
    }

    // deelete category
    public function destroyCategory($id)
    {
        $category = Category::find($id);
        if ($category->image) {
            $path = '/assets/uploads/category' . '/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $category->delete();
        return back()->with('message', 'Category deleted successfully');
        Session::forget('message');
    }
}