<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="{{ route('dashboard') }}">
            <div class="logo-img">
                <img height="30"
                    src="{{ isset($allsettings['white_logo']) ? asset(WHITE_LOGO . $allsettings['white_logo']) : asset(path_noimage_image() . 'no-image-200.jpg') }}"
                    class="header-brand-img">
            </div>
        </a>
        <div class="sidebar-action"><i class="ik ik-arrow-left-circle"></i></div>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>
    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-item {{ Route::is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}"><i
                            class="ik ik-bar-chart-2"></i><span>{{ __('Dashboard') }}</span></a>
                </div>
                {{-- admin --}}
                @if (auth()->user()->can('user-list') ||
                    auth()->user()->can('role-list'))
                    <div
                        class="nav-item has-sub {{ Route::is('admin.user.*') || Route::is('admin.role.*') ? 'active open' : '' }}">
                        <a href="#"><i class="ik ik-user"></i><span>{{ __('Admin Manage') }}</span></a>
                        <div class="submenu-content">
                            @can('user-list')
                                <a href="{{ route('admin.user.index') }}"
                                    class="menu-item {{ Route::is('admin.user.index') ? 'active' : '' }}">{{ __('Admin List') }}</a>
                            @endcan
                            @can('user-create')
                                <a href="{{ route('admin.user.create') }}"
                                    class="menu-item {{ Route::is('admin.user.create') ? 'active' : '' }}">{{ __('Admin Create') }}</a>
                            @endcan
                            @can('role-list')
                                <a href="{{ route('admin.role.index') }}"
                                    class="menu-item {{ Route::is('admin.role.index') ? 'active' : '' }}">{{ __('Role') }}</a>
                            @endcan
                        </div>
                    </div>
                @endif
                @can('doctor-list')
                    <div
                        class="nav-item {{ Route::is('doctor.index') || Route::is('doctor.create') || Route::is('doctor.show') ? 'active' : '' }}">
                        <a href="{{ route('doctor.index') }}"><i
                                class="fa fa-user-md"></i><span>{{ __('Doctor') }}</span></a>
                    </div>
                @endcan
                @can('category-list')
                    <div
                        class="nav-item {{ Route::is('doctor.category.index') || Route::is('doctor.category.*') ? 'active' : '' }}">
                        <a href="{{ route('doctor.category.index') }}"><i
                                class="fa fa-bug"></i><span>{{ __('Doctor Category') }}</span></a>
                    </div>
                @endcan
                @can('slot-list')
                    <div class="nav-item {{ Route::is('slot.index') ? 'active' : '' }}">
                        <a href="{{ route('slot.index') }}"><i
                                class="far fa-calendar"></i><span>{{ __('Doctor Slot') }}</span></a>
                    </div>
                @endcan
                @can('slot-create')
                    <div class="nav-item {{ Route::is('slot.add') ? 'active' : '' }}">
                        <a href="{{ route('slot.add') }}"><i
                                class="far fa-calendar-times"></i><span>{{ __('Doctor Slot add') }}</span></a>
                    </div>
                @endcan
                @can('patient-list')
                    <div
                        class="nav-item {{ Route::is('patient.index') || Route::is('patient.create') || Route::is('patient.show') ? 'active' : '' }}">
                        <a href="{{ route('patient.index') }}"><i
                                class="fa fa-bug"></i><span>{{ __('Patient') }}</span></a>
                    </div>
                @endcan

                @can('appointment-list')
                    <div class="nav-item has-sub {{ Route::is('appointment.index') ? 'active open' : '' }}">
                        <a href="#"><i class="fa fa-calendar-check"></i><span>{{ __('Appointment') }}</span></a>
                        <div class="submenu-content">
                            <a href="{{ route('appointment.index') }}"
                                class="menu-item {{ Route::is('appointment.index') ? 'active' : '' }}">{{ __('Appointment List') }}</a>

                            <a href="{{ route('appointment.index', 'paymentType=bank') }}"
                                class="menu-item">{{ __('Appointment Request') }}</a>

                        </div>
                    </div>
                @endcan

                @can('earning-list')
                    <div class="nav-item {{ Route::is('earnings.index') ? 'active' : '' }}">
                        <a href="{{ route('earnings.index') }}"><i
                                class="fa fa-money-bill"></i><span>{{ __('Earnings') }}</span></a>
                    </div>
                    <div class="nav-item {{ Route::is('spotpayment.index') ? 'active' : '' }}">
                        <a href="{{ route('spotpayment.index') }}"><i
                                class="fa fa-dollar-sign"></i><span>{{ __('Spot Payment') }}</span></a>
                    </div>
                @endcan
                {{-- @can('currency-list')
                    <div class="nav-item {{ Route::is('currency.index') ? 'active' : '' }}">
                        <a href="{{ route('currency.index') }}"><i
                                class="fa fa-dollar-sign"></i><span>{{ __('Currency') }}</span></a>
                    </div>
                @endcan --}}
                <!-- News -->
                @if (auth()->user()->can('news-list') ||
                    auth()->user()->can('news-category-list'))
                    <div class="nav-item has-sub {{ Route::is('news.*', 'category.*') ? 'active open' : '' }}">
                        <a href="#"><i class="ik ik-file-text"></i><span>{{ __('News') }}</span></a>
                        <div class="submenu-content">
                            <!-- only those have manage_user permission will get access -->
                            @can('news-list')
                                <a href="{{ route('news.index') }}"
                                    class="menu-item {{ Route::is('news.index') ? 'active' : '' }}">{{ __('News') }}</a>
                            @endcan
                            @can('news-create')
                                <a href="{{ route('news.create') }}"
                                    class="menu-item {{ Route::is('news.create') ? 'active' : '' }}">{{ __('Add News') }}</a>
                            @endcan
                            @can('news-category-list')
                                <a href="{{ route('category.index') }}"
                                    class="menu-item {{ Route::is('category.index') ? 'active' : '' }}">{{ __('Categories') }}</a>
                            @endcan
                            @can('news-category-create')
                                <a href="{{ route('category.create') }}"
                                    class="menu-item {{ Route::is('category.create') ? 'active' : '' }}">{{ __('Add Category') }}</a>
                            @endcan
                        </div>
                    </div>
                @endif
                <!-- Appearance -->
                <div class="nav-item has-sub {{ Route::is('menu.*') ? 'active open' : '' }}">
                    <a href="#"><i class="ik ik-edit"></i><span>{{ __('Appearance') }}</span></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        @can('menu-list')
                            <a href="{{ route('menu.index') }}"
                                class="menu-item {{ Route::is('menu.*') ? 'active' : '' }}">{{ __('Menu') }}</a>
                        @endcan
                    </div>
                </div>
                <!-- Comment -->
                @can('comment-list')
                    <div class="nav-item {{ Route::is('comment.*') ? 'active' : '' }}">
                        <a href="{{ route('comment.index') }}"><i
                                class="ik ik-edit-1"></i><span>{{ __('Comment') }}</span></a>
                    </div>
                @endcan
                <!-- Comment -->
                @can('social-list')
                    <div class="nav-item {{ Route::is('site.social.*') ? 'active' : '' }}">
                        <a href="{{ route('site.social.index') }}"><i
                                class="fab fa-facebook-square"></i><span>{{ __('Social Media') }}</span></a>
                    </div>
                @endcan
                <!-- Service -->
                @can('service-list')
                    <div class="nav-item {{ Route::is('service.*') ? 'active' : '' }}">
                        <a href="{{ route('service.index') }}"><i
                                class="ik ik-sliders"></i><span>{{ __('Service') }}</span></a>
                    </div>
                @endcan
                <!-- gallery -->
                @can('gallery-list')
                    <div class="nav-item {{ Route::is('gallery.*') ? 'active' : '' }}">
                        <a href="{{ route('gallery.index') }}"><i
                                class="ik ik-image"></i><span>{{ __('Gallery') }}</span></a>
                    </div>
                @endcan
                <!-- Pages -->
                @can('page-list')
                    <div class="nav-item {{ Route::is('page.*') ? 'active' : '' }}">
                        <a href="{{ route('page.index') }}"><i
                                class="ik ik-file-text"></i><span>{{ __('Pages') }}</span></a>
                    </div>
                @endcan
                <!-- Contact -->
                @can('contact-list')
                    <div class="nav-item {{ Route::is('contact.*') ? 'active' : '' }}">
                        <a href="{{ route('contact.index') }}"><i
                                class="ik ik-mail"></i><span>{{ __('Contact') }}</span></a>
                    </div>
                @endcan
                <!-- Site -->
                @can('language-list')
                    <div class="nav-item {{ Route::is('language.*') ? 'active' : '' }}">
                        <a href="{{ route('language.index') }}"><i
                                class="fas fa-language"></i><span>{{ __('Languages') }}</span></a>
                    </div>
                @endcan
                <!-- Site -->
                @can('site-setting')
                    <div class="nav-item {{ Route::is('sites.*') ? 'active' : '' }}">
                        <a href="{{ route('sites.create') }}"><i
                                class="fas fa-cogs"></i><span>{{ __('Site Settings') }}</span></a>
                    </div>
                @endcan
                <!-- Smtp settings -->
                @can('smtp-setting')
                    <div class="nav-item {{ Route::is('smtp.*') ? 'active' : '' }}">
                        <a href="{{ route('smtp.index') }}"><i
                                class="fas fa-cog"></i><span>{{ __('SMTP Settings') }}</span></a>
                    </div>
                @endcan
                <!-- zoom settings -->
                @can('zoom-setting')
                    <div class="nav-item {{ Route::is('zoom.setting.*') ? 'active' : '' }}">
                        <a href="{{ route('zoom.setting.index') }}">
                            <i class="fas fa-search"></i>
                            <span>{{ __('Zoom Settings') }}</span></a>
                    </div>
                @endcan
                <!-- payment settings -->
                @can('payment-method')
                    <div class="nav-item {{ Route::is('paymentmethod.*') ? 'active' : '' }}">
                        <a href="{{ route('paymentmethod.index') }}"><i
                                class="fas fa-credit-card"></i><span>{{ __('Payment Method Settings') }}</span></a>
                    </div>
                @endcan
                <!-- Subscribers -->
                @can('subscriber')
                    <div class="nav-item {{ Route::is('subscribers.*') ? 'active' : '' }}">
                        <a href="{{ route('subscribers.index') }}"><i
                                class="fas fa-users-cog"></i><span>{{ __('Subscribers') }}</span></a>
                    </div>
                @endcan
                <!-- Sections -->
                <div
                    class="nav-item has-sub {{ Route::is('slider.*', 'faq.*', 'notice.*', 'about.*', 'counter.*', 'gallery_section.*', 'doctor.section', 'testimonial.*', 'brand.*') ? 'active open' : '' }}">
                    <a href="#"><i class="ik ik-layers"></i><span>{{ __('Sections') }}</span></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        @can('slider-list')
                            <a href="{{ route('slider.index') }}"
                                class="menu-item {{ Route::is('slider.*') ? 'active' : '' }}">{{ __('Slider') }}</a>
                        @endcan
                        @can('testimonial-list')
                            <a href="{{ route('testimonial.index') }}"
                                class="menu-item {{ Route::is('testimonial.*') ? 'active' : '' }}">{{ __('Testimonial') }}</a>
                        @endcan
                        @can('brand-list')
                            <a href="{{ route('brand.index') }}"
                                class="menu-item {{ Route::is('brand.*') ? 'active' : '' }}">{{ __('Brand') }}</a>
                        @endcan
                        @can('faq-list')
                            <a href="{{ route('faq.index') }}"
                                class="menu-item {{ Route::is('faq.*') ? 'active' : '' }}">{{ __('Faq') }}</a>
                        @endcan
                        @can('notice-section')
                            <a href="{{ route('notice.index') }}"
                                class="menu-item {{ Route::is('notice.*') ? 'active' : '' }}">{{ __('Notice') }}</a>
                        @endcan
                        @can('about-section')
                            <a href="{{ route('about.index') }}"
                                class="menu-item {{ Route::is('about.*') ? 'active' : '' }}">{{ __('About') }}</a>
                        @endcan
                        @can('counter-section')
                            <a href="{{ route('counter.index') }}"
                                class="menu-item {{ Route::is('counter.*') ? 'active' : '' }}">{{ __('Counter') }}</a>
                        @endcan
                        @can('gallery-section')
                            <a href="{{ route('gallery_section.index') }}"
                                class="menu-item {{ Route::is('gallery_section.*') ? 'active' : '' }}">{{ __('Gallery') }}</a>
                        @endcan
                        @can('doctor-section')
                            <a href="{{ route('doctor.section') }}"
                                class="menu-item {{ Route::is('doctor.section') ? 'active' : '' }}">{{ __('Doctor') }}</a>
                        @endcan

                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
