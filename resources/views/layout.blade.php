<!DOCTYPE html>
<html>
    <head>
            <meta charset="utf-8" />
            <meta name="csrf-token" content="{{ csrf_token() }}" />
            <link rel="shortcut icon" href="{{ asset('img/logo-movie.webp') }}" type="image/x-icon" />
            <title>Phim hay - Xem phim hay nhất</title>

            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

            <link rel='stylesheet' id='bootstrap-css' href='{{ asset('css/bootstrap.min.css') }}' media='all' />
            <link rel='stylesheet' id='style-css' href='{{ asset('css/style.css') }}' media='all' />
            <link rel='stylesheet' id='wp-block-library-css' href='{{ asset('css/style.min.css') }}' media='all' />
            <script type='text/javascript' src='{{ asset('js/jquery.min.js') }}' id='halim-jquery-js'></script>
            <style type="text/css" id="wp-custom-css">
                .textwidget p a img {
                width: 100%;
                }

                ul#result {
                    position: absolute;
                    z-index: 999;
                    background: #23425c;
                    width: 94%;
                    padding: 10px;
                    margin: 1px;
                }

                .search-bar {
                    display: flex;
                    align-items: center;
                    background-color: #23425c;
                    border-radius: 20px;

                }

                .search-input {
                    border: none;
                    padding: 8px;
                    flex: 1;
                    border-radius: 15px;
                    outline: none;
                    background-color: #23425c;
                    color: #fff;
                }

                .search-button {
                    background-color: #23425c;
                    border: none;
                    cursor: pointer;
                    padding: 8px;
                    border-radius: 20px;
                }
                .search-input {
                    transition: background-color 0.3s ease;
                }

                .search-input:hover {
                    background-color: #316ca3;
                    color: #fff;
                }
            </style>

            <style>#header .site-title {background: url(https://logoart.vn/blog/wp-content/uploads/2013/03/thiet-ke-logo-an-tuong-logoart-11.png) no-repeat top left;background-size: contain;text-indent: -9999px; border-radius: 10px;}</style>
    </head>

    <body class="home blog halimthemes halimmovies" data-masonry="">
        <header id="header">
            <div class="container">
                <div class="row d-flex align-items-end" id="headwrap">
                    <div class="col-md-3 col-sm-6 ">
                        <p class="site-title">
                            <a class="logo" href="" title="Phim Mới">Phim Hay</a>
                        </p>
                    </div>
                    <div class="col-md-5 col-sm-6 halim-search-form hidden-xs" style="left: 412px;">
                        <div class="header-nav">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <div class="input-group col-xs-12">
                                        <form action="{{ route('home.search') }}" method="GET">
                                            <div class="search-bar">
                                                <input id="search" name="search" type="text" class="search-input" placeholder="Tìm kiếm">
                                                <button class="search-button">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <ul class="list-group" id="result" style="display: none"></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="navbar-container">
            <div class="container">
                <nav class="navbar halim-navbar main-navigation" role="navigation" data-dropdown-hover="1">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#halim" aria-expanded="false">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>

                </div>
                <div class="collapse navbar-collapse" id="halim">
                    <div class="menu-menu_1-container">
                        <ul id="menu-menu_1" class="nav navbar-nav navbar-left">
                            <li class="current-menu-item active"><a title="Trang Chủ" href="{{ route('home.index') }}">Trang Chủ</a></li>
                            <li class="mega dropdown">
                                <a title="Thể Loại" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Thể Loại<span class="caret"></span></a>
                                <ul role="menu" class=" dropdown-menu">
                                    @foreach ($genres as $item)
                                        <li><a title="{{ $item->title }}" href="{{ route('home.genre', $item->slug) }}"> {{ $item->title }} </a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="mega dropdown">
                                <a title="Quốc Gia" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Quốc Gia<span class="caret"></span></a>
                                <ul role="menu" class=" dropdown-menu">
                                        @foreach ($countries as $item)
                                            <li><a title="{{ $item->title }}" href="{{ route('home.country', $item->slug) }}"> {{ $item->title }} </a></li>
                                        @endforeach
                                </ul>
                            </li>
                            <li class="mega dropdown">
                                <a title="Năm phim" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Năm phim<span class="caret"></span></a>
                                <ul role="menu" class=" dropdown-menu">
                                    @for ($year = 2000; $year <= 2023; $year++)
                                        <li><a title="{{ $year }}" href="{{ route('home.year', $year) }}">{{ $year }}</a></li>
                                    @endfor
                                </ul>
                            </li>

                            @foreach ($categories as $item)
                                <li class="mega"><a title="{{ $item->title }}" href="{{ route('home.category', $item->slug) }}"> {{ $item->title }} </a></li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                </nav>
                <div class="collapse navbar-collapse" id="search-form">
                <div id="mobile-search-form" class="halim-search-form"></div>
                </div>
                <div class="collapse navbar-collapse" id="user-info">
                <div id="mobile-user-login"></div>
                </div>
            </div>
        </div>
        </div>

        <div class="container">
            <div class="row fullwith-slider"></div>
        </div>
        <div class="container">
            @yield('content')
        </div>
        <div class="clearfix"></div>

        <footer id="footer" class="clearfix">
            <div class="container footer-columns">
                <div class="row container">
                <div class="widget about col-xs-12 col-sm-4 col-md-4">
                        Copyright &copy; {{date('Y')}} by Bùi Hùng
                </div>
                </div>
            </div>
        </footer>
        <div id='easy-top'></div>

            <script type='text/javascript' src='{{ asset('js/bootstrap.min.js') }}' id='bootstrap-js'></script>
            <script type='text/javascript' src='{{ asset('js/owl.carousel.min.js') }}' id='carousel-js'></script>
            <script type='text/javascript' src='{{ asset('js/halimtheme-core.min.js') }}' id='halim-init-js'></script>

            <div id="fb-root"></div>
            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v17.0&appId=289086570392189&autoLogAppEvents=1" nonce="jjV9tn0g"></script>

            {{-- Search --}}
            <script>
                $(document).ready(function(){
                    $('#search').keyup(function(){
                        $('#result').html('');
                        var search = $('#search').val();
                        if(search!=''){
                            $('#result').css('display', 'inherit');
                            var expression = new RegExp(search, 'i')
                            $.getJSON('/json/movies.json', function(data){
                                $.each(data, function(key, value){
                                    if(value.title.search(expression) != -1 || value.description.search(expression) != -1){
                                        $('#result').append('<li class="list-group-item" style="cursor: pointer"><img src="'+value.image+'" width="50px">  '+value.title+'</li>')
                                    }
                                })
                            })
                        }else{
                            $('#result').css('display', 'none');
                        }

                    })

                    $('#result').on('click', 'li', function() {
                        var click_text = $(this).text();
                        $('#search').val($.trim(click_text));
                        $('#result').html('');
                        $('#result').css('display', 'none');
                    });
                })
            </script>


            {{-- sidebar --}}
            <script>
                $(document).ready(function(){
                    $.ajax({
                        url: "{{ route('admin.filter_default') }}",
                        method: "GET",
                        success: function(data){
                            $('#show_data_default').html(data);
                        }
                    });

                    $('.filter-sidebar').click(function(){
                        var href = $(this).attr('href');
                        var value;

                        if (href === '#pills-home') {
                            value = 1;
                        } else if (href === '#pills-profile') {
                            value = 2;
                        } else {
                            value = 3;
                        }

                        $.ajax({
                            url: "{{ route('admin.filter_topview') }}",
                            method: "POST",
                            data: {value: value},
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){
                                $('#halim-ajax-popular-post-default').css("display", "none");
                                $('#show_data').html(data);
                            }
                        });
                    });
                })
            </script>




        <style>#overlay_mb{position:fixed;display:none;width:100%;height:100%;top:0;left:0;right:0;bottom:0;background-color:rgba(0, 0, 0, 0.7);z-index:99999;cursor:pointer}#overlay_mb .overlay_mb_content{position:relative;height:100%}.overlay_mb_block{display:inline-block;position:relative}#overlay_mb .overlay_mb_content .overlay_mb_wrapper{width:600px;height:auto;position:relative;left:50%;top:50%;transform:translate(-50%, -50%);text-align:center}#overlay_mb .overlay_mb_content .cls_ov{color:#fff;text-align:center;cursor:pointer;position:absolute;top:5px;right:5px;z-index:999999;font-size:14px;padding:4px 10px;border:1px solid #aeaeae;background-color:rgba(0, 0, 0, 0.7)}#overlay_mb img{position:relative;z-index:999}@media only screen and (max-width: 768px){#overlay_mb .overlay_mb_content .overlay_mb_wrapper{width:400px;top:3%;transform:translate(-50%, 3%)}}@media only screen and (max-width: 400px){#overlay_mb .overlay_mb_content .overlay_mb_wrapper{width:310px;top:3%;transform:translate(-50%, 3%)}}</style>

        <style>
            #overlay_pc {
            position: fixed;
            display: none;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 99999;
            cursor: pointer;
            }
            #overlay_pc .overlay_pc_content {
            position: relative;
            height: 100%;
            }
            .overlay_pc_block {
            display: inline-block;
            position: relative;
            }
            #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
            width: 600px;
            height: auto;
            position: relative;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            }
            #overlay_pc .overlay_pc_content .cls_ov {
            color: #fff;
            text-align: center;
            cursor: pointer;
            position: absolute;
            top: 5px;
            right: 5px;
            z-index: 999999;
            font-size: 14px;
            padding: 4px 10px;
            border: 1px solid #aeaeae;
            background-color: rgba(0, 0, 0, 0.7);
            }
            #overlay_pc img {
            position: relative;
            z-index: 999;
            }
            @media only screen and (max-width: 768px) {
            #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
            width: 400px;
            top: 3%;
            transform: translate(-50%, 3%);
            }
            }
            @media only screen and (max-width: 400px) {
            #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
            width: 310px;
            top: 3%;
            transform: translate(-50%, 3%);
            }
            }
        </style>

            <style>
                .float-ck { position: fixed; bottom: 0px; z-index: 9}
                * html .float-ck /* IE6 position fixed Bottom */{position:absolute;bottom:auto;top:expression(eval (document.documentElement.scrollTop+document.docum entElement.clientHeight-this.offsetHeight-(parseInt(this.currentStyle.marginTop,10)||0)-(parseInt(this.currentStyle.marginBottom,10)||0))) ;}
                #hide_float_left a {background: #0098D2;padding: 5px 15px 5px 15px;color: #FFF;font-weight: 700;float: left;}
                #hide_float_left_m a {background: #0098D2;padding: 5px 15px 5px 15px;color: #FFF;font-weight: 700;}
                span.bannermobi2 img {height: 70px;width: 300px;}
                #hide_float_right a { background: #01AEF0; padding: 5px 5px 1px 5px; color: #FFF;float: left;}
            </style>

            <script>
                $(document).ready(function($) {
                var owl = $('#halim_related_movies-2');
                owl.owlCarousel({loop: true,margin: 4,autoplay: true,autoplayTimeout: 4000,autoplayHoverPause: true,nav: true,navText: ['<i class="hl-down-open rotate-left"></i>', '<i class="hl-down-open rotate-right"></i>'],responsiveClass: true,responsive: {0: {items:2},480: {items:3}, 600: {items:5},1000: {items: 5}}})});
            </script>
    </body>
</html>
