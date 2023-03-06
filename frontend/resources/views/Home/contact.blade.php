@include('Layout.Head')

<body>
    @include('Layout.navbar')

    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{ url('/') }}">home</a></li>
                            <li>contact us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact_page_bg">
        <div class="contact_map">
            <div class="map-area">
                <div id="googleMap"></div>
            </div>
        </div>
        <div class="container">
            <div class="contact_area">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="contact_message content">
                            <h3>contact us</h3>
                            <p>Microdata Indonesia didirikan pada tahun 2010 sebagai penyedia jasa konsultasi di bidang
                                teknologi informasi yang berkantor di Bandar Lampung dengan tenaga ahli berjumlah 20
                                orang di bidang teknologi informasi.

                                Microdata Indonesia memiliki fokus pada pengembangan produk dan solusi teknologi
                                informasi untuk segmen perguruan tinggi, lembaga pemerintah, perusahaan penyedia jasa
                                transportasi dan logistik, serta industri business. Layanan yang berfokus pada 4 segmen
                                utama tersebut selanjutnya didefinisikan sebagai Microdata Solution, yaitu solusi
                                berbasis sistem dan teknologi informasi guna mewujudkan sebuah kota cerdas dengan ciri
                                less paper, less time, less cash dan less complexity untuk meningkatkan tatanan hidup
                                masyarakat.

                                Pada segmen business, Microdata Indonesia mengembangkan produk-produk aplikasi back-end
                                dan front-end untuk beberapa sub industri diantaranya taman hiburan dan wisata, pusat
                                belanja dan entertainment, microfinance, dan industri kesehatan.</p>
                            <ul>
                                <li><i class="fa fa-fax"></i> Address : Jl. Endro Suratmin No.53f, Way Dadi, Kec.
                                    Sukarame, Kota Bandar Lampung,, Lampung 35131.</li>
                                <li><i class="fa fa-phone"></i> <a href="{{ url('/') }}">+62 8118 8808 53</a></li>
                                <li><i class="fa fa-envelope-o"></i> http://microdataindonesia.co.id/</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script
        src="https://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.22&key=AIzaSyChs2QWiAhnzz0a4OEhzqCXwx_qA9ST_lE">
    </script>
    <script src="https://www.google.com/jsapi"></script>
    <script src="{{ url('assets/js') }}/map.js"></script>

    @include('Layout.Footer')
