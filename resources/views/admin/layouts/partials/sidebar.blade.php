<aside class="sidebar sidebar-fix">
    <ul class="sidebar-list">
        <li class="logo"><a href="#">LOGO</a></li>
        <li class="sidebar-item {{ $page == 'product' ? 'active' : '' }}">
            <a href="{{ route('admin.product.index') }}">Products</a>
        </li>
        <li class="sidebar-item {{ $page == 'order' ? 'active' : '' }}">
            <a href="{{ route('admin.order.index') }}">Orders</a>
        </li>
        <li class="sidebar-item {{ $page == 'admin' ? 'active' : '' }}">
            <a href="{{ route('admin.admin.index') }}">Admins</a>
        </li>
        <li class="sidebar-item {{ $page == 'user' ? 'active' : '' }}">
            <a href="{{ route('admin.user.index') }}">Users</a>
        </li>
        <li class="sidebar-item {{ $page == 'shipping' ? 'active' : '' }}">
            <a href="{{ route('admin.shipping.index') }}">Shipping</a>
        </li>
    </ul>
</aside>