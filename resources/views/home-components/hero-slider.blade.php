<section class="utf_featured_post_area pt-4 no-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 pad-r">
                <div id="utf_featured_slider" class="owl-carousel owl-theme utf_featured_slider">
                  @foreach ($heroSlider as $slider)
                  @if ($loop->index <= 3)
                    <div class="item" style="background-image:url({{ asset($slider->image) }})">
                        <div class="utf_featured_post">
                            <div class="utf_post_content"> <a class="utf_post_cat" href="{{ route('news-details', $slider->slug) }}">{{ $slider->category->name }}</a>
                                <h2 class="utf_post_title title-extra-large"> <a href="{{ route('news-details', $slider->slug) }}">{!! truncate($slider->title, 100) !!}</a> </h2>
                                <span class="utf_post_author"><i class="fa fa-user"></i> <a href="{{ route('news-details', $slider->slug) }}"> {{ __('frontend.by') }} {{ $slider->auther->name }}</a></span>
                                <span class="utf_post_date"><i class="fa fa-clock-o"></i> {{ date('M d, Y', strtotime($slider->created_at)) }}</span>
                            </div>
                        </div>
                    </div>
                  @endif
                  @endforeach
                </div>
            </div>

            <div class="col-lg-5 col-md-12 pad-l">
                <div class="row">
                    <div class="col-md-12">
                        @foreach ($heroSlider as $slider)
                          @if ($loop->index > 3 && $loop->index <= 4)
                            <div class="utf_post_overaly_style contentTop hot-post-top clearfix">
                              <div class="utf_post_thumb"> <a href="{{ route('news-details', $slider->slug) }}"><img class="img-fluid"
                                          src="{{ asset($slider->image) }}" alt="" /></a> </div>
                              <div class="utf_post_content"> <a class="utf_post_cat" href="{{ route('news-details', $slider->slug) }}">{{ $slider->category->name }}</a>
                                  <h2 class="utf_post_title title-large"> <a href="{{ route('news-details', $slider->slug) }}">{!! truncate($slider->title, 100) !!}</a> </h2>
                                  <span class="utf_post_author"><i class="fa fa-user"></i> <a href="{{ route('news-details', $slider->slug) }}">{{ $slider->auther->name }}</a></span>
                                  <span class="utf_post_date"><i class="fa fa-clock-o"></i> {{ date('M d, Y', strtotime($slider->created_at)) }}</span>
                              </div>
                            </div>
                          @endif
                        @endforeach
                    </div>
                    @foreach ($heroSlider as $slider)
                    @if ($loop->index > 4 && $loop->index <= 7)
                      <div class="col-md-6 pad-r-small">
                          <div class="utf_post_overaly_style contentTop utf_hot_post_bottom clearfix">
                              <div class="utf_post_thumb"> <a {{ route('news-details', $slider->slug) }}><img class="img-fluid"
                                          src="{{ asset($slider->image) }}" alt="" /></a> </div>
                              <div class="utf_post_content"> <a class="utf_post_cat" {{ route('news-details', $slider->slug) }}>{{ $slider->category->name }}</a>
                                  <h2 class="utf_post_title title-medium"> <a {{ route('news-details', $slider->slug) }}>{!! truncate($slider->title, 100) !!}</a> </h2>
                                  <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i> <a
                                              {{ route('news-details', $slider->slug) }}>{{ $slider->auther->name }}</a></span></div>
                              </div>
                          </div>
                      </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
