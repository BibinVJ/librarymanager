<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">

        <span class="brand-text font-weight-bold pl-2 align-content-center">Library Management</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('AdminLTE-3.1.0/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('profile.edit') }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                @canany(['admin.dashboard'])
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }} " class="nav-link">
                            <i class="nav-icon fas fa-sticky-note"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                @endcanany
                @canany(['book.read'])
                    <li class="nav-item">
                        <a href="{{ route('book.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-ticket-alt"></i>
                            <p>
                                Books
                            </p>
                        </a>
                    </li>
                @endcanany
                @canany(['user.read'])
                    <li class="nav-item">
                        <a href=" {{ route('user.index') }} " class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Users
                            </p>
                        </a>
                    </li>
                @endcanany
            </ul>
        </nav>
    </div>
</aside>
