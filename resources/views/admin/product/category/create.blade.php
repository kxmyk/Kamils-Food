@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Category</h1>
    </div>
    <div class='card card-primary'>
        <div class='card-header'>
            <h4>Create New Category</h4>
        </div>
        <div class='card-body'>
            <form action='{{ route('admin.category.store') }}' method='post' enctype="multipart/form-data">
                @csrf
                <div class='form-group'>
                    <label>Name</label>
                    <input type='text' class='form-control' name='name'>
                </div>
                <div class='form-group'>
                    <label>Show at Home</label>
                    <select class='form-control' name='show_at_home'>
                        <option value='1'>Yes</option>
                        <option value='0' selected>No</option>
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