@include('Layout.Head')

<body >

    @include('Layout.navbar')

    <section class="slider_section slider_s_four mb-60 mt-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="slider_area slider3_carousel owl-carousel">
                        <div class="single_slider d-flex align-items-center" style="background: #ebebeb"
                            data-bgimg="{{ url('assets/img') }}/slider/valley-pine-trees-river-fox-wallpaper-preview.jpg">
                            <div class="slider_content slider_c_four color_white">
                                <h3>new Arrivals</h3>
                                <h1>summer <br> collection 2019</h1>
                                <p>discount <span> -30% off</span> this week</p>
                                <a class="button" href="{{ url('/kategori') }}/list_kategori/empty/empty/empty">DISCOVER
                                    NOW</a>
                            </div>
                        </div>
                        <div class="single_slider d-flex align-items-center"
                            data-bgimg="{{ url('assets/img') }}/slider/wallpapersden.com_astronaut-art-4k_3840x2274.jpg">
                            <div class="slider_content slider_c_four color_white">
                                <h3>popular products</h3>
                                <h1>chellphone <br> new model 2019</h1>
                                <p>discount <span> -30% off</span> this week</p>
                                <a class="button" href="{{ url('/kategori') }}/list_kategori/empty/empty/empty">DISCOVER
                                    NOW</a>
                            </div>
                        </div>
                        <div class="single_slider d-flex align-items-center"
                            data-bgimg="{{ url('assets/img') }}/slider/slide3.png">
                            <div class="slider_content slider_c_four">
                                <h3>big sale products</h3>
                                <h1>wooden minimalist <br> chair 2019</h1>
                                <p>discount <span> -30% off</span> this week</p>
                                <a class="button" href="{{ url('/kategori') }}/list_kategori/empty/empty/empty">DISCOVER
                                    NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <figure class="single_banner">
                        <div class="banner_thumb">
                            <a href="{{ url('detail/detail_barang') }}/394"><img
                                    src="{{ url('assets/img') }}/product/lenovo.svg" alt=""></a>
                        </div>
                    </figure>
                </div>
                <div class="col-lg-3">
                    <figure class="single_banner mb-30">
                        <div class="banner_thumb">
                            <a href="{{ url('detail/detail_barang') }}/9"><img
                                    src="{{ url('assets/img') }}/product/sony.svg" alt=""></a>
                        </div>
                    </figure>
                    <figure class="single_banner">
                        <div class="banner_thumb">
                            <a href="{{ url('detail/detail_barang') }}/178"><img
                                    src="{{ url('assets/img') }}/product/plantronic.svg" alt=""></a>
                        </div>
                    </figure>
                </div>
            </div>
        </div>
    </section>

    <div class="banner_area banner_style2 banner_style4 mb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <figure class="single_banner">
                        <div class="banner_thumb">
                            <a href="{{ url('/kategori') }}/list_kategori/empty/empty/empty"><img
                                    src="{{ url('assets/img') }}/product/pc.svg" alt=""></a>
                        </div>
                    </figure>
                </div>
                <div class="col-lg-6 col-md-6">
                    <figure class="single_banner">
                        <div class="banner_thumb">
                            <a href="{{ url('/kategori') }}/list_kategori/empty/empty/empty"><img
                                    src="{{ url('assets/img') }}/product/middleimage.svg" alt=""></a>
                        </div>
                    </figure>
                </div>
                <div class="col-lg-3 col-md-3">
                    <figure class="single_banner">
                        <div class="banner_thumb">
                            <a href="{{ url('/kategori') }}/list_kategori/empty/empty/empty"><img
                                    src="{{ url('assets/img') }}/product/server.svg" alt=""></a>
                        </div>
                    </figure>
                </div>
            </div>
        </div>
    </div>

    <div class="home_section_bg">
        <div class="categories_product_area mb-55">
            <div class="container">
                <div class="categories_product_inner">
                    <div class="row" id="generatekategoriBarangUtama">

                    </div>
                </div>
            </div>
        </div>

        <div class="product_area deals_product">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product_header">
                            <div class="section_title">
                                <h2>PENAWARAN TERBATAS</h2>

                            </div>
                            <div class="product_tab_btn">
                                <ul class="nav" role="tablist" id="nav-tab">
                                    <li>
                                        <span class="active" data-toggle="tab" role="tab" aria-controls="Fashion"
                                            aria-selected="true">
                                            Dapatkan sebelum waktu yang ditentukan habis
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="Fashion" role="tabpanel">
                        <div class="product_carousel product_style product_column5 owl-carousel"
                            id="generatePenawaranTerbatas">

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div id="generateSemuaBarang">

        </div>

        <div class="blog_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <figure class="single_banner mb-30">
                            <div class="banner_thumb">
                                <a href="{{ url('/kategori') }}/list_kategori/empty/empty/empty"><img
                                        src="{{ url('assets/img') }}/flashsale.svg" alt=""></a>
                            </div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>

        <div class="small_product_area mb-55">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product_header">
                            <div class="section_title">
                                <h2>REKOMENDASI PRODUK</h2>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="Fashion2" role="tabpanel">
                        <div class="product_carousel small_p_container  small_product_column3 owl-carousel"
                            id="generateRekomendasiProduk">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="small_product_area small_product_style2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="small_product_list">
                            <div class="section_title">
                                <h2 id="kategoriNamePage1">Computer & Networking</h2>
                            </div>
                            <div class="product_carousel small_p_container  product_column1 owl-carousel"
                                id="generatePage1Kategori">

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="small_product_list">
                            <div class="section_title">
                                <h2 id="kategoriNamePage2">Computer & Networking</h2>
                            </div>
                            <div class="product_carousel small_p_container  product_column1 owl-carousel"
                                id="generatePage2Kategori">

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="small_product_list">
                            <div class="section_title">
                                <h2 id="kategoriNamePage3">Computer & Networking</h2>
                            </div>
                            <div class="product_carousel small_p_container  product_column1 owl-carousel"
                                id="generatePage3Kategori">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @include('Layout.Footer')
    <script src="{{ url('assets/js') }}/dashboard.js" type="text/javascript"></script>
