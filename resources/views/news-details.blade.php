@extends('layouts.master')

<!-- Setting metas -->
@section('title', $news->title)
@section('meta_description', $news->meta_description)
@section('meta_og_title', $news->meta_title)
@section('meta_og_description', $news->meta_description)
@section('meta_og_image', asset($news->image))
@section('meta_tw_title', $news->meta_title)
@section('meta_tw_description', $news->meta_description)
@section('meta_tw_image', asset($news->image))
@section('content')
  <!-- Page Title Start -->
  <div class="page-title">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="breadcrumb">
            <li><a href="{{ url('/') }}" class="breadcrumbs__url"><i class="fa fa-home"></i> {{ __('Home') }}</a></li>
            <li><a href="javascript:;" class="breadcrumbs__url">{{ __('News') }}</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Page title end -->
  
  <!-- 1rd Block Wrapper Start -->
  <section class="utf_block_wrapper">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-12">
          <div class="single-post">
            <div class="utf_post_title-area"> <a class="utf_post_cat" href="#">{{ $news->category->name }}</a>
              <h2 class="utf_post_title"> {!! $news->title !!}</h2>
              <div class="utf_post_meta"> <span class="utf_post_author"> By <a href="#"> {{ $news->auther->name }}</a> </span> <span class="utf_post_date"><i class="fa fa-clock-o"></i>{{ date('M D, Y', strtotime($news->created_at)) }}</span> <span class="post-hits"><i class="fa fa-eye"></i>{{ convertToKFormat($news->views) }}</span> <span class="post-comment"><i class="fa fa-comments-o"></i> <a href="#" class="comments-link"><span></span></a></span> </div>
            </div>
            
            <div class="utf_post_content-area">
              <div class="post-media post-featured-image"> <a href="{{ asset($news->image) }}" class="gallery-popup"><img src="{{ asset($news->image) }}" class="img-fluid" alt=""></a> </div>
              <div class="entry-content">
                {!! $news->content !!}
              </div>
              
              <div class="tags-area clearfix">
                <div class="post-tags"> 
					<span>Tags:</span> 
                    @foreach ($news->tags as $tag)
                        <a href="#">
                            #{{ $tag->name }}
                        </a>
                    @endforeach					
				</div>
              </div>
              
              <div class="share-items clearfix">
                <ul class="post-social-icons unstyled">
                  <li class="facebook"> <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"> <i class="fa fa-facebook"></i> <span class="ts-social-title">Facebook</span></a> </li>
                  <li class="twitter"> <a href="https://twitter.com/intent/tweet?text={{ $news->title }}&url={{ url()->current() }}"> <i class="fa fa-twitter"></i> <span class="ts-social-title">Twitter</span></a> </li>
                  <li class="gplus"> <a href="https://wa.me/?text={{ $news->title }}%20{{ url()->current() }}"> <i class="fa fa-whatsapp"></i> <span class="ts-social-title">Whats App</span></a> </li>
                  <li class="pinterest"> <a href="https://t.me/share/url?url={{ url()->current() }}&text={{ $news->title }}"> <i class="fa fa-telegram"></i> <span class="ts-social-title">instagram</span></a> </li>
                </ul>
              </div>              
            </div>
          </div>
          
          <nav class="post-navigation clearfix">
            <div class="post-previous"> 
                @if ($previousPost)
                    <a href="{{ route('news-details',[strtolower($previousPost->category->name),strtolower($previousPost->subCategory->name), $previousPost->slug]) }}"> <span><i class="fa fa-angle-left"></i>Previous Post</span>
                        <h3>{!! truncate($previousPost->title) !!}</h3>
                    </a> 
                @endif
			</div>
            <div class="post-next"> 
                @if ($nextPost)
                    <a href="{{ route('news-details',[strtolower($nextPost->category->name),strtolower($nextPost->subCategory->name), $nextPost->slug]) }}"> <span>Next Post <i class="fa fa-angle-right"></i></span>
                        <h3> {!! truncate($nextPost->title) !!}</h3>
                    </a>
                @endif 
			</div>
          </nav>
          
          {{-- <div class="author-box">
            <div class="author-img pull-left"> <img src="images/news/author.png" alt=""> </div>
            <div class="author-info">
              <h3>Miss Lisa Doe</h3>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since It has survived not only five centuries, but also the leap into electronic type setting, remaining essentially unchanged.</p>              
            </div>
          </div> --}}
          @if (count($relatedPosts) > 0)
          <div class="related-posts block">
            <h3 class="utf_block_title"><span>Related Posts</span></h3>
            <div id="utf_latest_news_slide" class="owl-carousel owl-theme utf_latest_news_slide">
                @foreach ($relatedPosts as $post)
                    <div class="item">
                        <div class="utf_post_block_style clearfix">
                        <div class="utf_post_thumb"> <a href="{{ route('news-details',[strtolower($post->category->name),strtolower($post->subCategory->name),$post->slug]) }}"><img class="img-fluid" src="{{ asset($post->image) }}" alt="" /></a> </div>
                        <a class="utf_post_cat" href="{{ route('news-details',[strtolower($post->category->name),strtolower($post->subCategory->name),$post->slug]) }}"> {{ $post->auther->name }}</a>
                        <div class="utf_post_content">
                            <h2 class="utf_post_title title-medium"> <a href="{{ route('news-details',[strtolower($post->category->name),strtolower($post->subCategory->name),$post->slug]) }}">{!! truncate($post->title) !!}</a> </h2>
                            <div class="utf_post_meta"> <span class="utf_post_date"><i class="fa fa-clock-o"></i> {{ date('M d, Y', strtotime($post->created_at)) }}</span> </div>
                        </div>
                        </div>
                    </div>
                @endforeach
            </div>            
          </div>
          @endif
          <!-- Post comment start -->
          {{-- <div id="comments" class="comments-area block">
            <h3 class="utf_block_title"><span>03 Comments</span></h3>
            <ul class="comments-list">
              <li>
                <div class="comment"> <img class="comment-avatar pull-left" alt="" src="images/news/user1.png">
                  <div class="comment-body">
                    <div class="meta-data"> <span class="comment-author">Miss Lisa Doe</span> <span class="comment-date pull-right">15 Jan, 2022</span> </div>
                    <div class="comment-content">
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since It has survived not only five centuries, but also the leap into electronic type setting, remaining essentially unchanged.</p>
                    </div>
                    <div class="text-left"> <a class="comment-reply" href="#"><i class="fa fa-share"></i> Reply</a> </div>
                  </div>
                </div>
                
                <ul class="comments-reply">
                  <li>
                    <div class="comment"> <img class="comment-avatar pull-left" alt="" src="images/news/user2.png">
                      <div class="comment-body">
                        <div class="meta-data"> <span class="comment-author">Miss Lisa Doe</span> <span class="comment-date pull-right">15 Jan, 2022</span> </div>
						<div class="comment-content">
						  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since It has survived not only five centuries, but also the leap into electronic type setting, remaining essentially unchanged.</p>
						</div>
						<div class="text-left"> <a class="comment-reply" href="#"><i class="fa fa-share"></i> Reply</a> </div>
                      </div>
                    </div>
                  </li>
                </ul>
                <div class="comment last"> <img class="comment-avatar pull-left" alt="" src="images/news/user1.png">
                  <div class="comment-body">
                    <div class="meta-data"> <span class="comment-author">Miss Lisa Doe</span> <span class="comment-date pull-right">15 Jan, 2022</span> </div>
                    <div class="comment-content">
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since It has survived not only five centuries, but also the leap into electronic type setting, remaining essentially unchanged.</p>
                    </div>
                    <div class="text-left"> <a class="comment-reply" href="#"><i class="fa fa-share"></i> Reply</a> </div>
                  </div>
                </div>
              </li>
            </ul>
          </div> --}}
          <!-- Post comment end -->
          
		  <!-- Comments Form Start -->
          {{-- <div class="comments-form">
            <h3 class="title-normal">Leave a comment</h3>
            <form>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" name="name" id="name" placeholder="Name" type="text" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" name="email" id="email" placeholder="Email" type="email" required>
                  </div>
                </div>
				<div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" placeholder="Phone" type="text" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" placeholder="Subject" type="text" required>
                  </div>
                </div>
				<div class="col-md-12">
                  <div class="form-group">
                    <textarea class="form-control required-field" id="message" placeholder="Comment" rows="10" required></textarea>
                  </div>
                </div>
              </div>
              <div class="clearfix">
                <button class="comments-btn btn btn-primary" type="submit">Post Comment</button>
              </div>
            </form>
          </div> --}}
          <!-- Comments form end -->           
        </div>
        
        <div class="col-lg-4 col-md-12">
          <div class="sidebar utf_sidebar_right">
            <div class="widget">
              <h3 class="utf_block_title"><span>Follow Us</span></h3>
              <ul class="social-icon">
                  @foreach ($socialLinks as $link)
                    <li>
                        <a href="{{ $link->url }}">
                            <i class="{{ $link->icon }}"></i>
                        </a>
                    </li>
                  @endforeach
              </ul>
            </div>
            
            <div class="widget color-default">
              <h3 class="utf_block_title"><span>Recent News</span></h3>
              <div class="utf_list_post_block">
                <ul class="utf_list_post">
                    @foreach ($recentNews as $key => $news)
                        @if($key<=4)
                            <li class="clearfix">
                                <div class="utf_post_block_style post-float clearfix">
                                <div class="utf_post_thumb"> <a href="{{ route('news-details',[strtolower($news->category->name),strtolower($news->subCategory->name),$news->slug]) }}"> <img src="{{ asset($news->image) }}" alt="" /> </a> <a class="utf_post_cat" href="{{ route('news-details',[strtolower($news->category->name),strtolower($news->subCategory->name),$news->slug]) }}"> {{ $news->category->name }}</a> </div>                      
                                <div class="utf_post_content">
                                    <h2 class="utf_post_title title-small"> <a href="{{ route('news-details',[strtolower($news->category->name),strtolower($news->subCategory->name),$news->slug]) }}">{!! truncate($news->title) !!}</a> </h2>
                                    <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i> <a href="{{ route('news-details',[strtolower($news->category->name),strtolower($news->subCategory->name),$news->slug]) }}"> {{ $news->auther->name }}</a></span> <span class="utf_post_date"><i class="fa fa-clock-o"></i> {{ date('M d, Y', strtotime($news->created_at)) }}</span> </div>
                                </div>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
              </div>
            </div>
            
            <div class="widget text-center"> <img class="banner img-fluid" src="images/banner-ads/ad-sidebar.png" alt="" /> </div>

            {{-- <div class="widget widget-tags">
              <h3 class="utf_block_title"><span>Popular Tags</span></h3>
              <ul class="unstyled clearfix">
                <li><a href="#">Business</a></li>
                <li><a href="#">Corporate</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Customer</a></li>
                <li><a href="#">Money</a></li>
                <li><a href="#">Health</a></li>
                <li><a href="#">Lifestyles</a></li>
                <li><a href="#">Traveling</a></li>
                <li><a href="#">Partners</a></li>
                <li><a href="#">Wordpress</a></li>
                <li><a href="#">Customer</a></li>
              </ul>
            </div>
            
            <div class="widget m-bottom-0">
              <h3 class="utf_block_title"><span>Newsletter</span></h3>
              <div class="utf_newsletter_block">
                <div class="utf_newsletter_introtext">
				  <h4>Subscribe Newsletter!</h4>
                  <p>Lorem ipsum dolor sit consectetur adipiscing elit Maecenas in pulvinar neque Nulla finibus lobortis pulvinar.</p>
                </div>
                <div class="utf_newsletter_form">
                  <form action="#" method="post">
                    <div class="form-group">
                      <input type="email" name="email" id="utf_newsletter_form-email" class="form-control form-control-lg" placeholder="E-Mail Address" autocomplete="off">
                      <button class="btn btn-primary">Subscribe</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>             --}}
          </div>
        </div>        
      </div>
    </div>
  </section>
@endsection