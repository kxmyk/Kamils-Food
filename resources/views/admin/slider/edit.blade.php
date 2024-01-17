@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Slider</h1>
        </div>
        <div class='card card-primary'>
            <div class='card-header'>
                <h4>Edit slider</h4>
            </div>
            <div class='card-body'>
                <form action='{{ route('admin.slider.update', $slider->id) }}'
                      method='post'
                      enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class='form-group'>
                        <label>Image</label>
                        <div id="image-preview"
                             class="image-preview">
                            <label for="image-upload"
                                   id="image-label">Choose File</label>
                            <input type="file"
                                   name="image"
                                   id="image-upload"
                                   value='{{ $slider->image }}'/>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label>Offer</label>
                        <input type='text'
                               class='form-control'
                               name='offer'
                               value='{{ $slider->offer }}'>
                    </div>
                    <div class='
                               form-group'>
                        <label>Title</label>
                        <input type='text'
                               class='form-control'
                               name='title'
                               value='{{ $slider->title }}'>
                    </div>
                    <div class='form-group'>
                        <label>Subtitle</label>
                        <input type='text'
                               class='form-control'
                               name='sub_title'
                               value='{{ $slider->sub_title }}'>
                    </div>
                    <div class='form-group'>
                        <label>Short Description</label>
                        <textarea cols='30'
                                  rows='10'
                                  class='form-control'
                                  name='short_description'>{{ $slider->short_description }}</textarea>
                    </div>
                    <div class='form-group'>
                        <label>Button Link</label>
                        <input type='text'
                               class='form-control'
                               name='button_link'
                               value='{{ $slider->button_link }}'>
                    </div>
                    <div class='form-group'>
                        <label>Status</label>
                        <select class='form-control'
                                name='status'>
                            <option @selected($slider->status === 1) value='1'>Active</option>
                            <option @selected($slider->status === 0) value='0'>Inactive</option>
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

@push('scripts')
    <script>
        $(document).ready(function () {
            $('.image-preview').css({
                'background-image': 'url({{ asset($slider->image) }})',
                'background-size': 'cover',
                'backgrund-position': 'center center',
            });
        });
    </script>
@endpush
