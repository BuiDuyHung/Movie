@extends('layout')

@section('content')
<div class="row container" id="wrapper">
    <div class="halim-panel-filter">
       <div class="panel-heading">
          <div class="row">
             <div class="col-xs-6">
                <div class="yoast_breadcrumb hidden-xs"><span><span><a href=""> Lọc phim </a> » <span class="breadcrumb_last" aria-current="page">2023</span></span></span></div>
             </div>
          </div>
       </div>
       <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
          <div class="ajax"></div>
       </div>
    </div>
    <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
       <section>
            <div class="section-bar clearfix">
                <h1 class="section-title"><span> Lọc phim </span></h1>
            </div>
            <div class="section-bar clearfix">
                <div class="row">
                    <form action="{{ route('home.filterMovie') }}" method="GET">
                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control style-filter" name="order" id="exampleFormControlSelect1">
                                    <option value="">-Sắp xếp-</option>
                                    <option value="date">Ngày đăng</option>
                                    <option value="year_release">Năm sản xuất</option>
                                    <option value="name_a_z">Tên phim</option>
                                    <option value="views">Lượt xem</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control style-filter" name="genre" id="exampleFormControlSelect1">
                                    <option value="">-Thể loại-</option>
                                    @foreach ($genres as $item)
                                        <option value="{{$item->id}}"> {{$item->title}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control style-filter" name="country" id="exampleFormControlSelect1">
                                    <option value="">-Quốc gia-</option>
                                    @foreach ($countries as $item)
                                        <option value="{{$item->id}}"> {{$item->title}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control style-filter" name="year" id="exampleFormControlSelect1">
                                    <option value="">-Năm-</option>
                                    @for ($year = 2000; $year <= 2023; $year++)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <input type="submit" class="btn btn-sm btn-default style-filter btn-filter" value="Lọc Phim">
                        </div>
                    </form>
                </div>
            </div>
            <div class="halim_box">
                @foreach ($movies as $item)
                    <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-27021">
                        <div class="halim-item">
                        <a class="halim-thumb" href="{{ route('home.movie', $item->slug) }}" title="{{$item->title}}">
                            <figure><img class="lazy img-responsive" src="{{$item->image}}" alt="{{$item->slug}}" title="{{$item->title}}"></figure>
                            <span class="status">
                                @if ($item->resolution == 1)
                                    HD
                                @elseif ($item->resolution == 2)
                                    SD
                                @elseif ($item->resolution == 3)
                                    HDCam
                                @elseif ($item->resolution == 4)
                                    Cam
                                @elseif ($item->resolution == 5)
                                    Trailer
                                @else
                                    FullHD
                                @endif
                            </span>
                            <span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                                @if ($item->sub == 1)
                                    Việt sub
                                    @if ($item->episode!=0)
                                    - {{$item->episodes_count}}/{{$item->episode}} Tập
                                    @endif
                                @else
                                    Thuyết minh
                                @endif
                            </span>
                            @if ($item->season!=0)
                                <span class="season"><i class="fa fa-play" aria-hidden="true"></i>
                                    Season {{$item->season}}
                                </span>
                            @endif
                            <div class="icon_overlay"></div>
                            <div class="halim-post-title-box">
                                <div class="halim-post-title ">
                                    <p class="entry-title">{{$item->title}}</p>
                                    <p class="original_title">{{$item->title_english}}</p>
                                </div>
                            </div>
                        </a>
                        </div>
                    </article>
                @endforeach

            </div>
            <div class="clearfix"></div>
            <div class="text-center">
                {{-- <ul class='page-numbers'>
                    <li><span aria-current="page" class="page-numbers current">1</span></li>
                    <li><a class="page-numbers" href="">2</a></li>
                    <li><a class="page-numbers" href="">3</a></li>
                    <li><span class="page-numbers dots">&hellip;</span></li>
                    <li><a class="page-numbers" href="">55</a></li>
                    <li><a class="next page-numbers" href=""><i class="hl-down-open rotate-right"></i></a></li>
                </ul> --}}
                {!! $movies->links("pagination::bootstrap-4") !!}
            </div>
       </section>
    </main>

    @include('pages.sidebar')
</div>

@endsection
