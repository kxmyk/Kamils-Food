<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductSize;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $productId): View
    {
        $product = Product::findOrFail($productId);

        return view('admin.product.product-size.index', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'price' => ['required', 'numeric'],
            'product_id' => ['required', 'integer']
        ]);

        $productSize = new ProductSize();
        $productSize->product_id = $request->product_id;
        $productSize->name = $request->name;
        $productSize->price = $request->price;
        $productSize->save();

        toastr()->success('Created Successfully');

        return redirect(route('admin.product.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
