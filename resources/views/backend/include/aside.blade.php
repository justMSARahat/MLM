<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">

        @php
            $webinfo    = App\Models\Backend\webinfo::orderBy('id','asc')->first();
        @endphp

        @if ( !is_null($webinfo->logo) )
            <img src="{{ asset('Backend/Image/Website/' .$webinfo->logo) }}" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8; border-radius:0">
        @else
            <img src="{{ asset('Backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
        @endif
        <span class="brand-text font-weight-light">{{ $webinfo->title }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link @if( Route::currentRouteNamed('dashboard') ) active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-header">Website Function</li>

                <li class="nav-item">
                    <a href="{{ route('mail.manage') }}" class="nav-link @if( Route::currentRouteNamed('mail.manage') ) active @endif">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Mails
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('video.manage') }}" class="nav-link @if( Route::currentRouteNamed('video.manage') ||  Route::currentRouteNamed('video.create') ||  Route::currentRouteNamed('video.show') ||  Route::currentRouteNamed('video.edit')  ) active @endif">
                        <i class="nav-icon fab fa-youtube"></i>
                        <p>
                            Video
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('video.manage') }}" class="nav-link @if( Route::currentRouteNamed('video.manage') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Video</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('video.create') }}" class="nav-link @if( Route::currentRouteNamed('video.create') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Video</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('contact.manage') }}" class="nav-link @if( Route::currentRouteNamed('contact.manage') ||  Route::currentRouteNamed('contact.create') || Route::currentRouteNamed('contact.edit')  ) active @endif">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>Contact</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('about.manage') }}" class="nav-link @if( Route::currentRouteNamed('about.manage')  || Route::currentRouteNamed('about.edit')  ) active @endif">
                        <i class="nav-icon fas fa-address-card"></i>
                        <p>About</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('footer.manage') }}" class="nav-link @if( Route::currentRouteNamed('footer.manage') || Route::currentRouteNamed('footer.edit')  ) active @endif">
                        <i class="nav-icon fas fa-toolbox"></i>
                        Footer
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('header.manage') }}" class="nav-link @if( Route::currentRouteNamed('header.manage') ||  Route::currentRouteNamed('header.create') || Route::currentRouteNamed('header.edit')  ) active @endif">
                        <i class="nav-icon fas fa-bars"></i>
                        <p>
                            Page Header
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('faq.manage') }}" class="nav-link @if( Route::currentRouteNamed('faq.manage') ||  Route::currentRouteNamed('faq.create') ||  Route::currentRouteNamed('faq.edit') ) active @endif">
                        <i class="nav-icon fas fa-question-circle"></i>
                        <p>
                            Faq
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('faq.manage') }}" class="nav-link @if( Route::currentRouteNamed('faq.manage') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Faq</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('faq.create') }}" class="nav-link @if( Route::currentRouteNamed('faq.create') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Faq</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('menu.manage') }}" class="nav-link @if( Route::currentRouteNamed('menu.manage') ||  Route::currentRouteNamed('menu.create') ||  Route::currentRouteNamed('menu.edit') ) active @endif">
                        <i class="nav-icon fas fa-chevron-circle-down"></i>
                        <p>
                            Menu
                        </p>
                    </a>
                </li>

                <li class="nav-header">Management</li>

                <li class="nav-item">
                    <a href="{{ route('user.manage') }}" class="nav-link @if( Route::currentRouteNamed('user.manage') ||  Route::currentRouteNamed('user.create') ||  Route::currentRouteNamed('user.show') ||  Route::currentRouteNamed('user.edit') ||  Route::currentRouteNamed('user.pending') ||  Route::currentRouteNamed('user.due') ) active @endif">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Users
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user.manage') }}" class="nav-link @if( Route::currentRouteNamed('user.manage') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.pending') }}" class="nav-link @if( Route::currentRouteNamed('user.pending') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pending Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.due') }}" class="nav-link @if( Route::currentRouteNamed('user.due') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Payment Due</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.create') }}" class="nav-link @if( Route::currentRouteNamed('user.create') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Users</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('payment.manage') }}" class="nav-link @if( Route::currentRouteNamed('payment.manage') ||  Route::currentRouteNamed('payment.pending') ||  Route::currentRouteNamed('payment.cancel') ) active @endif">
                        <i class="nav-icon fas fa-credit-card"></i>
                        <p>
                            Payment
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('payment.manage') }}" class="nav-link @if( Route::currentRouteNamed('payment.manage') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Payment</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('payment.pending') }}" class="nav-link @if( Route::currentRouteNamed('payment.pending') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pending Payment</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('payment.cancel') }}" class="nav-link @if( Route::currentRouteNamed('payment.cancel') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Declined Payment</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-header">Website Settings</li>

                <li class="nav-item">
                    <a href="" class="nav-link @if( Route::currentRouteNamed('info.show') || Route::currentRouteNamed('edit') || Route::currentRouteNamed('mail.settings')|| Route::currentRouteNamed('mailchimp.settings') || Route::currentRouteNamed('payment.settings') ||  Route::currentRouteNamed('optimize.show')  ) active @endif">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Setitngs
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('info.show') }}" class="nav-link @if( Route::currentRouteNamed('info.show') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Information</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('mail.settings') }}" class="nav-link @if( Route::currentRouteNamed('mail.settings') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Mail API</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('optimize.show') }}" class="nav-link @if( Route::currentRouteNamed('optimize.show') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Optimize</p>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="nav-header">End Session</li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>{{ __('Logout') }}</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
