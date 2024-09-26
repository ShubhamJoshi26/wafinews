<section class="utf_latest_new_area pb-bottom-20">
    <div class="container">
        <div class="utf_latest_news block color-red">
            <h3 class="utf_block_title"><span>Latest News</span></h3>
            <div id="utf_latest_news_slide" class="owl-carousel owl-theme utf_latest_news_slide">
                @foreach ($recentNews as $news)
                    @if ($loop->index <= 1)
                        <div class="item">
                            <div class="utf_post_block_style clearfix">
                                <div class="utf_post_thumb"> <a href="{{ route('news-details', $news->slug) }}"><img
                                            class="img-fluid" src="{{ asset($news->image) }}" alt="" /></a>
                                </div>
                                <a class="utf_post_cat"
                                    href="{{ route('news-details', $news->slug) }}">{{ $news->category->name }}</a>
                                <div class="utf_post_content">
                                    <h2 class="utf_post_title title-medium"> <a
                                            href="{{ route('news-details', $news->slug) }}"> {!! truncate($news->title) !!}</a>
                                    </h2>
                                    <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i>
                                            <a
                                                href="{{ route('news-details', $news->slug) }}">{{ $news->auther->name }}</a></span>
                                        <span class="utf_post_date"><i
                                                class="fa fa-clock-o"></i>{{ date('M d, Y', strtotime($news->create_at)) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="utf_block_wrapper p-bottom-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="utf_featured_tab color-blue">
                    <h3 class="utf_block_title"><span>{{ $categorySectionOne->first()->category->name }}</span></h3>
                    {{-- <ul class="nav nav-tabs">
              <li class="nav-item"> <a class="nav-link animated fadeIn active" href="#tab_a" data-toggle="tab"> <span class="tab-head"> <span class="tab-text-title">Lifestyle</span> </span> </a> </li>
              <li class="nav-item"> <a class="nav-link animated fadeIn" href="#tab_b" data-toggle="tab"> <span class="tab-head"> <span class="tab-text-title">Traveling</span> </span> </a> </li>
            </ul> --}}
                    {{-- <div class="tab-content">
              <div class="tab-pane active animated fadeInRight" id="tab_a"> --}}
                    <div class="row">
                        @foreach ($categorySectionOne as $key => $newsOne)
                            @if ($key == 0)
                                <div class="col-lg-6 col-md-6">
                                    <div class="utf_post_block_style clearfix">
                                        <div class="utf_post_thumb"> <a
                                                href="{{ route('news-details', $newsOne->slug) }}"> <img
                                                    class="img-fluid" src="{{ asset($newsOne->image) }}"
                                                    alt="" /> </a> </div>
                                        <a class="utf_post_cat"
                                            href="{{ route('news-details', $newsOne->slug) }}">{{ $newsOne->category->name }}</a>
                                        <div class="utf_post_content">
                                            <h2 class="utf_post_title"> <a
                                                    href="{{ route('news-details', $newsOne->slug) }}">{!! truncate($newsOne->title) !!}</a>
                                            </h2>
                                            <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                        class="fa fa-user"></i> <a
                                                        href="{{ route('news-details', $newsOne->slug) }}">{{ $newsOne->auther->name }}</a></span>
                                                <span class="utf_post_date"><i
                                                        class="fa fa-clock-o"></i>{{ date('M d, Y', strtotime($newsOne->create_at)) }}</span>
                                            </div>
                                            <p>{!! truncate($newsOne->content, 100) !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <div class="col-lg-6 col-md-6">
                            <div class="utf_list_post_block">
                                <ul class="utf_list_post">
                                    @foreach ($categorySectionOne as $key => $newsOne)
                                        @if ($key > 0 && $key <= 4)
                                            <li class="clearfix">
                                                <div class="utf_post_block_style post-float clearfix">
                                                    <div class="utf_post_thumb"> <a
                                                            href="{{ route('news-details', $newsOne->slug) }}"> <img
                                                                class="img-fluid" src="{{ asset($newsOne->image) }}"
                                                                alt="" /> </a> </div>
                                                    <div class="utf_post_content">
                                                        <h2 class="utf_post_title title-small"> <a
                                                                href="{{ route('news-details', $newsOne->slug) }}">{!! truncate($newsOne->title) !!}</a>
                                                        </h2>
                                                        <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                                    class="fa fa-user"></i> <a
                                                                    href="{{ route('news-details', $newsOne->slug) }}">{{ $newsOne->auther->name }}</a></span>
                                                            <span class="utf_post_date"><i
                                                                    class="fa fa-clock-o"></i>{{ date('M d, Y', strtotime($newsOne->create_at)) }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="tab-pane animated fadeInLeft" id="tab_b">
                <div class="row">
                  <div class="col-lg-6 col-md-6">
                    <div class="utf_post_block_style clearfix">
                      <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid" src="images/news/tech/robot1.jpg" alt="" /> </a> </div>
                      <a class="utf_post_cat" href="#">Traveling</a>
                      <div class="utf_post_content">
                        <h2 class="utf_post_title"> <a href="#">Ratcliffe to be Director nation intelligence Trump ignored...</a> </h2>
                        <div class="utf_post_meta"> <span class="utf_post_author"><a href="#">John Wick</a></span> <span class="utf_post_date">25 Jan, 2022</span> </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text since has five...</p>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-lg-6 col-md-6">
                    <div class="utf_list_post_block">
                      <ul class="utf_list_post">
                        <li class="clearfix">
                          <div class="utf_post_block_style post-float clearfix">
                            <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid" src="images/news/tech/robot2.jpg" alt="" /> </a> </div>                            
                            <div class="utf_post_content">
                              <h2 class="utf_post_title title-small"> <a href="#">Zhang social media pop also known when smart innocent...</a> </h2>
                              <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i> <a href="#">John Wick</a></span> <span class="utf_post_date"><i class="fa fa-clock-o"></i> 25 Jan, 2022</span> </div>
                            </div>
                          </div>
                        </li>
                        
                        <li class="clearfix">
                          <div class="utf_post_block_style post-float clearfix">
                            <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid" src="images/news/tech/robot3.jpg" alt="" /> </a> </div>                            
                            <div class="utf_post_content">
                              <h2 class="utf_post_title title-small"> <a href="#">Zhang social media pop also known when smart innocent...</a> </h2>
                              <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i> <a href="#">John Wick</a></span> <span class="utf_post_date"><i class="fa fa-clock-o"></i> 25 Jan, 2022</span> </div>
                            </div>
                          </div>
                        </li>
                        
                        <li class="clearfix">
                          <div class="utf_post_block_style post-float clearfix">
                            <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid" src="images/news/tech/robot4.jpg" alt="" /> </a> </div>                            
                            <div class="utf_post_content">
                              <h2 class="utf_post_title title-small"> <a href="#">Zhang social media pop also known when smart innocent...</a> </h2>
                              <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i> <a href="#">John Wick</a></span> <span class="utf_post_date"><i class="fa fa-clock-o"></i> 25 Jan, 2022</span> </div>
                            </div>
                          </div>
                        </li>
                        
                        <li class="clearfix">
                          <div class="utf_post_block_style post-float clearfix">
                            <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid" src="images/news/tech/robot5.jpg" alt="" /> </a> </div>                            
                            <div class="utf_post_content">
                              <h2 class="utf_post_title title-small"> <a href="#">Zhang social media pop also known when smart innocent...</a> </h2>
                              <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i> <a href="#">John Wick</a></span> <span class="utf_post_date"><i class="fa fa-clock-o"></i> 25 Jan, 2022</span> </div>
                            </div>
                          </div>
                        </li>
                      </ul>                      
                    </div>
                  </div>
                </div>
              </div> --}}
                {{-- </div>
          </div> --}}
                <div class="block color-orange">
                    <h3 class="utf_block_title"><span>Lifestyle News</span></h3>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            @foreach ($categorySectionTwo as $key => $newsTwo)
                                @if ($key == 0)
                                    <div class="utf_post_overaly_style clearfix">
                                        <div class="utf_post_thumb"> <a href="{{ route('news-details', $newsTwo->slug) }}"> <img class="img-fluid"
                                                    src="{{ asset($newsTwo->image) }}" alt="" /> </a>
                                        </div>
                                        <div class="utf_post_content"> <a class="utf_post_cat" href="{{ route('news-details', $newsTwo->slug) }}">{{ $newsTwo->category->name }}</a>
                                            <h2 class="utf_post_title"> <a href="{{ route('news-details', $newsTwo->slug) }}">{!! truncate($newsTwo->title) !!}</a> </h2>
                                            <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                        class="fa fa-user"></i> <a href="{{ route('news-details', $newsTwo->slug) }}">{{$newsTwo->auther->name}}</a></span>
                                                <span class="utf_post_date"><i class="fa fa-clock-o"></i> {{ date('M d, Y', strtotime($newsTwo->create_at)) }}</span> </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach


                            <div class="utf_list_post_block">
                                <ul class="utf_list_post">
                                    @foreach ($categorySectionTwo as $key => $newsTwo)
                                    @if ($key>0 && $key<=4)
                                    <li class="clearfix">
                                        <div class="utf_post_block_style post-float clearfix">
                                            <div class="utf_post_thumb"> <a href="{{ route('news-details', $newsTwo->slug) }}"> <img class="img-fluid"
                                                        src="{{ asset($newsTwo->image) }}" alt="" /> </a> <a
                                                    class="utf_post_cat" href="{{ route('news-details', $newsTwo->slug) }}">{{ $newsTwo->category->name }}</a> </div>
                                            <div class="utf_post_content">
                                                <h2 class="utf_post_title title-small"> <a href="{{ route('news-details', $newsTwo->slug) }}">{!! truncate($newsTwo->title) !!} </a> </h2>
                                                <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                            class="fa fa-user"></i> <a href="{{ route('news-details', $newsTwo->slug) }}">{{$newsTwo->auther->name}}</a></span> <span class="utf_post_date"><i
                                                            class="fa fa-clock-o"></i> {{ date('M d, Y', strtotime($newsTwo->create_at)) }}</span> </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            @foreach ($categorySectionThree as $key => $newsThree)
                                @if ($key == 0)
                                    <div class="utf_post_overaly_style clearfix">
                                        <div class="utf_post_thumb"> <a href="{{ route('news-details', $newsThree->slug) }}"> <img class="img-fluid"
                                                    src="{{ asset($newsThree->image) }}" alt="" /> </a>
                                        </div>
                                        <div class="utf_post_content"> <a class="utf_post_cat" href="{{ route('news-details', $newsThree->slug) }}">{{ $newsThree->category->name }}</a>
                                            <h2 class="utf_post_title"> <a href="{{ route('news-details', $newsThree->slug) }}">{!! truncate($newsThree->title) !!}</a> </h2>
                                            <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                        class="fa fa-user"></i> <a href="{{ route('news-details', $newsThree->slug) }}">{{$newsThree->auther->name}}</a></span>
                                                <span class="utf_post_date"><i class="fa fa-clock-o"></i> {{ date('M d, Y', strtotime($newsThree->create_at)) }}</span> </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                            <div class="utf_list_post_block">
                                <ul class="utf_list_post">
                                    @foreach ($categorySectionThree as $key => $newsThree)
                                    @if ($key>0 && $key<=4)
                                    <li class="clearfix">
                                        <div class="utf_post_block_style post-float clearfix">
                                            <div class="utf_post_thumb"> <a href="{{ route('news-details', $newsThree->slug) }}"> <img class="img-fluid"
                                                        src="{{ asset($newsThree->image) }}" alt="" /> </a> <a
                                                    class="utf_post_cat" href="{{ route('news-details', $newsThree->slug) }}">{{ $newsThree->category->name }}</a> </div>
                                            <div class="utf_post_content">
                                                <h2 class="utf_post_title title-small"> <a href="{{ route('news-details', $newsThree->slug) }}">{!! truncate($newsThree->title) !!} </a> </h2>
                                                <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                            class="fa fa-user"></i> <a href="{{ route('news-details', $newsThree->slug) }}">{{$newsThree->auther->name}}</a></span> <span class="utf_post_date"><i
                                                            class="fa fa-clock-o"></i> {{ date('M d, Y', strtotime($newsThree->create_at)) }}</span> </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="sidebar utf_sidebar_right">
                    <div class="widget">
                        <h3 class="utf_block_title"><span>Follow Us</span></h3>
                        <ul class="social-icon">
                            @foreach ($socialLinks as $link)
                                <a title="Facebook" href="{{ $link->url }}">
                                    <span class="social-icon">
                                        <i class="{{ $link->icon }}"></i>
                                    </span>
                                </a>
                            @endforeach
                        </ul>
                    </div>

                    <div class="widget color-default">
                        <h3 class="utf_block_title"><span>Popular News</span></h3>
                        @foreach ($popularNews as $key => $popNews)
                            @if ($key == 0)
                                <div class="utf_post_overaly_style clearfix">
                                    <div class="utf_post_thumb"> <a
                                            href="{{ route('news-details', $popNews->slug) }}"> <img
                                                class="img-fluid" src="{{ asset($popNews->image) }}"
                                                alt="" /> </a> </div>
                                    <div class="utf_post_content"> <a class="utf_post_cat"
                                            href="{{ route('news-details', $popNews->slug) }}">{{ $popNews->category->name }}</a>
                                        <h2 class="utf_post_title"> <a
                                                href="{{ route('news-details', $popNews->slug) }}">{!! truncate($popNews->title) !!}</a>
                                        </h2>
                                        <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                    class="fa fa-user"></i> <a
                                                    href="#">{{ $popNews->auther->name }}</a></span> <span
                                                class="utf_post_date"><i
                                                    class="fa fa-clock-o"></i>{{ date('M d, Y', strtotime($popNews->create_at)) }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                        <div class="utf_list_post_block">
                            <ul class="utf_list_post">
                                @foreach ($popularNews as $key => $popNews)
                                    @if ($key > 0 && $key <= 4)
                                        <li class="clearfix">
                                            <div class="utf_post_block_style post-float clearfix">
                                                <div class="utf_post_thumb"> <a
                                                        href="{{ route('news-details', $popNews->slug) }}"> <img
                                                            class="img-fluid" src="{{ asset($popNews->image) }}"
                                                            alt="" /> </a> <a class="utf_post_cat"
                                                        href="{{ route('news-details', $popNews->slug) }}">{{ $popNews->category->name }}</a>
                                                </div>
                                                <div class="utf_post_content">
                                                    <h2 class="utf_post_title title-small"> <a
                                                            href="{{ route('news-details', $popNews->slug) }}">{!! truncate($popNews->title) !!}</a>
                                                    </h2>
                                                    <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                                class="fa fa-user"></i> <a
                                                                href="{{ route('news-details', $popNews->slug) }}">{{ $popNews->auther->name }}</a></span>
                                                        <span class="utf_post_date"><i
                                                                class="fa fa-clock-o"></i>{{ date('M d, Y', strtotime($popNews->create_at)) }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    {{-- <div class="widget color-default m-bottom-0">
              <h3 class="utf_block_title"><span>Trending News</span></h3>
              <div id="utf_post_slide" class="owl-carousel owl-theme utf_post_slide">
                <div class="item">
                  <div class="utf_post_overaly_style text-center clearfix">
                    <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid" src="images/news/tech/gadget1.jpg" alt="" /> </a> </div>
                    <div class="utf_post_content"> <a class="utf_post_cat" href="#">Lifestyle</a>
                      <h2 class="utf_post_title"> <a href="#">The best MacBook Pro alternatives in 2022 for Appl…</a> </h2>
                      <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i> <a href="#">John Wick</a></span> <span class="utf_post_date"><i class="fa fa-clock-o"></i> 25 Jan, 2022</span> </div>
                    </div>
                  </div>
                </div>
                
                <div class="item">
                  <div class="utf_post_overaly_style text-center clearfix">
                    <div class="utf_post_thumb"> <a href="#"> <img class="img-fluid" src="images/news/lifestyle/health5.jpg" alt="" /> </a> </div>
                    <div class="utf_post_content"> <a class="utf_post_cat" href="#">Health</a>
                      <h2 class="utf_post_title"> <a href="#">Netcix cuts out the chill with an integrated perso…</a> </h2>
                      <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i> <a href="#">John Wick</a></span> <span class="utf_post_date"><i class="fa fa-clock-o"></i> 25 Jan, 2022</span> </div>
                    </div>
                  </div>                  
                </div>
              </div>
            </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
