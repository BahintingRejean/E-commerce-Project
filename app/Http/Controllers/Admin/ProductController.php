<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Retrieve all products
        $products = Product::all();

        // Return a view with the products
        return view('admin.products.index', compact('products')); // Adjusted view path
    }

    public function index2()
    {
        // Retrieve all products
        $products = Product::all();

        // Pass products to the view
        return view('home', compact('products'));
    }

    public function create()
    {
        // Return the form for adding a product
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);

        // Store the product in the database
        Product::create($request->only(['name', 'qty', 'price', 'description']));

        // Redirect back with success message
        return redirect()->route('admin.products.index')->with('success', 'Product added successfully!');
    }

    public function getProductbyId($id)
    {
        $product = Product::findOrFail($id); // Use findOrFail for better error handling
        return view('admin.products.edit', compact('product'));
    }

    public function updateProduct(Request $request, $id) // Adjust method to accept product ID
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);

        $product = Product::findOrFail($id); // Use findOrFail for better error handling
        $product->update($request->only(['name', 'qty', 'price', 'description']));

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id); // Use findOrFail for better error handling
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
    }
}
