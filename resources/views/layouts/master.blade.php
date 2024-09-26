<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from utouchdesign.com/themes/envato/altroznews/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 14 Sep 2024 12:15:23 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="">
    <meta name="theme-color" content="#ec0000">
    <meta name="description" content="News Magazine HTML Template">
    <meta name="keywords"
        content="Article, Blog, Business, Fashion, Magazine, Music, News, News Magazine, Newspaper, Politics, Travel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>:: Altroz - News Magazine HTML Template ::</title>

    <!--Favicon-->
    <link rel="icon" href="/assets/images/favicon.png" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/responsive.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
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