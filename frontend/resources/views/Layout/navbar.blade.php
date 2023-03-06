<div class="off_canvars_overlay"></div>
<div class="Offcanvas_menu">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="canvas_open canvas4_open">
                    <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                </div>
                <div class="Offcanvas_menu_wrapper">
                    <div class="canvas_close">
                        <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                    </div>
                    <div class="antomi_message">
                        <p>Get free shipping – Free sasddas30 day money back guarantee</p>
                    </div>
                    <div class="header_top_settings text-right">
                        <ul>
                            <li><a href="https://www.google.co.id/maps/place/PT.MICRODATA+INDONESIA+%7C+SOFTWARE+DEVELOPER/@-5.3832723,105.2941434,17z/data=!3m1!4b1!4m5!3m4!1s0x2e40dac03d097843:0x6bb59f4ba9a84e8c!8m2!3d-5.3832723!4d105.2963321"
                                    target="__blank">Store Locations</a></li>
                            <li><a href="https://www.jne.co.id/en/tracking/trace" target="__blank">Track Your Order</a>
                            </li>
                            <li>Hotline: <a href="tel:+628118880853">+62 8118 8808 53</a></li>
                            <li>Quality Guarantee Of Products</li>
                        </ul>
                    </div>
                    <div class="search_container">
                        <form action="javascript:search()" onSubmit="search()">
                            <div class="search_box">
                                <input id="search-query" placeholder="Search product..." type="search">
                                <button type="submit" onclick="search()">Search</button>
                            </div>
                        </form>
                    </div>
                    <div id="menu" class="text-left ">
                        <ul class="offcanvas_main_menu">
                            <li class="menu-item-has-children">
                                <a href="http://microdataindonesia.co.id/">Microdata Indonesia</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="{{ url('/login') }}">Login</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="{{ url('/about') }}">About Us</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="{{ url('/contact') }}"> Contact Us</a>
                            </li>
                        </ul>
                    </div>
                    <div class="Offcanvas_footer">
                        <span><a href="index-4.html#"><i class="fa fa-envelope-o"></i>
                                microdataindonesia@gmail.com</a></span>
                        <ul>
                            <li class="facebook"><a href="index-4.html#"><i class="fa fa-facebook"></i></a></li>
                            <li class="twitter"><a href="index-4.html#"><i class="fa fa-twitter"></i></a></li>
                            <li class="pinterest"><a href="index-4.html#"><i class="fa fa-pinterest-p"></i></a></li>
                            <li class="google-plus"><a href="index-4.html#"><i class="fa fa-google-plus"></i></a></li>
                            <li class="linkedin"><a href="index-4.html#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<header>
    <div class="main_header header_four">
        <div class="container">
            <div class="header_top">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-5">
                        <div class="antomi_message">
                            <p>Get free shipping – Free 30 day money back guarantee</p>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="header_top_settings text-right">
                            <ul>
                                <li><a href="https://www.google.co.id/maps/place/PT.MICRODATA+INDONESIA+%7C+SOFTWARE+DEVELOPER/@-5.3832723,105.2941434,17z/data=!3m1!4b1!4m5!3m4!1s0x2e40dac03d097843:0x6bb59f4ba9a84e8c!8m2!3d-5.3832723!4d105.2963321"
                                        target="__blank">Store Locations</a></li>
                                <li><a href="https://www.jne.co.id/en/tracking/trace" target="__blank">Track Your
                                        Order</a></li>
                                <li>Hotline: <a href="tel:+628118880853">+62 8118 8808 53</a></li>
                                <li>Quality Guarantee Of Products</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="header_middle header_middle_style4">
                <div class="row align-items-center">
                    <div class="column1 col-lg-3 col-md-3 col-4">
                        <div class="logo-main">
                            <a href="{{ url('/') }}"><img src="{{ url('assets/img') }}/logo/logo.svg" alt=""></a>
                        </div>
                    </div>
                    <div class="column2 col-lg-6 col-md-12">
                        <div class="search_container">
                            <form action="javascript:search()" onSubmit="search()">
                                <div class="search_box">
                                    <input id="search-query-mobile" placeholder="Search product..." type="search">
                                    <button type="submit" onclick="search()">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="column3 col-lg-3 col-md-7 col-6">
                        <div class="header_configure_area header_configure_four">
                            <div class="header_wishlist">
                                <a onclick="openFavoriteItem()"><i class="ion-android-favorite-outline"></i>
                                    <span class="wishlist_count" id="favorite-count-first">0</span>
                                </a>
                            </div>
                            <div class="mini_cart_wrapper">
                                <a onclick="opencartItem()">
                                    <i class="fa fa-shopping-bag"></i>
                                    <span class="cart_price">&emsp;</i></span>
                                    <span class="cart_count" id="cart-count-first">0</span>

                                </a>
                                <div class="mini_cart" id="mini_cart">
                                    <div class="cart_close">
                                        <div class="cart_text">
                                            <h3>cart</h3>
                                        </div>
                                        <div class="mini_cart_close">
                                            <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                                        </div>
                                    </div>
                                    <div id="generateCartItems"></div>


                                    <div class="mini_cart_table">
                                        <div class="cart_total mt-10">
                                            <span>total:</span>
                                            <span class="price" id="totalCartFirst"></span>
                                        </div>
                                    </div>
                                    <div class="mini_cart_footer">
                                        <div class="cart_button">
                                            <a href="cart.html">View cart</a>
                                        </div>
                                        <div class="cart_button">
                                            <a class="active" href="checkout.html">Checkout</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="header_middle sticky_header_four sticky-header">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-6">
                        <div class="logo-sticky-main">
                            <a href="{{ url('/') }}"><img class="logo-dark-main-login"
                                    src="{{ url('assets/img') }}/logo/logo-dark.svg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="main_menu menu_position text-center">
                            <nav>
                                <ul>
                                    <li><a href="http://microdataindonesia.co.id/" target="__blank">MICRODATA
                                            INDONESIA</a></li>
                                    <li class="mega_items"><a href="shop.html">all kategories<i
                                                class="fa fa-angle-down"></i></a>
                                        <div class="mega_menu">
                                            <ul class="mega_menu_inner" id="generateJenisBarangHover">

                                            </ul>
                                        </div>
                                    </li>

                                    <li><a href="{{ url('/login') }}">LOGIN</a></li>
                                    <li><a href="{{ url('/about') }}">About Us</a></li>
                                    <li><a href="{{ url('/contact') }}"> Contact Us</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="header_configure_area">
                            <div class="header_wishlist">
                                <a onclick="openFavoriteItem()"><i class="ion-android-favorite-outline"></i>
                                    <span class="wishlist_count" id="favorite-count-second">0</span>
                                </a>
                            </div>
                            <div class="mini_cart_wrapper">
                                <a onclick="opencartItem()">
                                    <i class="fa fa-shopping-bag"></i>
                                    <span class="cart_price">&emsp;</span>
                                    <span class="cart_count" id="cart-count-second">0</span>

                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header_bottom">
                <div class="row align-items-center">
                    <div class="column1 col-lg-3 col-md-6">
                        <div class="categories_menu categories_four">
                            <div class="categories_title">
                                <h2 class="categori_toggle">SEMUA JENIS BARANG</h2>
                            </div>
                            <div class="categories_menu_toggle">
                                <ul id="generateJenisBarang">
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="column2 col-lg-6 ">
                        <div class="main_menu menu_four menu_position text-center">
                            <nav>
                                <ul>
                                    <li><a href="http://microdataindonesia.co.id/" target="__blank">MICRODATA
                                            INDONESIA</a></li>
                                    <li><a href="{{ url('/login') }}">LOGIN</a></li>
                                    <li><a href="{{ url('/about') }}">About Us</a></li>
                                    <li><a href="{{ url('/contact') }}"> Contact Us</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="column3 col-lg-3 col-md-6">
                        <div class="header_bigsale h_bigsale_four">
                            <a href="index-4.html#">BIG SALE BLACK FRIDAY</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
