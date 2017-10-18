<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guard('admin')->user())
                    @include ('admin.admin_dropdown')
                @elseif(! Auth::guest())
                    @include('auth.dropdown')
                @else
                    <li><a href="{{ url('/login') }}">
                            <span class="fa fa-sign-in ">ĐĂNG NHẬP</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/register') }}">
                            <span class="fa fa-registered ">ĐĂNG KÝ</span>
                        </a>
                    </li>
                    <!--dropdown -->
                @endif
            </ul>
        </div>
    </div>
</nav>