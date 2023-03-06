@include('Layout.Head')

<body>
    @include('Layout.navbar')
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul id="title_breadcumb">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="shop_area">
        <div class="container">
            <div class="row">

                <div class="col-lg-9 col-md-12">
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="container-breadcumb">
                                <img src="{{ url('assets/img') }}/product/kategori-banner.png" alt="Snow"
                                    class="image_breadcumb">
                                <div class="top-left-breadcumb">ALL PRODUCT IS 100% ORIGINAL</div>
                                <div class="top-left-breadcumb-hint">Feel free to get what you want</div>
                                <div class="start_lottie">
                                    <lottie-player id="lottie-player"
                                        src="https://assets9.lottiefiles.com/packages/lf20_oCWIv0.json"
                                        background="white" speed="1"
                                        style="position: absolute; width: 100%; height: 228px;" loop autoplay>
                                    </lottie-player>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="shop_toolbar_wrapper">
                        <div class="shop_toolbar_btn">
                            <button data-role="grid_4" id="buttonResetLayoutGrid" type="button"
                                class=" active btn-grid-4" data-toggle="tooltip" title="4"></button>
                            <button data-role="grid_list" id="buttonResetLayoutList" type="button" class="btn-list"
                                data-toggle="tooltip" title="List"></button>
                        </div>
                        <select class="select_costum_kategori" onchange="sortirAscDesc()" id="sortir-barang">
                            <option value="" selected disabled hidden>Urutkan nama barang</option>
                            <option value="name">Urut berdasarkan A ke Z</option>
                            <option value="-name">Urut berdasarkan Z ke A</option>
                        </select>
                        <div class="page_amount" id="page-count-kategori">

                        </div>
                    </div>
                    <div class="row no-gutters shop_wrapper" id="generateBarang">

                    </div>

                    <div class="shop_toolbar t_bottom">
                        <div class="pagination">
                            <ul id="generatePagination">

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <aside class="sidebar_widget">
                        <div class="widget_list widget_categories">
                            <h3>Product categories</h3>
                            <ul id="generateKategori">

                            </ul>
                        </div>
                        <div class="widget_list widget_filter">
                            <h3>Filter by price</h3>
                            <form action="#">
                                <div id="slider-range"></div>
                                <button type="submit">Filter</button>
                                <input type="text" name="text" id="amount" />

                            </form>
                        </div>

                        <div class="widget_list tags_widget">
                            <h3>Product tags</h3>
                            <div class="tag_cloud">
                                <a href="shop-right-sidebar.html#">blouse</a>
                                <a href="shop-right-sidebar.html#">clothes</a>
                                <a href="shop-right-sidebar.html#">fashion</a>
                                <a href="shop-right-sidebar.html#">handbag</a>
                                <a href="shop-right-sidebar.html#">laptop</a>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>

    @include('Layout.Footer')
    <script type="text/javascript"> var data = {!!json_encode($data)!!}; </script>
    <script src="{{ url('assets/js') }}/kategori.js" type="text/javascript"></script>
