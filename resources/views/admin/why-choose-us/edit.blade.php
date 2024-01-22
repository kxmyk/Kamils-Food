@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Why Choose Us Section</h1>
        </div>
        <div class='card card-primary'>
            <div class='card-header'>
                <h4>Update Item</h4>
            </div>
            <div class='card-body'>
                <form action='{{ route('admin.why-choose-us.update', $whyChooseUs->id) }}'
                      method='post'
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class='form-group'>
                        <label>Icon</label>
                        <br>
                        <button class="btn btn-secondary"
                                role="iconpicker"
                                name='icon'
                                data-search="true"
                                data-search-text="Search..."
                                data-icon='{{ $whyChooseUs->icon }}'></button>
                    </div>
                    <div class='form-group'>
                        <label>Title</label>
                        <input type='text'
                               class='form-control'
                               name='title'
                               value='{{ $whyChooseUs->title }}'>
                    </div>
                    <div class='form-group'>
                        <label>Short Description</label>
                        <textarea cols='30'
                                  rows='10'
                                  class='form-control'
                                  name='short_description'>{{ $whyChooseUs->short_description }}</textarea>
                    </div>
                    <div class='form-group'>
                        <label>Status</label>
                        <select class='form-control'
                                name='status'>
                            <option @selected($whyChooseUs->status === 1) value='1'>Yes</option>
                            <option @selected($whyChooseUs->status === 0) value='0'>No</option>
                        </select>
                    </div>
                    <button type='submit'
                            class='btn btn-primary'>Update
                    </button>
                </form>
            </div>
        </div>

    </section>
@endsection


