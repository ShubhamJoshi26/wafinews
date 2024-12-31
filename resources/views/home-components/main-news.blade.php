<section class="utf_latest_new_area pb-bottom-20">
    <div class="container">
        <div class="utf_latest_news block color-red">
            <h3 class="utf_block_title"><span>Latest News</span></h3>
            <div id="utf_latest_news_slide" class="owl-carousel owl-theme utf_latest_news_slide">
                @if(count($recentNews)>0)
                @foreach ($recentNews as $news)
                    <div class="item">
                        <div class="utf_post_block_style clearfix">
                            <div class="utf_post_thumb"> <a href="{{ route('news-details',[strtolower($news->category->name),strtolower(str_replace(' ','-',$news->subCategory->name)),$news->slug]) }}"><img
                                        class="img-fluid" src="{{ asset($news->image) }}" alt="" /></a>
                            </div>
                            <a class="utf_post_cat"
                                href="{{ route('news-details',[strtolower($news->category->name),strtolower(str_replace(' ','-',$news->subCategory->name)),$news->slug]) }}">{{ $news->category->name }}</a>
                            <div class="utf_post_content">
                                <h2 class="utf_post_title title-medium"> <a
                                        href="{{ route('news-details',[strtolower($news->category->name),strtolower(str_replace(' ','-',$news->subCategory->name)),$news->slug]) }}"> {!! truncate($news->title) !!}</a>
                                </h2>
                                <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i>
                                        <a
                                            href="{{ route('news-details',[strtolower($news->category->name),strtolower(str_replace(' ','-',$news->subCategory->name)),$news->slug]) }}">{{ $news->auther->name }}</a></span>
                                    <span class="utf_post_date"><i
                                            class="fa fa-clock-o"></i>{{ date('M d, Y', strtotime($news->created_at)) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
                @endif
            </div>
        </div>
    </div>
</section>

<section class="utf_block_wrapper p-bottom-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                @if(count($categorySectionOne)>0)
                <div class="utf_featured_tab color-blue">
                    <h3 class="utf_block_title"><span>{{ $categorySectionOne->first()->category->name }}</span></h3>
                    
                    <div class="row">
                        @foreach ($categorySectionOne as $key => $newsOne)
                            @if ($key == 0)
                                <div class="col-lg-6 col-md-6">
                                    <div class="utf_post_block_style clearfix">
                                        <div class="utf_post_thumb"> <a
                                                href="{{ route('news-details',[strtolower($newsOne->category->name),strtolower(str_replace(' ','-',$newsOne->subCategory->name)),$newsOne->slug]) }}"> <img
                                                    class="img-fluid" src="{{ asset($newsOne->image) }}"
                                                    alt="" /> </a> </div>
                                        <a class="utf_post_cat"
                                            href="{{ route('news-details',[strtolower($newsOne->category->name),strtolower(str_replace(' ','-',$newsOne->subCategory->name)),$newsOne->slug]) }}">{{ $newsOne->category->name }}</a>
                                        <div class="utf_post_content">
                                            <h2 class="utf_post_title"> <a
                                                    href="{{ route('news-details',[strtolower($newsOne->category->name),strtolower(str_replace(' ','-',$newsOne->subCategory->name)),$newsOne->slug]) }}">{!! truncate($newsOne->title) !!}</a>
                                            </h2>
                                            <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                        class="fa fa-user"></i> <a
                                                        href="{{ route('news-details',[strtolower($newsOne->category->name),strtolower(str_replace(' ','-',$newsOne->subCategory->name)),$newsOne->slug]) }}">{{ $newsOne->auther->name }}</a></span>
                                                <span class="utf_post_date"><i
                                                        class="fa fa-clock-o"></i>{{ date('M d, Y', strtotime($newsOne->created_at)) }}</span>
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
                                                            href="{{ route('news-details',[strtolower($newsOne->category->name),strtolower(str_replace(' ','-',$newsOne->subCategory->name)),$newsOne->slug]) }}"> <img
                                                                class="img-fluid" src="{{ asset($newsOne->image) }}"
                                                                alt="" /> </a> </div>
                                                    <div class="utf_post_content">
                                                        <h2 class="utf_post_title title-small"> <a
                                                                href="{{ route('news-details',[strtolower($newsOne->category->name),strtolower(str_replace(' ','-',$newsOne->subCategory->name)),$newsOne->slug]) }}">{!! truncate($newsOne->title) !!}</a>
                                                        </h2>
                                                        <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                                    class="fa fa-user"></i> <a
                                                                    href="{{ route('news-details',[strtolower($newsOne->category->name),strtolower(str_replace(' ','-',$newsOne->subCategory->name)),$newsOne->slug]) }}">{{ $newsOne->auther->name }}</a></span>
                                                            <span class="utf_post_date"><i
                                                                    class="fa fa-clock-o"></i>{{ date('M d, Y', strtotime($newsOne->created_at)) }}</span>
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
                @endif
                
                <div class="block color-orange">
                    <h3 class="utf_block_title"><span>{{ $categorySectionTwo->first()->category->name??'' }}</span></h3>
                    <div class="row">
                        @if(count($categorySectionTwo)>0)
                        <div class="col-lg-6 col-md-6">
                            @foreach ($categorySectionTwo as $key => $newsTwo)
                                @if ($key == 0)
                                    <div class="utf_post_overaly_style clearfix">
                                        <div class="utf_post_thumb"> <a href="{{ route('news-details',[strtolower($newsTwo->category->name),strtolower(str_replace(' ','-',$newsTwo->subCategory->name)),$newsTwo->slug]) }}"> <img class="img-fluid"
                                                    src="{{ asset($newsTwo->image) }}" alt="" /> </a>
                                        </div>
                                        <div class="utf_post_content"> <a class="utf_post_cat" href="{{ route('news-details',[strtolower($newsTwo->category->name),strtolower(str_replace(' ','-',$newsTwo->subCategory->name)),$newsTwo->slug]) }}">{{ $newsTwo->category->name }}</a>
                                            <h2 class="utf_post_title"> <a href="{{ route('news-details',[strtolower($newsTwo->category->name),strtolower(str_replace(' ','-',$newsTwo->subCategory->name)),$newsTwo->slug]) }}">{!! truncate($newsTwo->title) !!}</a> </h2>
                                            <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                        class="fa fa-user"></i> <a href="{{ route('news-details',[strtolower($newsTwo->category->name),strtolower(str_replace(' ','-',$newsTwo->subCategory->name)),$newsTwo->slug]) }}">{{$newsTwo->auther->name}}</a></span>
                                                <span class="utf_post_date"><i class="fa fa-clock-o"></i> {{ date('M d, Y', strtotime($newsTwo->created_at)) }}</span> </div>
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
                                            <div class="utf_post_thumb"> <a href="{{ route('news-details',[strtolower($newsTwo->category->name),strtolower(str_replace(' ','-',$newsTwo->subCategory->name)),$newsTwo->slug]) }}"> <img class="img-fluid"
                                                        src="{{ asset($newsTwo->image) }}" alt="" /> </a> <a
                                                    class="utf_post_cat" href="{{ route('news-details',[strtolower($newsTwo->category->name),strtolower(str_replace(' ','-',$newsTwo->subCategory->name)),$newsTwo->slug]) }}">{{ $newsTwo->category->name }}</a> </div>
                                            <div class="utf_post_content">
                                                <h2 class="utf_post_title title-small"> <a href="{{ route('news-details',[strtolower($newsTwo->category->name),strtolower(str_replace(' ','-',$newsTwo->subCategory->name)),$newsTwo->slug]) }}">{!! truncate($newsTwo->title) !!} </a> </h2>
                                                <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                            class="fa fa-user"></i> <a href="{{ route('news-details',[strtolower($newsTwo->category->name),strtolower(str_replace(' ','-',$newsTwo->subCategory->name)),$newsTwo->slug]) }}">{{$newsTwo->auther->name}}</a></span> <span class="utf_post_date"><i
                                                            class="fa fa-clock-o"></i> {{ date('M d, Y', strtotime($newsTwo->created_at)) }}</span> </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                        @if(count($categorySectionThree)>0)
                    
                        <div class="col-lg-6 col-md-6">
                            @foreach ($categorySectionThree as $key => $newsThree)
                                @if ($key == 0)
                                    <div class="utf_post_overaly_style clearfix">
                                        <div class="utf_post_thumb"> <a href="{{ route('news-details',[strtolower($newsThree->category->name),strtolower(str_replace(' ','-',$newsThree->subCategory->name)),$newsThree->slug]) }}"> <img class="img-fluid"
                                                    src="{{ asset($newsThree->image) }}" alt="" /> </a>
                                        </div>
                                        <div class="utf_post_content"> <a class="utf_post_cat" href="{{ route('news-details',[strtolower($newsThree->category->name),strtolower(strtolower(str_replace(' ','-',$newsThree->subCategory->name))),$newsThree->slug]) }}">{{ $newsThree->category->name }}</a>
                                            <h2 class="utf_post_title"> <a href="{{ route('news-details',[strtolower($newsThree->category->name),strtolower(strtolower(str_replace(' ','-',$newsThree->subCategory->name))),$newsThree->slug]) }}">{!! truncate($newsThree->title) !!}</a> </h2>
                                            <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                        class="fa fa-user"></i> <a href="{{ route('news-details',[strtolower($newsThree->category->name),strtolower(strtolower(str_replace(' ','-',$newsThree->subCategory->name))),$newsThree->slug]) }}">{{$newsThree->auther->name}}</a></span>
                                                <span class="utf_post_date"><i class="fa fa-clock-o"></i> {{ date('M d, Y', strtotime($newsThree->created_at)) }}</span> </div>
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
                                            <div class="utf_post_thumb"> <a href="{{ route('news-details',[strtolower($newsThree->category->name),strtolower(str_replace(' ','-',$newsThree->subCategory->name)),$newsThree->slug]) }}"> <img class="img-fluid"
                                                        src="{{ asset($newsThree->image) }}" alt="" /> </a> <a
                                                    class="utf_post_cat" href="{{ route('news-details',[strtolower($newsThree->category->name),strtolower(str_replace(' ','-',$newsThree->subCategory->name)),$newsThree->slug]) }}">{{ $newsThree->category->name }}</a> </div>
                                            <div class="utf_post_content">
                                                <h2 class="utf_post_title title-small"> <a href="{{ route('news-details',[strtolower($newsThree->category->name),strtolower(str_replace(' ','-',$newsThree->subCategory->name)),$newsThree->slug]) }}">{!! truncate($newsThree->title) !!} </a> </h2>
                                                <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                            class="fa fa-user"></i> <a href="{{ route('news-details',[strtolower($newsThree->category->name),strtolower(str_replace(' ','-',$newsThree->subCategory->name)),$newsThree->slug]) }}">{{$newsThree->auther->name}}</a></span> <span class="utf_post_date"><i
                                                            class="fa fa-clock-o"></i> {{ date('M d, Y', strtotime($newsThree->created_at)) }}</span> </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="sidebar utf_sidebar_right">
                    <div class="widget">
                        <h3 class="utf_block_title"><span>Follow Us</span></h3>
                        <ul class="unstyled utf_footer_social" style="display: inline-flex;">
                            @foreach ($socialLinks as $link)
                            <li>
                                <a href="{{ $link->url }}">
                                    <i class="{{ $link->icon }}"></i>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @if(count($popularNews)>0)
                    <div class="widget color-default">
                        <h3 class="utf_block_title"><span>Popular News</span></h3>
                        @foreach ($popularNews as $key => $popNews)
                            @if ($key == 0)
                                <div class="utf_post_overaly_style clearfix">
                                    <div class="utf_post_thumb"> <a
                                            href="{{ route('news-details',[strtolower($popNews->category->name),strtolower(str_replace(' ','-',$popNews->subCategory->name)),$popNews->slug]) }}"> <img
                                                class="img-fluid" src="{{ asset($popNews->image) }}"
                                                alt="" /> </a> </div>
                                    <div class="utf_post_content"> <a class="utf_post_cat"
                                            href="{{ route('news-details',[strtolower($popNews->category->name),strtolower(str_replace(' ','-',$popNews->subCategory->name)),$popNews->slug]) }}">{{ $popNews->subCategory->name }}</a>
                                        <h2 class="utf_post_title"> <a
                                                href="{{ route('news-details',[strtolower($popNews->category->name),strtolower(str_replace(' ','-',$popNews->subCategory->name)),$popNews->slug]) }}">{!! truncate($popNews->title) !!}</a>
                                        </h2>
                                        <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                    class="fa fa-user"></i> <a
                                                    href="#">{{ $popNews->auther->name }}</a></span> <span
                                                class="utf_post_date"><i
                                                    class="fa fa-clock-o"></i>{{ date('M d, Y', strtotime($popNews->created_at)) }}</span>
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
                                                        href="{{ route('news-details',[strtolower($popNews->category->name),strtolower(str_replace(' ','-',$popNews->subCategory->name)),$popNews->slug]) }}"> <img
                                                            class="img-fluid" src="{{ asset($popNews->image) }}"
                                                            alt="" /> </a> <a class="utf_post_cat"
                                                        href="{{ route('news-details',[strtolower($popNews->category->name),strtolower(str_replace(' ','-',$popNews->subCategory->name)),$popNews->slug]) }}">{{ $popNews->category->name }}</a>
                                                </div>
                                                <div class="utf_post_content">
                                                    <h2 class="utf_post_title title-small"> <a
                                                            href="{{ route('news-details',[strtolower($popNews->category->name),strtolower(str_replace(' ','-',$popNews->subCategory->name)),$popNews->slug]) }}">{!! truncate($popNews->title) !!}</a>
                                                    </h2>
                                                    <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                                class="fa fa-user"></i> <a
                                                                href="{{ route('news-details',[strtolower($popNews->category->name),strtolower(str_replace(' ','-',$popNews->subCategory->name)),$popNews->slug]) }}">{{ $popNews->auther->name }}</a></span>
                                                        <span class="utf_post_date"><i
                                                                class="fa fa-clock-o"></i>{{ date('M d, Y', strtotime($popNews->created_at)) }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>


<section class="utf_block_wrapper p-bottom-0">
    <div class="container">
      <div class="row">
        @if(count($categorySectionFour)>0)
        <div class="col-lg-4">
            <div class="block color-dark-violet">
              <h3 class="utf_block_title"><span>{{ $categorySectionFour->first()->category->name }}</span></h3>
              @foreach ($categorySectionFour as $key => $newsFour)
                  @if ($key == 0)
                      <div class="utf_post_overaly_style clearfix">
                          <div class="utf_post_thumb"> <a href="{{ route('news-details',[strtolower($newsFour->category->name),strtolower($newsFour->subCategory->name),$newsFour->slug]) }}"> <img class="img-fluid" src="{{ asset($newsFour->image) }}" alt="" /> </a> </div>
                          <div class="utf_post_content">
                          <h2 class="utf_post_title"> <a href="{{ route('news-details',[strtolower($newsFour->category->name),strtolower($newsFour->subCategory->name),$newsFour->slug]) }}">{!! truncate($newsFour->title) !!}</a> </h2>
                          <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i> <a href="{{ route('news-details',[strtolower($newsFour->category->name),strtolower($newsFour->subCategory->name),$newsFour->slug]) }}">{{$newsFour->auther->name}}</a></span> <span class="utf_post_date"><i class="fa fa-clock-o"></i>{{ date('M d, Y', strtotime($newsFour->created_at)) }}</span> </div>
                          </div>
                      </div>
                  @endif
              @endforeach
              <div class="utf_list_post_block">
                <ul class="utf_list_post">
                  @foreach ($categorySectionFour as $key => $newsFour)
                      @if ($key > 0 && $key<=4)
                          <li class="clearfix">
                              <div class="utf_post_block_style post-float clearfix">
                              <div class="utf_post_thumb"> <a href="{{ route('news-details',[strtolower($newsFour->category->name),strtolower($newsFour->subCategory->name),$newsFour->slug]) }}"> <img class="img-fluid" src="{{ asset($newsFour->image) }}" alt="" /> </a> </div>                    
                              <div class="utf_post_content">
                                  <h2 class="utf_post_title title-small"> <a href="{{ route('news-details',[strtolower($newsFour->category->name),strtolower($newsFour->subCategory->name),$newsFour->slug]) }}">{!! truncate($newsFour->title) !!}</a> </h2>
                                  <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i> <a href="{{ route('news-details',[strtolower($newsFour->category->name),strtolower($newsFour->subCategory->name),$newsFour->slug]) }}">{{$newsFour->auther->name}}</a></span> <span class="utf_post_date"><i class="fa fa-clock-o"></i>{{ date('M d, Y', strtotime($newsFour->created_at)) }}</span> </div>
                              </div>
                              </div>
                          </li>
                      @endif
                  @endforeach
                </ul>
              </div>
            </div>
          </div>   
        @endif
        
        @if(count($categorySectionFive)>0)
        <div class="col-lg-4">
            <div class="block color-dark-blue">
              <h3 class="utf_block_title"><span>{{ $categorySectionFive->first()->category->name }}</span></h3>
              @foreach ($categorySectionFive as $key => $newsFive)
                  @if ($key == 0)
                    <div class="utf_post_overaly_style clearfix">
                        <div class="utf_post_thumb"> <a href="{{ route('news-details',[strtolower($newsFive->category->name),strtolower($newsFive->subCategory->name),$newsFive->slug]) }}"> <img class="img-fluid" src="{{ asset($newsFive->image) }}" alt="" /> </a> </div>
                        <div class="utf_post_content">
                        <h2 class="utf_post_title"> <a href="{{ route('news-details',[strtolower($newsFive->category->name),strtolower($newsFive->subCategory->name),$newsFive->slug]) }}">{!! truncate($newsFive->title) !!}</a> </h2>
                        <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i> <a href="{{ route('news-details',[strtolower($newsFive->category->name),strtolower($newsFive->subCategory->name),$newsFive->slug]) }}">{{$newsFive->auther->name}}</a></span> <span class="utf_post_date"><i class="fa fa-clock-o"></i>{{ date('M d, Y', strtotime($newsFive->created_at)) }}</span> </div>
                        </div>
                    </div>
                  @endif
              @endforeach
              <div class="utf_list_post_block">
                <ul class="utf_list_post">
                  @foreach ($categorySectionFive as $key => $newsFive)
                      @if ($key > 0 && $key<=4)
                          <li class="clearfix">
                              <div class="utf_post_block_style post-float clearfix">
                              <div class="utf_post_thumb"> <a href="{{ route('news-details',[strtolower($newsFive->category->name),strtolower($newsFive->subCategory->name),$newsFive->slug]) }}"> <img class="img-fluid" src="{{ asset($newsFive->image) }}" alt="" /> </a> </div>                    
                              <div class="utf_post_content">
                                  <h2 class="utf_post_title title-small"> <a href="{{ route('news-details',[strtolower($newsFive->category->name),strtolower($newsFive->subCategory->name),$newsFive->slug]) }}">{!! truncate($newsFive->title) !!}</a> </h2>
                                  <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i> <a href="{{ route('news-details',[strtolower($newsFive->category->name),strtolower($newsFive->subCategory->name),$newsFive->slug]) }}">{{$newsFive->auther->name}}</a></span> <span class="utf_post_date"><i class="fa fa-clock-o"></i>{{ date('M d, Y', strtotime($newsFive->created_at)) }}</span> </div>
                              </div>
                              </div>
                          </li>
                      @endif
                  @endforeach
                </ul>
              </div>
            </div>
          </div> 
        @endif
        
          @if(count($categorySectionSix)>0)
          <div class="col-lg-4">
            <div class="block color-dark-aqua">
              <h3 class="utf_block_title"><span>{{ $categorySectionSix->first()->category->name }}</span></h3>
              @foreach ($categorySectionSix as $key => $newsSix)
                  @if ($key == 0)
                    <div class="utf_post_overaly_style clearfix">
                        <div class="utf_post_thumb"> <a href="{{ route('news-details',[strtolower($newsSix->category->name),strtolower($newsSix->subCategory->name),$newsSix->slug]) }}"> <img class="img-fluid" src="{{ asset($newsSix->image) }}" alt="" /> </a> </div>
                        <div class="utf_post_content">
                        <h2 class="utf_post_title"> <a href="{{ route('news-details',[strtolower($newsSix->category->name),strtolower($newsSix->subCategory->name),$newsSix->slug]) }}">{!! truncate($newsSix->title) !!}</a> </h2>
                        <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i> <a href="{{ route('news-details',[strtolower($newsSix->category->name),strtolower($newsSix->subCategory->name),$newsSix->slug]) }}">{{$newsSix->auther->name}}</a></span> <span class="utf_post_date"><i class="fa fa-clock-o"></i>{{ date('M d, Y', strtotime($newsSix->created_at)) }}</span> </div>
                        </div>
                    </div>
                  @endif
              @endforeach
              
              <div class="utf_list_post_block">
                <ul class="utf_list_post">
                  @foreach ($categorySectionSix as $key => $newsSix)
                      @if ($key > 0 && $key<=4)
                          <li class="clearfix">
                              <div class="utf_post_block_style post-float clearfix">
                              <div class="utf_post_thumb"> <a href="{{ route('news-details',[strtolower($newsSix->category->name),strtolower($newsSix->subCategory->name),$newsSix->slug]) }}"> <img class="img-fluid" src="{{ asset($newsSix->image) }}" alt="" /> </a> </div>                    
                              <div class="utf_post_content">
                                  <h2 class="utf_post_title title-small"> <a href="{{ route('news-details',[strtolower($newsSix->category->name),strtolower($newsSix->subCategory->name),$newsSix->slug]) }}">{!! truncate($newsSix->title) !!}</a> </h2>
                                  <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i> <a href="{{ route('news-details',[strtolower($newsSix->category->name),strtolower($newsSix->subCategory->name),$newsSix->slug]) }}">{{$newsSix->auther->name}}</a></span> <span class="utf_post_date"><i class="fa fa-clock-o"></i>{{ date('M d, Y', strtotime($newsSix->created_at)) }}</span> </div>
                              </div>
                              </div>
                          </li>
                      @endif
                  @endforeach
                </ul>
              </div>
            </div>
          </div> 
          @endif       
      </div>
    </div>
  </section>