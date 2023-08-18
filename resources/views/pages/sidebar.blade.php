<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
        <div class="section-bar clearfix">
            <div class="section-title">
                <span>Phim hot</span>

            </div>
        </div>
        <section class="tab-content">
            <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                <div class="halim-ajax-popular-post-loading hidden"></div>
                <div id="halim-ajax-popular-post" class="popular-post">
                    @foreach ($moviehot_sidebar as $item)
                        <div class="item post-37176">
                            <a href="{{ route('home.movie', $item->slug) }}" title=" {{$item->title}} ">
                            <div class="item-link">
                                <img src="{{ $item->image }}" class="lazy post-thumb" alt=" {{$item->slug}} " title=" {{$item->title}} " />
                                <span class="is_trailer">
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
                            </div>
                            <p class="title"> {{$item->title}} </p>
                            </a>
                            <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                            <div style="float: left;">
                            <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                            <span style="width: 0%"></span>
                            </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
    </div>

    {{-- Phim sắp chiếu --}}
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
        <div class="section-bar clearfix">
            <div class="section-title">
                <span>Phim sắp chiếu</span>

            </div>
        </div>
        <section class="tab-content">
            <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                <div class="halim-ajax-popular-post-loading hidden"></div>
                <div id="halim-ajax-popular-post" class="popular-post">
                    @foreach ($movie_trailer as $item)
                        <div class="item post-37176">
                            <a href="{{ route('home.movie', $item->slug) }}" title=" {{$item->title}} ">
                            <div class="item-link">
                                <img src="{{ $item->image }}" class="lazy post-thumb" alt=" {{$item->slug}} " title=" {{$item->title}} " />
                                <span class="is_trailer">
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
                            </div>
                            <p class="title"> {{$item->title}} </p>
                            </a>
                            <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                            <div style="float: left;">
                            <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                            <span style="width: 0%"></span>
                            </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
    </div>

    {{-- Top view --}}
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
        <div class="section-bar clearfix">
            <div class="section-title">
                <span>Top Views</span>
            </div>
        </div>


        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item active">
              <a class="nav-link filter-sidebar" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Ngày</a>
            </li>
            <li class="nav-item">
              <a class="nav-link filter-sidebar" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Tuần</a>
            </li>
            <li class="nav-item">
              <a class="nav-link filter-sidebar" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Tháng</a>
            </li>
          </ul>

        <div class="tab-content" id="pills-tabContent">
            <div id="halim-ajax-popular-post-default" class="popular-post">
                <span id="show_data_default"></span>
            </div>

            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-home-tab">
                <span id="show_data"></span>
            </div>

        </div>

        <div class="clearfix"></div>
    </div>
</aside>


