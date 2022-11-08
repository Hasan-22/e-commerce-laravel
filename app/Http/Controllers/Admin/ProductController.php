<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    // show the product page
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    // add product form page
    public function addProduct()
    {
        // sending categories for category id in add products page
        $categories = Category::all();

        return view('admin.product.addProduct', compact('categories'));
    }

    // Store/Add product
    public function storeProduct(Request $request)
    {
        $product = new Product();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/product', $filename);
            $product->image = $filename;
        }


        $product->category_id = $request->input('category_id');
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->small_description = $request->input('small_description');
        $product->description = $request->input('description');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->tax = $request->input('tax');
        $product->qty = $request->input('qty');
        $product->status = $request->has('status') ? '1' : '0';
        $product->popular = $request->has('popular') ? '1' : '0';
        $product->meta_title = $request->input('meta_title');
        $product->meta_description = $request->input('meta_description');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->save();
        return redirect('/products')->with('message', 'Product Added Successfully');
        Session::forget('message');
    }

    // show edit product form
    public function showEdit($id)
    {
        $product = Product::find($id);
        return view('admin.product.editProduct', compact('product'));
    }

    // update product
    public function editProduct(Request $request, $id)
    {
        $product = Product::find($id);
        if ($request->hasFile('image')) {
            $path = '/assets/uploads/product/' . $product->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/product/', $filename);
            $product->image = $filename;
        }

        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->small_description = $request->input('small_description');
        $product->description = $request->input('description');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->tax = $request->input('tax');
        $product->qty = $request->input('qty');
        $product->status = $request->has('status') ? '1' : '0';
        $product->popular = $request->has('popular') ? '1' : '0';
        $product->meta_title = $request->input('meta_title');
        $product->meta_description = $request->input('meta_description');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->update();
        return redirect('/products')->with('message', 'Product updated successfully');
        Session::forget('message');
    }

    // deelete product
    public function destroyProduct($id)
    {
        $product = Product::find($id);
        if ($product->image) {
            $path = '/assets/uploads/product' . '/' . $product->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $product->delete();
        return back()->with('message', 'Product deleted successfully');
        Session::forget('message');
    }
}