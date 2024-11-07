@extends('layouts.master')
@section('title', htmlspecialchars($categoryId[0]->metatitle))
@section('meta_description', $categoryId[0]->metadescription)
@section('meta_keywords', $categoryId[0]->metakeywords)
@section('meta_og_title', $categoryId[0]->metatitle)
@section('meta_og_description', $categoryId[0]->metadescription)
@section('meta_og_image', asset($categoryId[0]->image))
@section('meta_tw_title', $categoryId[0]->metatitle)
@section('meta_tw_description', $categoryId[0]->metadescription)
@section('meta_tw_image', asset($categoryId[0]->image))
@section('content')

<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li>{{$categoryId[0]['name']}}</li>
                    @if (isset($subCategory) && count($subCategory)>0)
                        <li>{{$subCategory[0]['name']}}</li>
                    @endif
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
                <div class="block category-listing category-style2">
                    <h3 class="utf_block_title"><span>{{$categoryId[0]['name']}} News</span></h3>
                    <ul class="subCategory unstyled">
                        @foreach ($allSubCategory as $cat)
                        <li><a href="#">{{$cat->name}}</a></li>
                        @endforeach
                    </ul>
                    @forelse ($allNews as $news)
                    <div class="utf_post_block_style post-list clearfix">
                        <div class="row">
                            <div class="col-lg-5 col-md-6">
                                <div class="utf_post_thumb thumb-float-style">
                                    <a href="{{ route('news-details',[strtolower($news->category->name),strtolower($news->subCategory->name),$news->slug]) }}">
                                        <img class="img-fluid" src="{{asset($news->image)}}" alt="" />
                                    </a>
                                    <a class="utf_post_cat" href="{{ route('news-details',[strtolower($news->category->name),strtolower($news->subCategory->name),$news->slug]) }}">{!!$news['subCategory']['name']??$news['category']['name']!!}</a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6">
                                <div class="utf_post_content">
                                    <h2 class="utf_post_title title-large"> <a href="{{ route('news-details',[strtolower($news->category->name),strtolower($news->subCategory->name),$news->slug]) }}">{!! truncate($news->title)
                                            !!}</a> </h2>
                                    <div class="utf_post_meta"> <span class="utf_post_author"><i class="fa fa-user"></i>
                                            <a href="{{ route('news-details',[strtolower($news->category->name),strtolower($news->subCategory->name),$news->slug]) }}"> {{ $news->auther->name }}</a></span> <span
                                            class="utf_post_date"><i class="fa fa-clock-o"></i>{{ date('M d, Y',
                                            strtotime($news->created_at)) }}</span> 
                                    </div>
                                    <p>{!! truncate($news->title)
                                            !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <h2>No News Found</h2>
                    @endforelse

                </div>

                <div class="paging">
                    <ul class="pagination">
                        {!! $allNews->withQueryString()->links() !!}
                    </ul>
                </div>
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
                        <h3 class="utf_block_title"><span>Popular News</span></h3>
                        <div class="utf_list_post_block">
                            <ul class="utf_list_post">
                                @foreach ($popularNews as $key => $popNews)
                                @if ($key <= 4) <li class="clearfix">
                                    <div class="utf_post_block_style post-float clearfix">
                                        <div class="utf_post_thumb"> <a
                                                href="{{ route('news-details',[strtolower($popNews->category->name),strtolower($popNews->subCategory->name),$popNews->slug]) }}">
                                                <img class="img-fluid" src="{{ asset($popNews->image) }}" alt="" /> </a>
                                            <a class="utf_post_cat"
                                                href="{{ route('news-details',[strtolower($popNews->category->name),strtolower($popNews->subCategory->name),$popNews->slug]) }}">{{
                                                $popNews->subCategory->name }}</a>
                                        </div>
                                        <div class="utf_post_content">
                                            <h2 class="utf_post_title title-small"> <a
                                                    href="{{ route('news-details',[strtolower($popNews->category->name),strtolower($popNews->subCategory->name),$popNews->slug]) }}">{!!
                                                    truncate($popNews->title) !!}</a>
                                            </h2>
                                            <div class="utf_post_meta"> <span class="utf_post_author"><i
                                                        class="fa fa-user"></i> <a
                                                        href="{{ route('news-details',[strtolower($popNews->category->name),strtolower($popNews->subCategory->name),$popNews->slug]) }}">{{
                                                        $popNews->auther->name }}</a></span>
                                                <span class="utf_post_date"><i class="fa fa-clock-o"></i>{{ date('M d,
                                                    Y', strtotime($popNews->created_at)) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    </li>
                                    @endif
                                    @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="widget text-center"> <img class="banner img-fluid"
                            src="images/banner-ads/ad-sidebar.png" alt="" /> </div>

                </div>
            </div>
        </div>
    </div>
</section>



@endsection