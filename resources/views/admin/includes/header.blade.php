<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ route('admin.dashboard') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="admin-assets\images\logo.svg" alt="" height="16">
                    </span>
                    <span class="logo-lg">
                        <img src="admin-assets\images\logo.svg" alt="" height="48">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                         src="{{ $adminLogin['avatar'] ?? 'admin-assets\images\users\avatar-1.jpg' }}"
                         alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ml-1">{{ $adminLogin['name'] ?? "System Admin" }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a class="dropdown-item" href="{{ route('admin.profile') }}"><i
                            class="bx bx-user font-size-16 align-middle mr-1"></i> {{ __('admin.sidebar.profile') }}</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{ route('admin.logout') }}"><i
                            class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> {{ __('admin.button.logout') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
