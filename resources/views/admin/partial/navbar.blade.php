<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <div class="pcoded-navigatio-lavel">Navigation</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="active">
                <a href="{{ route('admin.index') }}">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Dashboard</span>
                </a>
            </li>
        </ul>
        <div class="pcoded-navigatio-lavel">Management</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="{{ route('admin.orders.index') }}">
                    <span class="pcoded-micon"><i class="feather icon-monitor"></i></span>
                    <span class="pcoded-mtext">Orders</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.products.index') }}">
                    <span class="pcoded-micon"><i class="feather icon-monitor"></i></span>
                    <span class="pcoded-mtext">Products</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.cards.index') }}">
                    <span class="pcoded-micon"><i class="feather icon-monitor"></i></span>
                    <span class="pcoded-mtext">Cards</span>
                </a>
            </li>
        </ul>
        <div class="pcoded-navigatio-lavel">Account</div>

        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="" target="_blank">
                    <span class="pcoded-micon"><i class="feather icon-settings"></i></span>
                    <span class="pcoded-mtext">Settings</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('auth.logout') }}" target="_blank">
                    <span class="pcoded-micon"><i class="feather icon-log-out"></i></span>
                    <span class="pcoded-mtext">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
