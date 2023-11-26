 @extends('layout')
 @section('content')
     <div class="row container" id="wrapper">
         <div class="halim-panel-filter">
             <div class="panel-heading">
                 <div class="row">
                     <div class="col-xs-6">
                         <div class="yoast_breadcrumb hidden-xs"><span><span><a href="">{{ $gen_slug->title }}</a> »
                                     <span class="breadcrumb_last" aria-current="page">2023</span></span></span></div>
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
                     <h1 class="section-title"><span>{{ $gen_slug->title }}</span></h1>
                 </div>
                 <div class="halim_box">
                     @foreach ($movie as $key => $mov)
                         <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-27021">
                             <div class="halim-item">
                                 <a class="halim-thumb" href="{{ route('movie', $mov->slug) }}">
                                     <figure><img class="lazy img-responsive"
                                             src="{{ asset('uploads/movie/' . $mov->image) }}" alt="VŨNG LẦY PHẦN 1"
                                             title="{{ $mov->title }}"></figure>
                                     <span class="status">
                                      @if ($mov->resolution == 0)
                                        HD
                                    @elseif($mov->resolution == 1)
                                        SD
                                    @elseif($mov->resolution == 2)
                                        HDcam
                                    @elseif($mov->resolution == 3)
                                        Cam
                                    @elseif($mov->resolution == 4)
                                        Full HD
                                    @else
                                        Trailer
                                    @endif

                                    </span>
                                    <span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                                         @if ($mov->phude == 0)
                                             Vietsub-Tập.{{ $mov->sotap }}
                                             @if ($mov->season != 0)
                                                 -Season.{{ $mov->season }} 
                                             @endif
                                         @else
                                             Thuyết Minh  - Tập {{ $mov->sotap }}
                                             @if ($mov->season != 0)
                                                 -Season.{{ $mov->season }} 
                                             @endif
                                         @endif


                                     </span>
                                     <div class="icon_overlay"></div>
                                     <div class="halim-post-title-box">
                                         <div class="halim-post-title ">
                                             <p class="entry-title">{{ $mov->title }}</p>
                                             <p class="original_title">{{ $mov->name_eng }}</p>
                                         </div>
                                     </div>
                                 </a>
                             </div>
                         </article>
                     @endforeach
                     {{-- <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-27021">
                         <div class="halim-item">
                             <a class="halim-thumb" href="a.php" title="VŨNG LẦY PHẦN 1">
                                 <figure><img class="lazy img-responsive"
                                         src="https://static.vieon.vn/vieplay-image/poster_v4/2021/04/27/gw09z3vn_660x946-cuocchienthuongluu3-docquyen.jpg"
                                         alt="VŨNG LẦY PHẦN 1" title="VŨNG LẦY PHẦN 1"></figure>
                                 <span class="status">5/5</span><span class="episode"><i class="fa fa-play"
                                         aria-hidden="true"></i>Vietsub</span>
                                 <div class="icon_overlay"></div>
                                 <div class="halim-post-title-box">
                                     <div class="halim-post-title ">
                                         <p class="entry-title">VŨNG LẦY PHẦN 1</p>
                                         <p class="original_title">The Mire Season 1</p>
                                     </div>
                                 </div>
                             </a>
                         </div>
                     </article> --}}
                     {{-- <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-27021">
                         <div class="halim-item">
                             <a class="halim-thumb" href="chitiet.php" title="VŨNG LẦY PHẦN 1">
                                 <figure><img class="lazy img-responsive"
                                         src="https://static.vieon.vn/vieplay-image/poster_v4/2021/04/27/gw09z3vn_660x946-cuocchienthuongluu3-docquyen.jpg"
                                         alt="VŨNG LẦY PHẦN 1" title="VŨNG LẦY PHẦN 1"></figure>
                                 <span class="status">5/5</span><span class="episode"><i class="fa fa-play"
                                         aria-hidden="true"></i>Vietsub</span>
                                 <div class="icon_overlay"></div>
                                 <div class="halim-post-title-box">
                                     <div class="halim-post-title ">
                                         <p class="entry-title">VŨNG LẦY PHẦN 1</p>
                                         <p class="original_title">The Mire Season 1</p>
                                     </div>
                                 </div>
                             </a>
                         </div>
                     </article>
                     <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-27021">
                         <div class="halim-item">
                             <a class="halim-thumb" href="chitiet.php" title="VŨNG LẦY PHẦN 1">
                                 <figure><img class="lazy img-responsive"
                                         src="https://static.vieon.vn/vieplay-image/poster_v4/2021/04/27/gw09z3vn_660x946-cuocchienthuongluu3-docquyen.jpg"
                                         alt="VŨNG LẦY PHẦN 1" title="VŨNG LẦY PHẦN 1"></figure>
                                 <span class="status">5/5</span><span class="episode"><i class="fa fa-play"
                                         aria-hidden="true"></i>Vietsub</span>
                                 <div class="icon_overlay"></div>
                                 <div class="halim-post-title-box">
                                     <div class="halim-post-title ">
                                         <p class="entry-title">VŨNG LẦY PHẦN 1</p>
                                         <p class="original_title">The Mire Season 1</p>
                                     </div>
                                 </div>
                             </a>
                         </div>
                     </article>
                     <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-27021">
                         <div class="halim-item">
                             <a class="halim-thumb" href="chitiet.php" title="VŨNG LẦY PHẦN 1">
                                 <figure><img class="lazy img-responsive"
                                         src="https://static.vieon.vn/vieplay-image/poster_v4/2021/04/27/gw09z3vn_660x946-cuocchienthuongluu3-docquyen.jpg"
                                         alt="VŨNG LẦY PHẦN 1" title="VŨNG LẦY PHẦN 1"></figure>
                                 <span class="status">5/5</span><span class="episode"><i class="fa fa-play"
                                         aria-hidden="true"></i>Vietsub</span>
                                 <div class="icon_overlay"></div>
                                 <div class="halim-post-title-box">
                                     <div class="halim-post-title ">
                                         <p class="entry-title">VŨNG LẦY PHẦN 1</p>
                                         <p class="original_title">The Mire Season 1</p>
                                     </div>
                                 </div>
                             </a>
                         </div>
                     </article>
                     <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-27021">
                         <div class="halim-item">
                             <a class="halim-thumb" href="chitiet.php" title="VŨNG LẦY PHẦN 1">
                                 <figure><img class="lazy img-responsive"
                                         src="https://static.vieon.vn/vieplay-image/poster_v4/2021/04/27/gw09z3vn_660x946-cuocchienthuongluu3-docquyen.jpg"
                                         alt="VŨNG LẦY PHẦN 1" title="VŨNG LẦY PHẦN 1"></figure>
                                 <span class="status">5/5</span><span class="episode"><i class="fa fa-play"
                                         aria-hidden="true"></i>Vietsub</span>
                                 <div class="icon_overlay"></div>
                                 <div class="halim-post-title-box">
                                     <div class="halim-post-title ">
                                         <p class="entry-title">VŨNG LẦY PHẦN 1</p>
                                         <p class="original_title">The Mire Season 1</p>
                                     </div>
                                 </div>
                             </a>
                         </div>
                     </article>
                     <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-27021">
                         <div class="halim-item">
                             <a class="halim-thumb" href="chitiet.php" title="VŨNG LẦY PHẦN 1">
                                 <figure><img class="lazy img-responsive"
                                         src="https://static.vieon.vn/vieplay-image/poster_v4/2021/04/27/gw09z3vn_660x946-cuocchienthuongluu3-docquyen.jpg"
                                         alt="VŨNG LẦY PHẦN 1" title="VŨNG LẦY PHẦN 1"></figure>
                                 <span class="status">5/5</span><span class="episode"><i class="fa fa-play"
                                         aria-hidden="true"></i>Vietsub</span>
                                 <div class="icon_overlay"></div>
                                 <div class="halim-post-title-box">
                                     <div class="halim-post-title ">
                                         <p class="entry-title">VŨNG LẦY PHẦN 1</p>
                                         <p class="original_title">The Mire Season 1</p>
                                     </div>
                                 </div>
                             </a>
                         </div>
                     </article>
                     <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-27021">
                         <div class="halim-item">
                             <a class="halim-thumb" href="chitiet.php" title="VŨNG LẦY PHẦN 1">
                                 <figure><img class="lazy img-responsive"
                                         src="https://static.vieon.vn/vieplay-image/poster_v4/2021/04/27/gw09z3vn_660x946-cuocchienthuongluu3-docquyen.jpg"
                                         alt="VŨNG LẦY PHẦN 1" title="VŨNG LẦY PHẦN 1"></figure>
                                 <span class="status">5/5</span><span class="episode"><i class="fa fa-play"
                                         aria-hidden="true"></i>Vietsub</span>
                                 <div class="icon_overlay"></div>
                                 <div class="halim-post-title-box">
                                     <div class="halim-post-title ">
                                         <p class="entry-title">VŨNG LẦY PHẦN 1</p>
                                         <p class="original_title">The Mire Season 1</p>
                                     </div>
                                 </div>
                             </a>
                         </div>
                     </article>
                     <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-27021">
                         <div class="halim-item">
                             <a class="halim-thumb" href="chitiet.php" title="VŨNG LẦY PHẦN 1">
                                 <figure><img class="lazy img-responsive"
                                         src="https://static.vieon.vn/vieplay-image/poster_v4/2021/04/27/gw09z3vn_660x946-cuocchienthuongluu3-docquyen.jpg"
                                         alt="VŨNG LẦY PHẦN 1" title="VŨNG LẦY PHẦN 1"></figure>
                                 <span class="status">5/5</span><span class="episode"><i class="fa fa-play"
                                         aria-hidden="true"></i>Vietsub</span>
                                 <div class="icon_overlay"></div>
                                 <div class="halim-post-title-box">
                                     <div class="halim-post-title ">
                                         <p class="entry-title">VŨNG LẦY PHẦN 1</p>
                                         <p class="original_title">The Mire Season 1</p>
                                     </div>
                                 </div>
                             </a>
                         </div>
                     </article>
                     <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-27021">
                         <div class="halim-item">
                             <a class="halim-thumb" href="chitiet.php" title="VŨNG LẦY PHẦN 1">
                                 <figure><img class="lazy img-responsive"
                                         src="https://static.vieon.vn/vieplay-image/poster_v4/2021/04/27/gw09z3vn_660x946-cuocchienthuongluu3-docquyen.jpg"
                                         alt="VŨNG LẦY PHẦN 1" title="VŨNG LẦY PHẦN 1"></figure>
                                 <span class="status">5/5</span><span class="episode"><i class="fa fa-play"
                                         aria-hidden="true"></i>Vietsub</span>
                                 <div class="icon_overlay"></div>
                                 <div class="halim-post-title-box">
                                     <div class="halim-post-title ">
                                         <p class="entry-title">VŨNG LẦY PHẦN 1</p>
                                         <p class="original_title">The Mire Season 1</p>
                                     </div>
                                 </div>
                             </a>
                         </div>
                     </article>
                     <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-27021">
                         <div class="halim-item">
                             <a class="halim-thumb" href="chitiet.php" title="VŨNG LẦY PHẦN 1">
                                 <figure><img class="lazy img-responsive"
                                         src="https://static.vieon.vn/vieplay-image/poster_v4/2021/04/27/gw09z3vn_660x946-cuocchienthuongluu3-docquyen.jpg"
                                         alt="VŨNG LẦY PHẦN 1" title="VŨNG LẦY PHẦN 1"></figure>
                                 <span class="status">5/5</span><span class="episode"><i class="fa fa-play"
                                         aria-hidden="true"></i>Vietsub</span>
                                 <div class="icon_overlay"></div>
                                 <div class="halim-post-title-box">
                                     <div class="halim-post-title ">
                                         <p class="entry-title">VŨNG LẦY PHẦN 1</p>
                                         <p class="original_title">The Mire Season 1</p>
                                     </div>
                                 </div>
                             </a>
                         </div>
                     </article>
                     <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-27021">
                         <div class="halim-item">
                             <a class="halim-thumb" href="chitiet.php" title="VŨNG LẦY PHẦN 1">
                                 <figure><img class="lazy img-responsive"
                                         src="https://static.vieon.vn/vieplay-image/poster_v4/2021/04/27/gw09z3vn_660x946-cuocchienthuongluu3-docquyen.jpg"
                                         alt="VŨNG LẦY PHẦN 1" title="VŨNG LẦY PHẦN 1"></figure>
                                 <span class="status">5/5</span><span class="episode"><i class="fa fa-play"
                                         aria-hidden="true"></i>Vietsub</span>
                                 <div class="icon_overlay"></div>
                                 <div class="halim-post-title-box">
                                     <div class="halim-post-title ">
                                         <p class="entry-title">VŨNG LẦY PHẦN 1</p>
                                         <p class="original_title">The Mire Season 1</p>
                                     </div>
                                 </div>
                             </a>
                         </div>
                     </article> --}}

                 </div>
                 <div class="clearfix"></div>
                 <div class="text-center">
                     {{-- <ul class='page-numbers'>
                         <li><span aria-current="page" class="page-numbers current">1</span></li>
                         <li><a class="page-numbers" href="">2</a></li>
                         <li><a class="page-numbers" href="">3</a></li>
                         <li><span class="page-numbers dots">&hellip;</span></li>
                         <li><a class="page-numbers" href="">55</a></li>
                         <li><a class="next page-numbers" href=""><i class="hl-down-open rotate-right"></i></a>
                         </li>
                     </ul> --}}
                     {!! $movie->links('pagination::bootstrap-4') !!}
                 </div>
             </section>
         </main>
         @include('pages.include.sidebar')
     </div>
 @endsection
