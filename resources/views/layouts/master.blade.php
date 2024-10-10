<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>@hasSection('title') @yield('title') @else {{ $settings['site_seo_title'] }} @endif </title>
    <meta name="description" content="@hasSection('meta_description') @yield('meta_description') @else {{ $settings['site_seo_description'] }} @endif " />
    <meta name="keywords" content="@hasSection('meta_keywords') @yield('meta_keywords') @else {{ $settings['site_seo_keywords'] }} @endif " />

    <meta name="og:title" content="@yield('meta_og_title')" />
    <meta name="og:description" content="@yield('meta_og_description')" />
    <meta name="og:image" content="@hasSection('meta_og_image') @yield('meta_og_image') @else {{ asset($settings['site_logo']) }} @endif" />
    <meta name="twitter:title" content="@yield('meta_tw_title')" />
    <meta name="twitter:description" content="@yield('meta_tw_description')" />
    <meta name="twitter:image" content="@yield('meta_tw_image')" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset($settings['site_favicon']) }}" type="image/png">

    <!-- CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/responsive.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/admin/assets/modules/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/assets/css/colorbox.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,500,600,700,800&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,500,600,700,800&amp;display=swap"
        rel="stylesheet">
</head>

<body>

    @php
        $socialLinks = \App\Models\SocialLink::where('status', 1)->get();
        $footerInfo = \App\Models\FooterInfo::where('language', getLangauge())->first();
        $footerGridOne = \App\Models\FooterGridOne::where(['status' => 1, 'language' => getLangauge()])->get();
        $footerGridTwo = \App\Models\FooterGridTwo::where(['status' => 1, 'language' => getLangauge()])->get();
        $footerGridThree = \App\Models\FooterGridThree::where(['status' => 1, 'language' => getLangauge()])->get();
        $footerGridOneTitle = \App\Models\FooterTitle::where(['key' => 'grid_one_title', 'language' => getLangauge()])->first();
        $footerGridTwoTitle = \App\Models\FooterTitle::where(['key' => 'grid_two_title', 'language' => getLangauge()])->first();
        $footerGridThreeTitle = \App\Models\FooterTitle::where(['key' => 'grid_three_title', 'language' => getLangauge()])->first();
    @endphp


 <!-- Header news -->
 @include('layouts.header')
 <!-- End Header news -->

 @yield('content')

 <!-- Footer Section -->
 @include('layouts.footer')




@include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })



    </script>



   

</body>

</html>