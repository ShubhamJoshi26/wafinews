<div class="navbar-bg"></div>
<!-- Navbar Start -->
@include('admin.layouts.navbar')
<!-- Navbar End -->

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <img src="{{ asset($settings['site_logo']) }}" width="50px" alt="">
            <a href="">{{ __('Wafi News') }}</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">{{ __('admin.Dashboard') }}</li>
            <li class="active">
                <a href="{{ route('/news/auth/admin/dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>{{ __('admin.Dashboard') }}</span></a>
            </li>
            <li class="menu-header">{{ __('admin.Starter') }}</li>

            @if (canAccess(['category index', 'category create', 'category udpate', 'category delete']))
                <li class="{{ setSidebarActive(['admin.category.*']) }}"><a class="nav-link"
                        href="{{ route('/news/auth/admin/category.index') }}"><i class="fas fa-list"></i>
                        <span>{{ __('admin.Category') }}</span></a></li>
            @endif
            @if (canAccess(['sub-category index', 'sub-category create', 'sub-category udpate', 'sub-category delete']))
                <li class="{{ setSidebarActive(['admin.subcategory.*']) }}"><a class="nav-link"
                        href="{{ route('/news/auth/admin/subcategory.index') }}"><i class="fas fa-list"></i>
                        <span>{{ __('Sub Category') }}</span></a></li>
            @endif
            @if (canAccess(['brand index', 'brand create', 'brand udpate', 'brand delete']))
                <li class="{{ setSidebarActive(['admin.brand.*']) }}"><a class="nav-link"
                        href="{{ route('/news/auth/admin/brand.index') }}"><i class="fas fa-list"></i>
                        <span>{{ __('Brand') }}</span></a></li>
            @endif

            @if (canAccess(['news index']))
                <li class="dropdown {{ setSidebarActive(['admin.news.*', 'admin.pending.news']) }}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-newspaper"></i>
                        <span>{{ __('admin.News') }}</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ setSidebarActive(['admin.news.*']) }}"><a class="nav-link"
                                href="{{ route('/news/auth/admin/news.index') }}">{{ __('admin.All News') }}</a></li>

                        <li class="{{ setSidebarActive(['admin.pending.news']) }}"><a class="nav-link"
                                href="{{ route('/news/auth/admin/pending.news') }}">{{ __('admin.Pending News') }}</a></li>

                    </ul>
                </li>
            @endif

            @if (canAccess(['about index', 'contact index']))
                <li class="dropdown {{ setSidebarActive(['admin.about.*', 'admin.contact.*']) }}">
                    <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                        <span>{{ __('admin.Pages') }}</span></a>
                    <ul class="dropdown-menu">
                        @if (canAccess(['about index']))
                            <li class="{{ setSidebarActive(['admin.about.*']) }}"><a class="nav-link"
                                    href="{{ route('/news/auth/admin/about.index') }}">{{ __('admin.About Page') }}</a></li>
                        @endif
                        @if (canAccess(['conatact index']))
                            <li class="{{ setSidebarActive(['admin.contact.*']) }}"><a class="nav-link"
                                    href="{{ route('/news/auth/admin/contact.index') }}">{{ __('admin.Contact Page') }}</a></li>
                        @endif
                    </ul>
                </li>
            @endif

            @if (canAccess(['social count index']))
                <li class="{{ setSidebarActive(['admin.social-count.*']) }}"><a class="nav-link"
                        href="{{ route('/news/auth/admin/social-count.index') }}"><i class="fas fa-hashtag"></i>
                        <span>{{ __('admin.Social Count') }}</span></a></li>
            @endif

            @if (canAccess(['contact message index']))
                <li class="{{ setSidebarActive(['admin.contact-message.*']) }}"><a class="nav-link"
                        href="{{ route('/news/auth/admin/contact-message.index') }}"><i class="fas fa-id-card-alt"></i>
                        <span>{{ __('admin.Contact Messages') }} </span>
                        @if ($unReadMessages > 0)
                            <i class="badge bg-danger" style="color:
            #fff">{{ $unReadMessages }}</i>
                        @endif
                    </a></li>
            @endif
            @if (canAccess(['home section index']))
                <li class="{{ setSidebarActive(['admin.home-section-setting.*']) }}"><a class="nav-link"
                        href="{{ route('/news/auth/admin/home-section-setting.index') }}"><i class="fas fa-wrench"></i>
                        <span>{{ __('admin.Home Section Setting') }}</span></a></li>
            @endif

            @if (canAccess(['advertisement index']))
                <li class="{{ setSidebarActive(['admin.ad.*']) }}"><a class="nav-link"
                        href="{{ route('/news/auth/admin/ad.index') }}"><i class="fas fa-ad"></i>
                        <span>{{ __('admin.Advertisement') }}</span></a></li>
            @endif


            @if (canAccess(['subscribers index']))
                <li class="{{ setSidebarActive(['admin.subscribers.*']) }}"><a class="nav-link"
                        href="{{ route('/news/auth/admin/subscribers.index') }}"><i class="fas fa-users"></i>
                        <span>{{ __('admin.Subscribers') }}</span></a></li>
            @endif

            @if (canAccess(['footer index']))
                <li
                    class="dropdown
                {{ setSidebarActive([
                    'admin.social-link.*',
                    'admin.footer-info.*',
                    'admin.footer-grid-one.*',
                    'admin.footer-grid-three.*',
                    'admin.footer-grid-two.*'
                ]) }}
            ">
                    <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                        <span>{{ __('admin.Footer') }} {{ __('admin.Setting') }}</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ setSidebarActive(['admin.social-link.*']) }}"><a class="nav-link"
                                href="{{ route('/news/auth/admin/social-link.index') }}">{{ __('admin.Social Links') }}</a></li>
                        <li class="{{ setSidebarActive(['admin.footer-info.*']) }}"><a class="nav-link"
                                href="{{ route('/news/auth/admin/footer-info.index') }}">{{ __('admin.Footer Info') }}</a></li>
                        <li class="{{ setSidebarActive(['admin.footer-grid-one.*']) }}"><a class="nav-link"
                                href="{{ route('/news/auth/admin/footer-grid-one.index') }}">{{ __('admin.Footer Grid One') }}</a></li>
                        <li class="{{ setSidebarActive(['admin.footer-grid-two.*']) }}"><a class="nav-link"
                                href="{{ route('/news/auth/admin/footer-grid-two.index') }}">{{ __('admin.Footer Grid Two') }}</a></li>
                        <li class="{{ setSidebarActive(['admin.footer-grid-three.*']) }}"><a class="nav-link"
                                href="{{ route('/news/auth/admin/footer-grid-three.index') }}">{{ __('admin.Footer Grid Three') }}</a>
                        </li>

                    </ul>
                </li>
            @endif

            @if (canAccess(['access management index']))
                <li class="dropdown
                {{ setSidebarActive([
                    'admin.role.*',
                    'admin.role-users.*'
                    ]) }}
            ">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-user-shield"></i>
                        <span>{{ __('admin.Access Management') }}</span></a>
                    <ul class="dropdown-menu">

                        <li class="{{ setSidebarActive(['admin.role-users.*']) }}"><a class="nav-link"
                                href="{{ route('/news/auth/admin/role-users.index') }}">{{ __('admin.Role Users') }}</a></li>

                        <li class="{{ setSidebarActive(['admin.role.*']) }}"><a class="nav-link"
                                href="{{ route('/news/auth/admin/role.index') }}">{{ __('admin.Roles and Permissions') }}</a></li>
                    </ul>
                </li>
            @endif

            @if (canAccess(['setting index']))
                <li class="{{ setSidebarActive(['admin.setting.*']) }}"><a class="nav-link"
                        href="{{ route('/news/auth/admin/setting.index') }}"><i class="fas fa-cog"></i>
                        <span>{{ __('admin.Settings') }}</span></a></li>
            @endif

            @if (canAccess(['languages index']))

            <li class="dropdown
                {{ setSidebarActive([
                    'admin.frontend-localization.index',
                    'admin.admin-localization.index',
                    'admin.language.*'
                ]) }}
            ">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-language"></i>
                    <span>{{ __('admin.Localization') }}</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.language.*']) }}"><a class="nav-link"
                        href="{{ route('/news/auth/admin/language.index') }}">
                        <span>{{ __('admin.Languages') }}</span></a></li>

                    <li class="{{ setSidebarActive(['admin.frontend-localization.index']) }}"><a class="nav-link"
                        href="{{ route('/news/auth/admin/frontend-localization.index') }}">
                        <span>{{ __('admin.Frontend Lang') }}</span></a></li>

                    <li class="{{ setSidebarActive(['admin.admin-localization.index']) }}"><a class="nav-link"
                        href="{{ route('/news/auth/admin/admin-localization.index') }}">
                        <span>{{ __('admin.Admin Lang') }}</span></a></li>
                </ul>
            </li>
            @endif

            {{-- <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li> --}}

            {{-- <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="forms-advanced-form.html">Advanced Form</a></li>
                    <li><a class="nav-link" href="forms-editor.html">Editor</a></li>
                    <li><a class="nav-link" href="forms-validation.html">Validation</a></li>
                </ul>
            </li> --}}

        </ul>
    </aside>
</div>
