<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="logo">
                    <a href="javascript:;"><img src="{{ asset('assets/images/logo.png') }}"></a>

                </div>
            </div>

            <div class="col-md-7">
                <ul class="menu">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('vendor-dashboard') }}">Vendor</a></li>
                    <li><a href="{{ route('client') }}">Client</a></li>
                    <li><a href="{{ route('job') }}">Job</a></li>
                    <li><a href="{{ route('candidate') }}">Candidate</a></li>
                    <li><a href="{{ route('team') }}">Team</a></li>
                    <li><a href="{{ route('folder') }}">Folder</a></li>
                    <li><a href="{{ route('vendor-submission') }}">Submissions</a></li> 

                    @canany('Permission access', 'Permission create', 'Permission edit', 'Permission delete')
                        <li><a href="{{ route('permission.index') }}">Permission</a></li>
                    @endcanany

                    @canany('Role access', 'Role create', 'Role edit', 'Role delete')
                        <li><a href="{{ route('role.index') }}">Role</a></li>
                    @endcanany

                    @canany('User access', 'User add', 'User edit', 'User delete')
                        <li><a href="{{ route('add-admin.index') }}">Users</a></li>
                    @endcanany
                </ul>
            </div>

            <div class="col-md-3">
                <ul class="userdata">
                    <li><a href="{{ route('dashboard') }}"><img src="{{ asset('assets/images/comment.png') }}"></a>
                    </li>

                    <li><a href="{{ route('dashboard') }}"><img
                                src="{{ asset('assets/images/notification.png') }}"></a></li>
                    <li><a href="{{ route('dashboard') }}"><img src="{{ asset('assets/images/Setting_4.png') }}"></a>
                    </li>

                    <li><a href="{{ route('dashboard') }}">
                            <span><img src="{{ asset('assets/images/Setting_4.png') }}"></span>
                            <h6>{{ Auth::user()->name ?? '' }} <small>{{ Auth::user()->user_type ?? '' }}</small></h6>
                        </a>
                    </li>

                    <li><small><a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                                {{ __('Logout') }} </a>
                        </small>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>

        </div>
    </div>
    </div>
</header>
