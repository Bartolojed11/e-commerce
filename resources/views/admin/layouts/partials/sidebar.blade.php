<aside class="sidebar sidebar-fix">
    <ul>
        <li class="{{ $page == 'product' ? 'active' : '' }}"><a href="{{ route('admin.product.index') }}">Products</a></li>
        <li class="{{ $page == 'order' ? 'active' : '' }}"><a href="{{ route('admin.order.index') }}">Order</a></li>
        <li class="{{ $page == 'admin' ? 'active' : '' }}"><a href="{{ route('admin.admin.index') }}">Admin</a></li>
        <li class="{{ $page == 'user' ? 'active' : '' }}"><a href="{{ route('admin.user.index') }}">Customer</a></li>
        <li class="{{ $page == 'shipping' ? 'active' : '' }}"><a href="{{ route('admin.shipping.index') }}">Shipping Address</a></li>
    </ul>
</aside>