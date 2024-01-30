<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductOption;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductOptionController extends Controller
{

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
            'name.required' => 'Product option name is required',
            'name.max' => 'Product option name max length is 255',
            'price.required' => 'Product option price is required',
            'price.max' => 'Product option price max length is 255',
        ]);

        $productOption = new ProductOption();
        $productOption->name = $request->name;
        $productOption->price = $request->price;
        $productOption->product_id = $request->product_id;
        $productOption->save();

        toastr()->success('Created Successfully');

        return redirect(route('admin.product.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        try {
            $productOption = ProductOption::findOrFail($id);
            $productOption->delete();

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
