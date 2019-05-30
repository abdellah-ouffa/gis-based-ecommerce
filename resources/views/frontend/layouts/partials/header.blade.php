<header class="header-area clearfix header-hm8">
    <div class="header-top-area header-padding-2">
        <div class="container-fluid">
            <div class="header-top-wap">
                <div class="language-currency-wrap">
                    <div class="same-language-currency language-style">
                        <a href="#">English </a>
                    </div>
                    <div class="same-language-currency use-style">
                        <a href="#">USD </a>
                    </div>
                    <div class="same-language-currency">
                        <p>Call Us {{ CONTACT_PAGE_PHONE_NUMBER }}</p>
                    </div>
                </div>
                <div class="header-right-wrap">
                    <div class="same-style header-search">
                        <a class="search-active" href="#"><i class="pe-7s-search"></i></a>
                        <div class="search-content">
                            <form action="#">
                                <input type="text" placeholder="Search" />
                                <button class="button-search"><i class="pe-7s-search"></i></button>
                            </form>
                        </div> 
                    </div>
                    <div class="same-style account-satting">
                        <a class="account-satting-active" href="#"><i class="pe-7s-user-female"></i></a>
                        <div class="account-dropdown">
                            <ul>
                                @guest
                                    <li><a href="{{ route('front.login') }}">Login</a></li>
                                    <li><a href="{{ route('front.register') }}">Register</a></li>
                                @else
                                    <li><a href="{{ route('front.account') }}">My account</a></li>
                                    <li><a href="{{ route('front.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                    <form id="logout-form" action="{{ route('front.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @endguest
                            </ul>
                        </div>
                    </div>
                    <div class="same-style cart-wrap">
                        <form action="{{ route('cart.index') }}">
                            <button class="icon-cart">
                                <i class="pe-7s-shopbag"></i>
                                <span class="count-style">{{ count(Cart::content()) }}</span>
                            </button>
                        </form>
                    </div>
                    <a style="margin-left: 37px;" href="{{ route('product.index') }}">Admin area</a>
                    <a style="margin-left: 37px;" href="{{ route('supplier.index') }}">Supplier area</a>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom sticky-bar header-res-padding header-padding-2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-6 col-4">
                    <div class="logo text-center">
                        <a href="index.html">
                            <img alt="" style="height: 75px;" src="{{ asset('front/assets/img/logo/logo.png') }}">
                        </a>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 d-none d-lg-block">
                    <div class="main-menu">
                        <nav>
                            <ul>
                                <li><a href="{{ route('front.home') }}">Home</a></li>
                                <li><a href="{{ route('front.allProducts') }}"> Shop</a></li>
                                <li><a href="{{ route('front.about.us' )}}"> About </a></li>
                                <li><a href="{{ route('front.contact') }}"> Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="mobile-menu-area">
                <div class="mobile-menu">
                    <nav id="mobile-menu-active">
                        <ul class="menu-overflow">
                            <li><a href="{{ route('front.home') }}">Home</a></li>
                            <li><a href="{{ route('front.allProducts') }}"> Shop</a></li>
                            <li><a href="{{ route('front.about.us' )}}"> About </a></li>
                            <li><a href="{{ route('front.contact') }}"> Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>