@php
    $languages = \App\Models\Language::where('status', 1)->get();
    $FeaturedCategories = \App\Models\Category::where([
        'status' => 1,
        'language' => getLangauge(),
        'show_at_nav' => 1,
    ])->with('subCategory')->get();
    $brands = \App\Models\Brand::where(['is_active' => 1, 'show_at_nav' => 1])->get();

@endphp

    <div class="body-inner">
        <!-- Topbar Start -->
        <div id="top-bar" class="top-bar">
            <div class="container">
                {{-- <div class="row">
                    <div class="col-md-8">
                        <ul class="unstyled top-nav">
                            @if (!auth()->check())
                                <li><a href="{{ route('login') }}">Login & Signup</a></li>
                            @endif
                        </ul>
                    </div>
                    <div class="col-md-4 top-social text-lg-right text-md-center">
                        <ul class="unstyled">
                            <li>
                                @foreach ($socialLinks as $link)
                                    <a title="Facebook" href="{{ $link->url }}">
                                         <span class="social-icon">
                                            <i class="{{ $link->icon }}"></i>
                                        </span>
                                    </a>
                                @endforeach
                             </li>
                        </ul>
                    </div>
                </div> --}}
            </div>
        </div>
        <!-- Topbar End -->

        <!-- Header start -->
        <header id="header" class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-12 text-center" >
                        <div class="logo"> <a href="/"> <img src="{{ asset($settings['site_logo']) }}" alt="" width="160px"> </a>
                        </div>
                    </div>
                    @if (!empty($ad) && $ad->home_top_bar_ad_status == 1)
                        <div class="col-md-9 col-sm-12 header-right">
                            <div class="ad-banner float-right"> <a href="{{ $ad->home_top_bar_ad_url }}"><img
                                src="/{{ $ad->home_top_bar_ad }}" class="img-fluid" alt=""></a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </header>
        <!-- Header End -->

        <!-- Main Nav Start -->
        <div class="utf_main_nav_area clearfix utf_sticky">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-expand-lg col">
                        <div class="utf_site_nav_inner float-left">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="true" aria-label="Toggle navigation"> <span
                                    class="navbar-toggler-icon"></span> </button>
                            <div id="navbarSupportedContent"
                                class="collapse navbar-collapse navbar-responsive-collapse">
                                <ul class="nav navbar-nav">
                                    <li class="nav-item dropdown active"> <a href="/" class="nav-link"
                                            data-toggle="dropdown">Home</a>
                                    </li>
                                    @if(count($brands)>0)
                                    <li class="dropdown nav-item utf_mega_dropdown"> <a href="#"
                                        class="nav-link dropdown-toggler" data-toggle="dropdown">Brands <i
                                            class="fa fa-angle-down"></i></a>
                                    <div class="utf_dropdown_menu utf_mega_menu_content clearfix">
                                        <div class="utf_mega_menu_content_inner">
                                            <div class="row">
                                                @foreach ($brands as $brand)
                                                <div class="col-md-3">
                                                    <div class="utf_post_block_style clearfix">
                                                        <div class="utf_post_thumb"> <img class="img-fluid"
                                                                src="{{$brand->image}}"
                                                                alt="" /> 
                                                        </div>
                                                        <div class="utf_post_content">
                                                            <h2 class="utf_post_title title-small"> <a
                                                                    href="#">{{$brand->name}}</a> </h2>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                    @endif
                                    <li> <a href="/about">About Us</a> </li>
                                    @if(count($FeaturedCategories)>0)
                                        @foreach ($FeaturedCategories as $category)
                                            @if (count($category->subCategory)>0)
                                                <li class="dropdown"> <a href="{{ route('categorylist', [$category->slug]) }}" class="dropdown-toggle" data-toggle="dropdown">{{ $category->name }} <i class="fa fa-angle-down"></i></a>
                                                    <ul class="utf_dropdown_menu" role="menu">
                                                        @foreach ($category->subCategory as $subcategory)
                                                            <li><a href="{{ route('subcategorylist', [$category->slug,strtolower(str_replace(' ','-',$subcategory->name))]) }}"><i class="fa fa-angle-double-right"></i> {{$subcategory->name}} </a></li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @else
                                                <li>
                                                    <a href="{{ route('categorylist', [$category->slug]) }}">{{ $category->name }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </nav>
                    {{-- <div class="utf_nav_search"> <span id="search"><i class="fa fa-search"></i></span> </div> --}}
                    {{-- <div class="utf_search_block" style="display: none;">
                        <input type="text" class="form-control" placeholder="Enter your keywords...">
                        <span class="utf_search_close">&times;</span>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- Main Nav End -->
