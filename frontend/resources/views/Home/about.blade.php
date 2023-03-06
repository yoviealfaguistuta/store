@include('Layout.Head')

<body>

    @include('Layout.navbar')
    <div class="about_bg_area">
        <div class="container">
            <section class="about_section mb-60">
                <div class="row align-items-center">
                    <div class="col-12">
                        <figure>
                            <div class="about_thumb">
                                <img src="{{ url('assets/img') }}/about/image.svg" alt="">
                            </div>
                            <figcaption class="about_content">
                                <h1>We are a digital agency focused on delivering content and utility user-experiences.
                                </h1>
                                <p>Microdata Indonesia is one of the few IT system integration, professional service and
                                    software development companies based in Bandar lampung, Lampung - Indonesia that
                                    works with Enterprise systems and companies. As a privately owned company, Microdata
                                    Indonesia provides IT Consultancy, software design and development as well as
                                    professional.</p>
                                <div class="about_signature">
                                    <img src="assets/img/about/about-us-signature.png" alt="">
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </section>

            <div class="choseus_area" data-bgimg="{{ url('assets/img') }}/about/about-us-policy-bg.jpg">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="single_chose">
                            <div class="chose_icone">
                                <img class="icon-about-costum" src="{{ url('assets/img') }}/about/idea.svg" alt="">
                            </div>
                            <div class="chose_content">
                                <h3>Business Innovative ideas</h3>
                                <p>Identifying and prioritizing opportunities, to moving concepts through the pipeline,
                                    there’s no magic formula for success.</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="single_chose">
                            <div class="chose_icone">
                                <img class="icon-about-costum" src="{{ url('assets/img') }}/about/tech.svg" alt="">
                            </div>
                            <div class="chose_content">
                                <h3>Latest Technologies</h3>
                                <p>Microdata Indonesia has a rich experience in developing and deploying desktop and
                                    mobile software solutions.</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="single_chose">
                            <div class="chose_icone">
                                <img class="icon-about-costum" src="{{ url('assets/img') }}/about/success.svg" alt="">
                            </div>
                            <div class="chose_content">
                                <h3>Successful Project</h3>
                                <p>Microdata Indonesia have experience in developing and supporting large web-based
                                    applications using latest web technologies.</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="about_gallery_section mb-55">
                <div class="row">
                    <div class="row">
                        <div class="col-lg-12 col-md-4">
                            <article class="single_gallery_section">
                                <figure>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-4 mt-5">
                                            <figcaption class="about_gallery_content">
                                                <h3>Currently</h3>
                                                <p>Hasil kerja Microdata Indoneisa yang memuaskan pun dengan cepat
                                                    mendapat perhatian dari perusahaan-perusahan besar. Portofolio klien
                                                    kami juga semakin bervariasi. Kami bangga memiliki cakupan pelanggan
                                                    yang terdiri dari sejumlah perusahaan digital serta
                                                    perusahaan-perusahaan tradisional sehinggi Microdata Indoneisa
                                                    memperluas cakupan bidang bisnis tidak hanya berfokus di bidang
                                                    teknologi informasi tetapi juga di bidang advertising karna pada era
                                                    digital seperti saat ini sangat erat hubunganya antara teknologi dan
                                                    advertising. Solusi yang kami berikan saat ini adalah :</p>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-4">
                                                        <ul>
                                                            <li>
                                                                <ion-icon name="ellipse"></ion-icon>Consultan Teknologi
                                                                Informasi
                                                            </li>
                                                            <li>
                                                                <ion-icon name="ellipse"></ion-icon>Consultan Networking
                                                            </li>
                                                            <li>
                                                                <ion-icon name="ellipse"></ion-icon>Design Grafis
                                                            </li>
                                                            <li>
                                                                <ion-icon name="ellipse"></ion-icon>Commercial
                                                                Photography
                                                            </li>
                                                            <li>
                                                                <ion-icon name="ellipse"></ion-icon>Web Design
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-6 col-md-4">
                                                        <ul>
                                                            <li>
                                                                <ion-icon name="ellipse"></ion-icon>Software Developer
                                                            </li>
                                                            <li>
                                                                <ion-icon name="ellipse"></ion-icon>Mobile App Developer
                                                            </li>
                                                            <li>
                                                                <ion-icon name="ellipse"></ion-icon>Arsitektur
                                                            </li>
                                                            <li>
                                                                <ion-icon name="ellipse"></ion-icon>Event Organizer
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-lg-6 col-md-4 mt-5">
                                            <div class="gallery_thumb">
                                                <img class="image-about-history"
                                                    src="{{ url('assets/img') }}/about/currently.svg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    </figcaption>
                        </div>
                        </figure>
                        </article>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-4 mt-5">
                        <article class="single_gallery_section">
                            <figure>
                                <div class="row">
                                    <div class="col-lg-6 col-md-4 mt-5">
                                        <div class="gallery_thumb">
                                            <img class="image-about-history"
                                                src="{{ url('assets/img') }}/about/history.svg" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-4 mt-5">
                                        <figcaption class="about_gallery_content">
                                            <h3>History Of Us</h3>
                                            <p>Microdata Indonesia didirikan pada tahun 2010 sebagai penyedia jasa
                                                konsultasi di bidang teknologi informasi yang berkantor di Bandar
                                                Lampung dengan tenaga ahli berjumlah 20 orang di bidang teknologi
                                                informasi.

                                                Microdata Indonesia memiliki fokus pada pengembangan produk dan solusi
                                                teknologi informasi untuk segmen perguruan tinggi, lembaga pemerintah,
                                                perusahaan penyedia jasa transportasi dan logistik, serta industri
                                                business. Layanan yang berfokus pada 4 segmen utama tersebut selanjutnya
                                                didefinisikan sebagai Microdata Solution, yaitu solusi berbasis sistem
                                                dan teknologi informasi guna mewujudkan sebuah kota cerdas dengan ciri
                                                less paper, less time, less cash dan less complexity untuk meningkatkan
                                                tatanan hidup masyarakat.

                                                Pada segmen business, Microdata Indonesia mengembangkan produk-produk
                                                aplikasi back-end dan front-end untuk beberapa sub industri diantaranya
                                                taman hiburan dan wisata, pusat belanja dan entertainment, microfinance,
                                                dan industri kesehatan.</p>
                                        </figcaption>
                                    </div>
                                </div>
                            </figure>
                        </article>
                    </div>
                </div>
            </div>
        </div>

        <div class="faq-client-say-area">
            <div class="row">
                <div class="col-lg-12 col-md-6">
                    <div class="testimonials-area">
                        <div class="testimonial-two owl-carousel">
                            <div class="testimonial-wrap-two text-center">
                                <div class="quote-container">
                                    <div class="quote-image">
                                        <img src="assets/img/about/testimonial1.jpg" alt="">
                                    </div>
                                    <div class="testimonials-text">
                                        <p>Support and response has been amazing, helping me with several issues I came
                                            across and got them solved almost the same day. A pleasure to work with
                                            them!</p>
                                    </div>
                                    <div class="author">
                                        <h6>Kathy Young</h6>
                                        <p>CEO of SunPark</p>
                                    </div>

                                </div>
                            </div>
                            <div class="testimonial-wrap-two text-center">
                                <div class="quote-container">
                                    <div class="quote-image">
                                        <img src="assets/img/about/testimonial2.jpg" alt="">
                                    </div>
                                    <div class="testimonials-text">
                                        <p>Support and response has been amazing, helping me with several issues I came
                                            across and got them solved almost the same day. A pleasure to work with
                                            them!</p>
                                    </div>
                                    <div class="author">
                                        <h6>Kathy Young</h6>
                                        <p>CEO of SunPark</p>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-wrap-two text-center">
                                <div class="quote-container">
                                    <div class="quote-image">
                                        <img src="assets/img/about/testimonial3.jpg" alt="">
                                    </div>
                                    <div class="testimonials-text">
                                        <p>Support and response has been amazing, helping me with several issues I came
                                            across and got them solved almost the same day. A pleasure to work with
                                            them!</p>
                                    </div>
                                    <div class="author">
                                        <h6>Kathy Young</h6>
                                        <p>CEO of SunPark</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    @include('Layout.Footer')
