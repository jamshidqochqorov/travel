<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="mm-{{ Request::is('agent*')||Request::is('category*')||Request::is('client*')||Request::is('transaction*')  ? 'active' : '' }}">
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="bx bx-home"></i>
                        <span key="t-dashboards">Dashboard</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @can('agent.show')
                            <li><a class="{{Request::is('agent*') ? 'active' :''}} " href="{{route('agentIndex')}}"><i class="bx bx-user"></i>Agentlar</a></li>
                        @endcan()

                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        @can('category.show')
                            <li><a class="{{Request::is('category*') ? 'active' :''}} " href="{{route('categoryIndex')}}"><i class="bx bx-bar-chart-square"></i>Category</a></li>
                        @endcan()

                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        @can('client.show')
                            <li><a class="{{Request::is('client*') ? 'active' :''}} " href="{{route('clientIndex')}}"><i class="bx bx bx-user-voice"></i>Client</a></li>
                        @endcan()

                    </ul>
                </li>

                @canany(['user.show','permission.show','roles.show'])

                    <li class="mm-{{ Request::is('permission*') || Request::is('role*') ||Request::is('user*') ? 'active' : '' }}">
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="bx bx-lock-alt"></i>
                            <span key="t-dashboards">Boshqaruv</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @can('permission.show')
                                <li><a class="{{ Request::is('permission*') ? 'active' : '' }}" href="{{route('permissionIndex')}}" > <i class="bx bx-key"></i>Ruxsatlar</a></li>
                            @endcan()
                            @can('role.show')
                                <li><a class="{{ Request::is('role*') ? 'active' : '' }}" href="{{route('roleIndex')}}" ><i class="bx bx-fingerprint"></i>Rollar</a></li>
                            @endcan()
                            @can('user.show')
                                <li><a class="{{Request::is('user*') ? 'active' :''}} " href="{{route('userIndex')}}"><i class="bx bx-user"></i>Foydalanuvchilar</a></li>
                            @endcan()

                        </ul>
                    </li>

                @endcanany()



            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
