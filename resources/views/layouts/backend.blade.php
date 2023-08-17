<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin - Website Movie</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.22/dist/sweetalert2.min.css">
        <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">

        @include('layouts.navbar')

        <div id="layoutSidenav">
            @include('layouts.sidebar')

            <div id="layoutSidenav_content">
                <main>
                    @yield('content')
                </main>

                @include('layouts.footer')
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.22/dist/sweetalert2.all.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('demo/chart-bar-demo.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
        <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('ckeditor/config.js') }}"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>


        <script>
            $('.select-year').change(function(){
                var year = $(this).find(':selected').val()
                var id_movie = $(this).attr('id')
                $.ajax({
                    url: "{{ route('admin.update_year') }}",
                    method: 'GET',
                    data: {year: year, id_movie: id_movie},
                    success: function(){
                        alert('Thay đổi năm phim theo năm '+year+' thành công !')
                    }
                })
            })

            $('#lfm').filemanager('image');
            let table = new DataTable('#dataTable');

            $('.order_position').sortable({
                placeholder: 'ui-state-highlight',
                update: function(event, ui) {
                    var array_id = [];
                    $('.order_position tr').each(function() {
                        array_id.push($(this).attr('id'));
                    });

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ route('admin.resorting') }}",
                        method: "POST",
                        data: { array_id: array_id },
                        success: function(data) {
                            alert('Sắp xếp thứ tự thành công !');
                        }
                    });
                }
            });

        </script>

        <script>
            var options = {
            filebrowserImageBrowseUrl: 'filemanager?type=Images',
            filebrowserImageUploadUrl: 'filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: 'filemanager?type=Files',
            filebrowserUploadUrl: 'filemanager/upload?type=Files&_token='
            };
        </script>

        <script>
            CKEDITOR.replace('editor', options);
        </script>
    </body>
</html>
