<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>General Dashboard &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('admin/assets/modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/modules/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/toastr.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-iconpicker.css')}}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel='stylesheet' href={{asset('admin/assets/modules/select2/dist/css/select2.min.css')}}>
    <link rel='stylesheet' href={{ asset('admin/assets/modules/summernote/summernote-bs4.css')}}>


    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/components.css')}}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>
@vite(['resources/js/app.js'])

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            @include('admin.layouts.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{asset('admin/assets/modules/jquery.min.js')}}"></script>
    <script src="{{asset('admin/assets/modules/popper.js')}}"></script>
    <script src="{{asset('admin/assets/modules/tooltip.js')}}"></script>
    <script src="{{asset('admin/assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/stisla.js')}}"></script>
    <!-- toastr js -->
    <script src="{{ asset('admin/assets/js/toastr.min.js')}}"></script>
    <!-- bootstrap iconpicker-->
    <script src="{{ asset('admin/assets/js/bootstrap-iconpicker.bundle.min.js')}}"></script>
    <script src="{{ asset('admin/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- YazraBox -->
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <!-- Template JS File -->
    <script src="{{asset('admin/assets/js/scripts.js')}}"></script>
    <script src="{{asset('admin/assets/js/custom.js')}}"></script>
    <script src={{ asset('admin/assets/modules/select2/dist/js/select2.full.min.js')}}></script>
    <script src={{asset('admin/assets/modules/summernote/summernote-bs4.js')}}></script>


    <script>
        toastr.options.progressBar = true;

    @if ($errors->any())
    @foreach ($errors->all() as $error)
    toastr.error("{{ $error }}");
    @endforeach
    @endif
    </script>

    <script>
        // csrf ajax
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });

    $.uploadPreview({
        input_field: '#image-upload',   // Default: .image-upload
        preview_box: '#image-preview',  // Default: .image-preview
        label_field: '#image-label',    // Default: .image-label
        label_default: 'Choose File',   // Default: Choose File
        label_selected: 'Change File',  // Default: Change File
        no_label: false,                // Default: false
        success_callback: null          // Default: null
    });

    $(document).ready(function () {

        $('body').on('click', '.delete-item', function (e) {
            e.preventDefault();
            let url = $(this).attr('href');
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: 'DELETE',
                        url: url,
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function (response) {
                            if (response.status === 'success') {
                                Swal.fire({
                                    title: 'Deleted!',
                                    text: response.message,
                                    icon: 'success'
                                });
                                setTimeout(function () {
                                    window.location.reload();
                                }, 1000);
                            }
                        },
                        error: function (error) {
                            console.log(error);
                            Swal.fire({
                                title: 'Oops!',
                                text: 'There has been a problem deleting your file.',
                                icon: 'warning'
                            });
                        },
                    });
                }
            });
        });
    });

    </script>
    @stack('scripts')
</body>

</html>