<ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                <li>{!! link_to('auth/login', 'Login') !!}</li>
                <li>{!! link_to('auth/register', 'Register') !!}</li>
                @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Hello, {{  ucfirst(Auth::user()->first_name) }} <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        @if(Auth::user()->role_id!='3')
                        <li>{!! link_to('users', 'Dashboard') !!}</li>
                        <li>{!! link_to('roles', 'Assign Role') !!}</li>
                        @endif
                        <li>{!! link_to_route('user.show', "View Your Profile", Auth::user()->id) !!}</li>
                        <li>{!! link_to('reports/create', 'Submit Report') !!}</li>
                        <li>{!! link_to('reports', 'Users Reports') !!}</li>
                        <li>{!! link_to('auth/logout', 'Logout') !!}</li>
                    </ul>
                </li>
                @endif
            </ul>