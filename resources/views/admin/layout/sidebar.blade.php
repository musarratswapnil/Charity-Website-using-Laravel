<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand text-primary">
            <a href="{{ route('admin_home') }}" class="text-primary">Admin Panel</a>
            
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin_home') }}"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{ Request::is ('admin/home') ? 'active' : ''}}"><a class="nav-link text-primary" href="{{ route('admin_home') }}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>

            {{-- <li class="{{ Request::is ('admin/slider/*') ? 'active' : ''}}"><a class="nav-link text-primary" href="{{ route('admin_slider_index') }}"><i class="fas fa-hand-point-right"></i> <span>Slider</span></a></li> --}}

            <li class="{{ Request::is ('admin/home/*') ? 'active' : ''}}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right text-primary"></i><span class="text-primary">Home</span></a>
                <ul class="dropdown-menu text-primary">

                    <li class="{{ Request::is ('admin/slider/*') ? 'active' : ''}}"><a class="nav-link text-primary" href="{{ route('admin_slider_index') }}"><i class="fas fa-hand-point-right"></i> <span>Slider</span></a></li>

                    <li class="{{ Request::is ('admin/mission/*') ? 'active' : ''}}"><a class="nav-link text-primary" href="{{ route('admin_mission_edit') }}"><i class="fas fa-hand-point-right"></i> <span>Mission</span></a></li>

                    <li class="{{ Request::is ('admin/feature/*') ? 'active' : ''}}"><a class="nav-link text-primary" href="{{ route('admin_feature_index') }}"><i class="fas fa-hand-point-right"></i> <span>Features</span></a></li>

                    <li class="{{ Request::is ('admin/goal/*') ? 'active' : ''}}"><a class="nav-link text-primary" href="{{ route('admin_goal_edit') }}"><i class="fas fa-hand-point-right"></i> <span>Goals</span></a></li>

                    <li class="{{ Request::is ('admin/home-item/*') ? 'active' : ''}}"><a class="nav-link text-primary" href="{{ route('admin_home_item_index') }}"><i class="fas fa-hand-point-right"></i> <span>Home Items</span></a></li>

                </ul>
            </li>

            <li class="{{ Request::is ('admin/settings/*') ? 'active' : ''}}"><a class="nav-link text-primary" href="{{ route('admin_settings_index') }}"><i class="fas fa-hand-point-right"></i> <span>Settings</span></a></li>

            <li class="{{ Request::is ('admin/event/*') ? 'active' : ''}}"><a class="nav-link text-primary" href="{{ route('admin_event_index') }}"><i class="fas fa-hand-point-right"></i> <span>Event</span></a></li>

            <li class="{{ Request::is ('admin/campaign/*') ? 'active' : ''}}"><a class="nav-link text-primary" href="{{ route('admin_campaign_index') }}"><i class="fas fa-hand-point-right"></i> <span>Campaign</span></a></li>

            <li class="{{ Request::is ('admin/faq/*') ? 'active' : ''}}"><a class="nav-link text-primary" href="{{ route('admin_faq_index') }}"><i class="fas fa-hand-point-right"></i> <span>FAQs</span></a></li>

            <li class="{{ Request::is ('admin/other-pages/terms') ? 'active' : ''}}"><a class="nav-link text-primary" href="{{ route('admin_terms_page') }}"><i class="fas fa-hand-point-right"></i> <span>Terms Page</span></a></li>

            <li class="{{ Request::is ('admin/other-pages/privacy') ? 'active' : ''}}"><a class="nav-link text-primary" href="{{ route('admin_privacy_page') }}"><i class="fas fa-hand-point-right"></i> <span>Privacy Page</span></a></li>

            <li class="nav-link">
                <a href="{{ route('home') }}" target="_blank" class="btn btn-primary text-white">View Site</a>
            </li>
            

        </ul>
    </aside>
</div>