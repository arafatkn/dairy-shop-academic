<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            <a class="mobile-menu" id="mobile-collapse" href="#!">
                <i class="feather icon-menu"></i>
            </a>
            <a href="{{ route('index') }}">
                <img class="img-fluid" src="{{ asset('/img/logo.png') }}" alt="Dairy Shop" />
            </a>
            <a class="mobile-options">
                <i class="feather icon-more-horizontal"></i>
            </a>
        </div>
        <div class="navbar-container container-fluid">
            <ul class="nav-right">
                <li class="header-notification">
                    <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-shopping-cart"></i>
                            <span class="badge bg-c-pink">{{ count($cart) }}</span>
                        </div>
                        <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <li>
                                <h6>Cart Items</h6>
                            </li>
                        @foreach($cart as $item)
                            <li>
                                <div class="media">
                                    <img class="d-flex align-self-center img-radius" src="{{ url('/storage/images/products/'.$item->image) }}" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <h5 class="notification-user">{{ $item->name }}</h5>
                                        <p class="notification-msg">{{ $item->quantity }} {{ $item->unit }} - {{ $item->price*$item->quantity }} Taka</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                            <li>
                                <a href="{{ route('products.cart.index') }}"><h5>View Cart</h5></a>
                            </li>
                        </ul>
                    </div>
                </li>
            @auth
                <li class="user-profile header-notification">
                    <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                            {{-- <img src="{{ asset('/images/avatar-4.jpg') }}" class="img-radius" alt="User-Profile-Image"> --}}
                            <span>{{ $user->name }}</span>
                            <i class="feather icon-chevron-down"></i>
                        </div>
                        <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                        @if($user->isAdmin())
                            <li>
                                <a href="{{ route('admin.index') }}">
                                    <i class="feather icon-settings"></i> Admin Panel
                                </a>
                            </li>
                        @endif
                            <li>
                                <a href="/user/settings">
                                    <i class="feather icon-user"></i> Settings
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('auth.logout') }}">
                                    <i class="feather icon-log-out"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endauth
            </ul>
        </div>
    </div>
</nav>
