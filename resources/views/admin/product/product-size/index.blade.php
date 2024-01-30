@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $product->name }} Sizes </h1>
        </div>

        <div>
            <a href='{{ route('admin.product.index') }}'
               class='btn btn-primary my-4'>Go back</a>
        </div>
        <div class='row'>
            <div class='col-md-6'>
                <div class='card card-primary'>
                    <div class='card-header'>
                        <h4>Create Sizes</h4>

                    </div>
                    <div class='card-body'>
                        <form action="{{ route('admin.product-size.store') }}"
                              method="POST"
                              enctype="multipart/form-data">
                            @csrf

                            <div class='row'>
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label for=''>Name</label>
                                        <input type='text'
                                               name='name'
                                               class='form-control'
                                               value='{{old('name')}}'>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label for=''>Price</label>
                                        <input type='number'
                                               name='price'
                                               class='form-control'
                                               value='{{old('price')}}'>
                                    </div>
                                </div>
                                <input type="hidden"
                                       value="{{ $product->id }}"
                                       name="product_id">
                            </div>
                            <div class="form-group">
                                <button type="submit"
                                        class="btn btn-primary">Create
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class='
                                               card
                                               card-primary'>
                    <div class='card-body'>
                        <table class='table table-bordered'>
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sizes as $size)
                                <tr>
                                    <td>{{$size->name}}</td>
                                    <td>{{$size->price}}</td>
                                    <td>
                                        <a href='{{ route('admin.product-size.destroy', $size->id) }}'
                                           class='btn btn-danger delete-item
                                mx-2'><i class='fas fa-trash'></i></a></td>
                                </tr>
                            @endforeach()
                            @if( count($sizes) === 0)
                                <tr>
                                    <td>No data</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class='col-md-6'>
                <div class='card card-primary'>
                    <div class='card-header'>
                        <h4>Create Options </h4>

                    </div>
                    <div class='card-body'>
                        <form action="{{ route('admin.product-option.store') }}"
                              method="POST"
                              enctype="multipart/form-data">
                            @csrf

                            <div class='row'>
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label for=''>Name</label>
                                        <input type='text'
                                               name='name'
                                               class='form-control'
                                               value='{{old('name')}}'>

                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label for=''>Price</label>
                                        <input type='number'
                                               name='price'
                                               class='form-control'
                                               value='{{old('price')}}'>
                                    </div>
                                </div>
                                <input type="hidden"
                                       value="{{ $product->id }}"
                                       name="product_id">
                            </div>
                            <div class="form-group">
                                <button type="submit"
                                        class="btn btn-primary">Create
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
                                <th>Name</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($options as $option)
                                <tr>
                                    <td>{{$option->name}}</td>
                                    <td>{{$option->price}}</td>
                                    <td>
                                        <a href='{{ route('admin.product-option.destroy', $option->id) }}'
                                           class='btn btn-danger delete-item
                                mx-2'><i class='fas fa-trash'></i></a></td>
                                </tr>
                            @endforeach()
                            @if( count($options) === 0)
                                <tr>
                                    <td>No data</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection


