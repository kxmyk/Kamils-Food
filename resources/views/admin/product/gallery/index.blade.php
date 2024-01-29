@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $product->name }} Gallery </h1>
        </div>

        <div>
            <a href='{{ route('admin.product.index') }}'
               class='btn btn-primary my-4'>Go back</a>
        </div>
        <div class='card card-primary'>
            <div class='card-header'>
                <h4>All Images</h4>

            </div>
        </div>
        <div class='card-body'>
            <div class="col-md-8">
                <form action="{{ route('admin.product-gallery.store') }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="file"
                               class="form-control"
                               name="image">
                        <input type="hidden"
                               value="{{ $product->id }}"
                               name="product_id">
                    </div>
                    <div class="form-group">
                        <button type="submit"
                                class="btn btn-primary">Upload
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class='card card-primary'>
            <div class='card-body'>
                <table class='table table-bordered'>
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($productGallery as $image)
                        <tr>
                            <td><img src='{{ asset($image->image) }}'
                                     style='height:130px; margin:20px'/></td>
                            <td><a href='{{ route('admin.product-gallery.destroy', $image->id) }}'
                                   class='btn btn-danger delete-item
                                mx-2'><i class='fas fa-trash'></i></a></td>
                        </tr>
                    @endforeach()
                    @if( count($productGallery) === 0)
                        <tr>
                            <td>No data</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection


