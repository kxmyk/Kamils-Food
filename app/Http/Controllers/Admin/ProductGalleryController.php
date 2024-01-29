<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Traits\FileUploadTrait;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductGalleryController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(string $productId): View
    {
        $productGallery = ProductGallery::where('product_id', $productId)->get();
        $product = Product::findOrFail($productId);

        return view('admin.product.gallery.index', compact('product', 'productGallery'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'image' => ['required', 'image', 'max:3000'],
            'product_id' => ['required', 'integer']
        ]);

        $imagePath = $this->uploadImage($request, 'image');

        $gallery = new ProductGallery();
        $gallery->product_id = $request->product_id;
        $gallery->image = $imagePath;
        $gallery->save();

        toastr()->success('Created Successfully!');

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        try {
            $productGallery = ProductGallery::findOrFail($id);
            $this->removeImage($productGallery->image);
            $productGallery->delete();

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
