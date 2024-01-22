@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Slider</h1>
        </div>
        <div class='card card-primary'>
            <div class='card-header'>
                <h4>Why Choose Us Section</h4>
            </div>
            <div class='card-body'>
                <form action='{{ route('admin.slider.store') }}'
                      method='post'
                      enctype="multipart/form-data">
                    @csrf
                    <div class='form-group'>
                        <label>Icon</label>
                        <br>
                        <button class="btn btn-secondary"
                                role="iconpicker"
                                name='icon'
                                data-search="true"
                                data-search-text="Search..."></button>
                    </div>
                    <div class='form-group'>
                        <label>Title</label>
                        <input type='text'
                               class='form-control'
                               name='title'>
                    </div>
                    <div class='form-group'>
                        <label>Short Description</label>
                        <textarea cols='30'
                                  rows='10'
                                  class='form-control'
                                  name='short_description'></textarea>
                    </div>
                    <div class='form-group'>
                        <label>Status</label>
                        <select class='form-control'
                                name='status'>
                            <option value='1'>Yes</option>
                            <option value='0'>No</option>
                        </select>
                    </div>
                    <button type='submit'
                            class='btn btn-primary'>Create
                    </button>
                </form>
            </div>
        </div>

    </section>
@endsection


