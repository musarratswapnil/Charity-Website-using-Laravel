 <div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand text-primary">
            <a href="{{ route('customer_home') }}" class="text-primary">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('customer_home') }}"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{ Request::is ('customer/home') ? 'active' : ''}}"><a class="nav-link text-primary" href="{{ route('customer_home') }}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>

            <li class="{{ Request::is ('customer/event/tickets') ? 'active' : ''}}"><a class="nav-link text-primary" href="{{ route('customer_event_tickets') }}"><i class="fas fa-hand-point-right"></i> <span>Event Tickets</span></a></li>

            <li class="{{ Request::is ('customer/campaign/donations') ? 'active' : ''}}"><a class="nav-link text-primary" href="{{ route('customer_campaign_donations') }}"><i class="fas fa-hand-point-right"></i> <span>Campaign Donations</span></a></li>

            <li class="nav-link">
                <a href="{{ route('home') }}" target="_blank" class="btn btn-primary text-white">View Site</a>
            </li>

        </ul>
    </aside>
</div>