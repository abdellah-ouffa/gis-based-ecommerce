<nav class="navbar navbar-default navbar-fixed-top am-top-header">
    <div class="container-fluid">
        <div class="navbar-header">
            <div class="page-title"><span>Blank Page</span></div>
            <a href="#" class="am-toggle-left-sidebar navbar-toggle collapsed"><span class="icon-bar"><span></span><span></span><span></span></span></a><a href="index.html" class="navbar-brand"></a>
        </div>
        <div id="am-navbar-collapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav am-user-nav">
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><img src="assets/img/avatar.jpg"><span class="user-name">Samantha Amaretti</span><span class="angle-down s7-angle-down"></span></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a href="#"> <span class="icon s7-user"></span>My profile</a></li>
                        <li>
                            <a  class="nav-link" href="{{ route('backend.logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><span class="icon s7-power"></span> Logout</a>
                            <form id="logout-form" action="{{ route('backend.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>