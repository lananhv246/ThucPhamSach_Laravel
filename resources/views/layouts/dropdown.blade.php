<!--dropdown -->
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
        <span class="fa fa-user-circle-o"></span>{{ Auth::user()->name }}
    </a>

    <ul class="dropdown-menu" role="menu" style="text-align: center">
        <li style="margin-top: 20px;"><a href="{{route('users.show',[Auth::id()])}}" class="btn btn-sm green btn-danger"><span class="fa fa-user-circle-o green"></span>Trang Cá Nhân</a> </li>
        <li style="margin-top: 20px;">
            <a href="{{ route('logout') }}" class="btn btn-sm red btn-danger"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <span class="fa fa-sign-out red"></span>
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
</li>