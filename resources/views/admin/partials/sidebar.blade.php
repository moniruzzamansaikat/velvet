  <!-- Sidebar -->
  <div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">
                <img src="img/logo.png" class="logo" alt="Logo" />
            </a>
        </li>
        <li>
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <x-icons.dashboard-v1 />
                @lang('Dashboard')
            </a>
        </li>
        
        <li>
            <a href="{{ route('admin.user.list') }}" class="{{ request()->routeIs('admin.user.*') ? 'active' : '' }}">
                <x-icons.users-v1 />
                @lang('Users')
            </a>
        </li> 

                
        <li>
            <a href="{{ route('admin.payment_gateway.list') }}" class="{{ request()->routeIs('admin.payment_gateway.*') ? 'active' : '' }}">
                <x-icons.wallet-cards />
                @lang('Payment Gateways')
            </a>
        </li> 

        <li>
            <a href="{{ route('admin.payment.list') }}" class="{{ request()->routeIs('admin.payment.*') ? 'active' : '' }}">
                <x-icons.credit-card />
                @lang('Payments')
            </a>
        </li> 

        <li>
            <a href="#">
                <x-icons.setting />
                @lang('Settings')
            </a>
        </li>
    </ul>
</div>
<!-- /#sidebar-wrapper -->