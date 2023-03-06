@include('Layout.Head')

<body>
    @include('Layout.navbar')

    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul id="title_breadcumb_detail">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="product_page_bg">
        <div class="container">
            <div class="product_details_wrapper mb-55">
                <div class="product_details">
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <div class="product-details-tab">
                                <div id="img-1" class="zoomWrapper single-zoom">
                                    <a href="#/" id="image-detail-main">
                                        <box style="width: 100% !important; height: 500px !important;" class="shine">
                                        </box>
                                    </a>
                                </div>
                                <div class="single-zoom-thumb">
                                    <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="product_d_right">
                                <form action="#">

                                    <h3 class="namabarang-detail"><a id="namaBarang">
                                            <lines class="shine"></lines>
                                        </a></h3>

                                    <div class="price_box">
                                        <span class="current_price" id="hargaBarang">
                                            <lines class="shine"></lines>
                                        </span>
                                    </div>

                                    <div class="border-divider"></div>

                                    <div class="product_desc">
                                        <span class="title-deskripsi">Deskripsi: </span>
                                        <div class="row mt-2" id="shortDescription">
                                            <lines class="shine"></lines>
                                            <br><br>
                                            <lines class="shine"></lines>
                                            <br><br>
                                            <lines class="shine"></lines>
                                            <br>
                                            <lines class="shine"></lines>
                                            <br><br>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <span class="content-detail-title">Garansi:</span>
                                        </div>
                                        <div class="col-md-10">
                                            <span class="content-detail-main" id="garansi">
                                                <lines class="shine"></lines>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-2">
                                            <span class="content-detail-title">Jenis Barang:</span>
                                        </div>
                                        <div class="col-md-10">
                                            <span class="content-detail-main" id="jenisbarang">
                                                <lines class="shine"></lines>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-2">
                                            <span class="content-detail-title">Kategori:</span>
                                        </div>
                                        <div class="col-md-10">
                                            <span class="content-detail-main" id="kategori">
                                                <lines class="shine"></lines>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="border-divider"></div>

                                    <div class="product_desc">
                                        <span class="title-deskripsi">Include: </span>
                                        <div class="row mt-2" id="include">
                                            <lines class="shine"></lines>
                                        </div>
                                    </div>

                                    <div class="product_desc">
                                        <span class="title-deskripsi">Exclude: </span>
                                        <div class="row mt-2" id="exclude">
                                            <lines class="shine"></lines>
                                        </div>
                                    </div>

                                    <div class="product_variant quantity">
                                        <label>quantity</label>
                                        <input id="jumlah" min="1" max="100" value="1" type="number">
                                        <button class="button" type="button" onclick="cartClick()">add to cart</button>

                                    </div>

                                    <div class="border-divider"></div>

                                    <div class="row mt-2">
                                        <div class="col-md-2">
                                            <span class="content-detail-title">Total:</span>
                                        </div>
                                        <div class="col-md-10">
                                            <span class="content-detail-price-main" id="total"></span>
                                        </div>
                                    </div>
                                    <div class="border-divider"></div>
                                </form>
                                <div class="priduct_social">
                                    <ul>
                                        <li><a class="facebook" href="https://id-id.facebook.com/" title="facebook"><i
                                                    class="fa fa-facebook"></i> Like</a></li>
                                        <li><a class="twitter" href="https://twitter.com/" title="twitter"><i
                                                    class="fa fa-twitter"></i> tweet</a></li>
                                        <li><a class="pinterest" href="https://id.pinterest.com/" title="pinterest"><i
                                                    class="fa fa-pinterest"></i> save</a></li>
                                        <li><a class="google-plus" href="https://myaccount.google.com/"
                                                title="google +"><i class="fa fa-google-plus"></i> share</a></li>
                                        <li><a class="linkedin" href="linkedin.com" title="linkedin"><i
                                                    class="fa fa-linkedin"></i> linked</a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="product_d_info">
                    <div class="row">
                        <div class="col-12">
                            <div class="tabs">
                                <input type="radio" name="tabs" id="tabone" checked="checked">
                                <label for="tabone">Deskripsi</label>
                                <div class="tab" id="generateLongdeskripsi">
                                    <box style="width: 100% !important; height: 500px !important;" class="shine"></box>
                                </div>

                                <input type="radio" name="tabs" id="tabtwo">
                                <label for="tabtwo">Spesifikasi</label>
                                <div class="tab">
                                    <div class="row" id="generateSpesifikasi">
                                        <box style="width: 100% !important; height: 500px !important;" class="shine">
                                        </box>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section class="product_area related_products">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title">
                            <h2>PRODUK YANG SERUPA </h2>
                        </div>
                    </div>
                </div>
                <div class="product_carousel product_style product_column5 owl-carousel" id="generateProdukSerupa">

                </div>

            </section>

        </div>
    </div>

    @include('Layout.Footer')
    <script type="text/javascript"> var idBarang = {!!json_encode($data)!!}; </script>
    <script src="{{ url('assets/js') }}/detail.js" type="text/javascript"></script>
