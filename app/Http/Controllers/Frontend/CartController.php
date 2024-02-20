<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Exception;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        try {

            $product = Product::with(['sizes', 'options'])->findOrFail($request->product_id);
            $productSize = $product->sizes->where('id', $request->product_size)->first();
            $productOption = $product->options->whereIn('id', $request->product_option);

            $options = [
                'product_size' => [],
                'product_options' => [],
                'product_info' => [
                    'image' => $product->thumb_image,
                    'slug' => $product->slug,
                ],
            ];

            if ($productSize !== null) {
                $options['product_size'][] = [
                    'id' => $productSize?->id,
                    'name' => $productSize?->name,
                    'price' => $productSize?->price,
                ];
            }

            foreach ($productOption as $option) {
                $options['product_options'][] = [
                    'id' => $option->id,
                    'name' => $option->name,
                    'price' => $option->price,
                ];
            }

            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => $request->quantity,
                'price' => $product->offer_price > 0 ? $product->offer_price : $product->price,
                'weight' => 0,
                'options' => $options,
            ]);

            return response(['status' => 'success', 'message' => 'Product added into cart!'], 200);
        } catch (Exception $e) {

            return response(['status' => 'error', 'message' => 'Something went wrong!'], 500);
        }
    }

    public function getCartProduct()
    {
        return view('frontend.layouts.ajax-files.sidebar-cart-item')->render();
    }

    public function cartProductRemove($rowId): Response
    {
        try {

            Cart::remove($rowId);

            return response(['status' => 'success', 'message' => 'Product deleted successfully'], 200);
        } catch (Exception $e) {

            return response(['status' => 'error', 'message' => 'Something went wrong'], 500);
        }
    }
}
