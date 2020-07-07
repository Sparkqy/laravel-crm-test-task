<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ url('/')  }}" class="brand-link">
        <img src="{{ asset('images/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('frontend.companies.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Companies</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('frontend.clients.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Clients</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
