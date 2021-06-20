@php
    $webinfo    = App\Models\Backend\webinfo::orderBy('id','asc')->first();
@endphp
<header id="header" class="header-effect-shrink" style="height: 70px !important;">
    <div class="header-body">
        <div class="header-container container">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-logo">
                            <a href="{{ route('home') }}">
                                <img alt="{{ $webinfo->title }}" width="100" height="48" src="{{ asset('Backend/Image/Website/'.$webinfo->logo) }}">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="header-column justify-content-end">
                    <div class="header-row">
                        <div class="header-nav header-nav-line header-nav-top-line header-nav-top-line-with-border order-2 order-lg-1">
                            <div class="header-nav-main header-nav-main-square header-nav-main-effect-2 header-nav-main-sub-effect-1">
                                <nav class="collapse">
                                    <ul class="nav nav-pills" id="mainNav">
                                        @foreach (App\Models\Backend\menu::orderBy('priority','asc')->limit(6)->get() as $item )
                                            <li class="dropdown">
                                                <a class="dropdown-item dropdown-toggle" href="{{ $item->link }}">
                                                    {{ $item->title }}
                                                </a>
                                            </li>
                                        @endforeach
                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle">
                                                Account
                                            <i class="fas fa-chevron-down"></i></a>
                                            <ul class="dropdown-menu">
                                                @if ( Auth::guard('customer')->check() )
                                                    <li><a class="dropdown-item" href="{{ route('account') }}">Account</a></li>
                                                    <li><a class="dropdown-item" href="{{ route('video') }}">View Ads</a></li>
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                        document.getElementById('logout-form').submit();">
                                                            {{ __('Logout') }}
                                                        </a>

                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                            @csrf
                                                        </form>
                                                    </li>
                                                @elseif ( Auth::check() )
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                        document.getElementById('logout-form').submit();">
                                                            {{ __('Admin Logout') }}
                                                        </a>

                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                            @csrf
                                                        </form>
                                                    </li>
                                                @else
                                                    <li><a class="dropdown-item" href="{{ route('login.form') }}">Login</a></li>
                                                    <li><a class="dropdown-item" href="{{ route('register.form') }}">Register</a></li>
                                                @endif
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
