@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Why Choose Us</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <div id="accordion">
                    <div class="accordion">
                        <div class="accordion-header collapsed bg-primary text-light p-3 "
                             role="button"
                             data-toggle="collapse"
                             data-target="#panel-body-1"
                             aria-expanded="false">
                            <h4>Why Choose Us Section Titles..</h4>
                        </div>
                        <div class="accordion-body collapse"
                             id="panel-body-1"
                             data-parent="#accordion"
                             style="">
                            <form action=''
                                  method='POST'>
                                @csrf
                                <div class="form-group">
                                    <label for="">Top Title</label>
                                    <input type="text"
                                           class="form-control"
                                           name='why_choose_top_title'
                                           value='{{ $titles['why_choose_top_title'] }}'>
                                </div>
                                <div class="form-group">
                                    <label for="">Main Title</label>
                                    <input type="text"
                                           class="form-control"
                                           name='why_choose_main_title'
                                           value='{{ $titles['why_choose_main_title'] }}'>
                                </div>
                                <div class="form-group">
                                    <label for="">Sub Title</label>
                                    <input type="text"
                                           class="form-control"
                                           value='{{ $titles['why_choose_sub_title'] }}'>
                                </div>
                                <button type="submit"
                                        class="btn btn-primary"
                                        name='why_choose_sub_title'>Save
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section class="section">
            <div class="section-header">
                <h1>Why Choose Us</h1>
            </div>
            <div class='card card-primary'>
                <div class='card-header'>
                    <h4>All items</h4>
                    <div class='card-header-action'>
                        <a href='{{ route('admin.slider.create') }}'
                           class='btn btn-primary'>
                            Create new
                        </a>
                    </div>
                </div>
                <div class='card-body'>
                    {{ $dataTable->table() }}
                </div>
            </div>

        </section>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
