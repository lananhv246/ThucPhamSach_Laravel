<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
        <span class="fa fa-user-circle-o"></span>{{ Auth::guard('admin')->user()->name }} <span class="caret"></span>
    </a>
    <ul class="dropdown-menu" role="menu" style="text-align: center">
        <li><a href="/admin"><span class="fa fa-user-circle-o"></span>Trang Quản Trị</a></li>
        <li><a href="{{route('admins.show',[Auth::id()])}}" ><span class="fa fa-user-circle-o"></span>Trang Cá Nhân</a> </li>
        <li>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <span class="fa fa-sign-out"></span>
                Logout
            </a>

            <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
</li>
