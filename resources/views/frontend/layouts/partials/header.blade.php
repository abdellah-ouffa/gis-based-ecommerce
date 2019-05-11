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
                        <p>Call Us +212 (6) 692 103 15</p>
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
                                <li><a href="login-register.html">Login</a></li>
                                <li><a href="login-register.html">Register</a></li>
                                <li><a href="my-account.html">my account</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="same-style cart-wrap">
                        <button class="icon-cart">
                            <i class="pe-7s-shopbag"></i>
                            <span class="count-style">02</span>
                        </button>
                    </div>
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
                            <img alt="" src="{{ asset('front/assets/img/logo/logo.png') }}">
                        </a>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 d-none d-lg-block">
                    <div class="main-menu">
                        <nav>
                            <ul>
                                <li><a href="{{route('front.home')}}">Home</a></li>
                                <li><a href="{{route('front.allProducts')}}"> Shop</a></li>
                                <li><a href="{{route('front.about.us')}}"> About </a></li>
                                <li><a href="{{route('front.contact')}}"> Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="mobile-menu-area">
                <div class="mobile-menu">
                    <nav id="mobile-menu-active">
                        <ul class="menu-overflow">
                            <li><a href="shop.html">Collection</a></li>
                            <li><a href="about.html">About us</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>