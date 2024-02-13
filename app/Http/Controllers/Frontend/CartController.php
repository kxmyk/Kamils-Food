<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function addToCart(Request $request)
    {
        $product = Product::with(['sizes', 'options'])->findOrFail($request->product_id);
        $productSize = $product->sizes->where('id', $request->product_size)->first();
        $productOption = $product->options->whereIn('id', $request->product_option);

        $options = [
            'product_size' => [
                'id' => $productSize?->id,
                'size' => $productSize?->name,
                'price' => $productSize?->price
            ],
            'product_options' => [],
            'product_info' => [
                'image' => $product->thumb_image,
                'slug' => $product->slug
            ]
        ];

        foreach ($productOption as $option) {
            $options['product_options'][] = [
                'id' => $option->id,
                'name' => $option->name,
                'price' => $option->price
            ];
        }

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->quantity,
            'price' => $product->offer_price > 0 ? $product->offer_price : $product->price,
            'weight' => 0,
            'options' => $options
        ]);

        return response(['status' => 'success', 'message' => 'Product added into cart!'], 200);
    }
}
