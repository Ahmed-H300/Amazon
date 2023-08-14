<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\category;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'delete', 'edit']);
    }

    function index()
    {
        $products = Product::all();
        return view('all_products', ['products' => $products]);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('show_product', ['product' => $product]);
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);

        // Delete the associated image if it exists
        if ($product->image) {
            $imagePath = public_path('images') . '/' . $product->image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $product->delete();

        return redirect()->route("products.index");
    }


    public function create()
    {
        $categories = category::all();
        return view('create_product', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        request()->validate([
            "name" => 'required|min:5',
            "description" => "required",
            'price' => 'required'
        ]);
        $product = product::create($request->all());
        $this->save_image($request->image, $product);
        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = category::all();
        return view('edit_product', ['product' => $product, 'categories' => $categories]);
    }

    public function update(Request $request, product $product)
    {
        // Validate the incoming request data
        request()->validate([
            "name" => 'required|min:5',
            "description" => "required",
            'price' => 'required'
        ]);
        if ($request->hasFile('image')) {
            // Remove the old image if it exists
            if ($product->image) {
                $oldImagePath = public_path('images') . '/' . $product->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            // Handle image upload and storage
            $product->update($request->all());
            $this->save_image($request->image, $product);
        } else {
            $product->update($request->all());
        }

        return redirect()->route('products.index');
    }

    private  function  save_image($image, $post)
    {
        if ($image) {
            $image_name = time() . '.' . $image->extension();
            # move image from tmp folder to the public path
            $image->move(public_path('images/'), $image_name);
            $post->image = $image_name;
            $post->save();
        }
    }
}
