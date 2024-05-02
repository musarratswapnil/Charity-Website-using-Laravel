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

            {{-- <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right text-primary"></i><span class="text-primary">Dropdown Items</span></a>
                <ul class="dropdown-menu text-primary">
                    <li class="active"><a class="nav-link text-primary" href=""><i class="fas fa-angle-right"></i> Item 1</a></li>
                    <li class=""><a class="nav-link text-primary" href=""><i class="fas fa-angle-right"></i> Item 2</a></li>
                </ul>
            </li>

            <li class=""><a class="nav-link text-primary" href="setting.html"><i class="fas fa-hand-point-right"></i> <span>Setting</span></a></li>

            <li class=""><a class="nav-link text-primary" href="form.html"><i class="fas fa-hand-point-right"></i> <span>Form</span></a></li>

            <li class=""><a class="nav-link text-primary" href="table.html"><i class="fas fa-hand-point-right"></i> <span>Table</span></a></li>

            <li class=""><a class="nav-link text-primary" href="invoice.html"><i class="fas fa-hand-point-right"></i> <span>Invoice</span></a></li> --}}

        </ul>
    </aside>
</div>