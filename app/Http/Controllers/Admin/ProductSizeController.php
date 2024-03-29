<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductOption;
use App\Models\ProductSize;
use Exception;
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
        $sizes = ProductSize::where('product_id', $product->id)->get();
        $options = ProductOption::where('product_id', $product->id)->get();

        return view('admin.product.product-size.index', compact('product', 'sizes', 'options'));
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
        ], [
            'name.required' => 'Product size name is required',
            'name.max' => 'Product size name max length is 255',
            'price.required' => 'Product size price is required',
            'price.max' => 'Product size price max length is 255',
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
        try {
            $productSize = ProductSize::findOrFail($id);
            $productSize->delete();

            return response([
                'status' => 'success',
                'message' => 'Deleted Successfully'
            ]);
        } catch (Exception $e) {

            return response([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }
}
