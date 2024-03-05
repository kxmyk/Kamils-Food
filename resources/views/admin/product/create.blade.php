@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Product</h1>
    </div>
    <div class='card card-primary'>
        <div class='card-header'>
            <h4>Create New Product</h4>
        </div>
        <div class='card-body'>
            <form action='{{ route('admin.product.store') }}' method='post' enctype="multipart/form-data">
                @csrf
                <div class='form-group'>
                    <label>Image</label>
                    <div id="image-preview" class="image-preview">
                        <label for="image-upload" id="image-label">Choose File</label>
                        <input type="file" name="thumb_image" id="image-upload" />
                    </div>
                </div>
                <div class='form-group'>
                    <label>Name</label>
                    <input type='text' class='form-control' name='name' value='{{ old('name') }}'>
                </div>
                <div class='form-group'>
                    <label>Category</label>
                    <select class='form-control select2' name='category_id'>
                        @foreach($categories as $category)
                        <option value='{{ $category->id }}'>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class='form-group'>
                    <label>Price</label>
                    <input type='number' class='form-control' name='price' value='{{ old('price') }}'>
                </div>
                <div class='form-group'>
                    <label>Offer Price</label>
                    <input type='number' class='form-control' name='quantity' value='{{ old('offer_price') }}'>
                </div>
                <div class="form-group">
                    <label>Quantity</label>
                    <input type="text" name="quantity" class="form-control" value="{{ $product->quantity }}">
                </div>
                <div class='form-group'>
                    <label>Short Description</label>
                    <textarea type='number' class='form-control'
                        name='short_description'>{{ old('short_description') }}</textarea>
                </div>
                <div class='form-group'>
                    <label>Long Description</label>
                    <textarea type='number' class='form-control summernote'
                        name='long_description'>{{ old('long_description') }}</textarea>
                </div>
                <div class='form-group'>
                    <label>Sku</label>
                    <input type='text' class='form-control' name='sku' value='{{ old('sku') }}'>
                </div>
                <div class='form-group'>
                    <label>Seo Title</label>
                    <input type='text' class='form-control' name='seo_title' value='{{ old('seo_title') }}'>
                </div>
                <div class='form-group'>
                    <label>Seo Description</label>
                    <textarea type='number' class='form-control'
                        name='seo_description'>{{ old('seo_description') }}</textarea>
                </div>
                <div class='form-group'>
                    <label>Show at Home</label>
                    <select class='form-control' name='show_at_home'>
                        <option value='1'>Yes</option>
                        <option value='0' selected>No
                        </option>
                    </select>
                </div>
                <div class='form-group'>
                    <label>Status</label>
                    <select class='form-control' name='status'>
                        <option value='1'>Active</option>
                        <option value='0'>Inactive</option>
                    </select>
                </div>
                <button type='submit' class='btn btn-primary'>Create
                </button>
            </form>
        </div>
    </div>
</section>
@endsection