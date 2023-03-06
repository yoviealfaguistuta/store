

function getPenawaranTerbatas() {
    $.ajax({
        data: "",
        url: ServeUrl + "/barang?page=9&per-page=6",
        method: 'GET',
        complete: function(response) {
            console.log('response.responseJSON.items :>> ', response);
            if (response.status == 200) {
                
               
                var penawaranTerbatas = '';
                for (let i = 0; i < response.responseJSON.items.length; i++) {

                    penawaranTerbatas += '<article class="single_product">';
                    penawaranTerbatas += '<figure>';

                    penawaranTerbatas += '<div class="product_thumb">';

                    if (response.responseJSON.items[i].images != null && response.responseJSON.items[i].images.length > 0) {
                        penawaranTerbatas += '<a class="primary_img" href="'+ BaseUrl + '/detail/detail_barang/'+ response.responseJSON.items[i].id +'"><img  src="'+response.responseJSON.items[i].images[0].original+'" alt=""></a>';
                    }

                    if (response.responseJSON.items[i].images != null && response.responseJSON.items[i].images.length > 1) {
                        penawaranTerbatas += '<a class="secondary_img" href="'+ BaseUrl + '/detail/detail_barang/'+ response.responseJSON.items[i].id +'"><img src="'+response.responseJSON.items[i].images[1].original+'" alt=""></a>';
                    }
                    penawaranTerbatas += '<div class="label_product">';
                    penawaranTerbatas += '<span class="label_sale">Sale</span>';
                    penawaranTerbatas += '</div>';
                    penawaranTerbatas += '<div class="action_links">';
                    penawaranTerbatas += '<ul>';
                    var idRandom = Math.floor(Math.random() * 10000);
                    penawaranTerbatas += '<li class="wishlist"><input value='+response.responseJSON.items[i].id+' id="data-favorite-'+idRandom+'" type="hidden" name='+idRandom+'  /><a id="click-favorite-'+idRandom+'"  onclick="favorite(this)" data="'+response.responseJSON.items[i]+'" class="click-favorites"><img class="icon-item-costum-like-home image-favorite-'+idRandom+'" src="'+BaseUrl+'/assets/img/icon/like-hover.svg" alt="like" /></a></li>';
                    penawaranTerbatas += '<li class="compare"><a><img class="icon-item-costum-compare-home" src="'+BaseUrl+'/assets/img/icon/compare-hover.svg" alt="compare" /></a></li>';
                    penawaranTerbatas += '<li class="quick_button"><input value='+response.responseJSON.items[i].id+' id="data-cart-'+idRandom+'" type="hidden" name='+idRandom+'  /><a id="click-cart-'+idRandom+'"  onclick="cart(this)" data="'+response.responseJSON.items[i]+'" class="click-cart"><img class="icon-item-costum-cart-home image-cart-'+idRandom+'" src="'+BaseUrl+'/assets/img/icon/cart-hover.svg" alt="like" /></a></li>';

                    penawaranTerbatas += '</ul>';
                    penawaranTerbatas += '</div>';
                    penawaranTerbatas += '</div>';
                    penawaranTerbatas += '<div class="product_content">';
                    penawaranTerbatas += '<div class="product_content_inner">';
                    penawaranTerbatas += '<h4 class="product_name" style="height: 50px;><a href="'+ BaseUrl + '/detail/detail_barang/'+ response.responseJSON.items[i].id +'">'+response.responseJSON.items[i].name+'</a></h4>';
                    penawaranTerbatas += '<div class="price_box">';
                    penawaranTerbatas += '<span class="old_price">'+formatRupiah(response.responseJSON.items[i].price, "Rp. ")+'</span>';
                    penawaranTerbatas += '<span class="current_price">'+formatRupiah(response.responseJSON.items[i].price - 100000, "Rp. ")+'</span>';
                    penawaranTerbatas += '</div>';
                    penawaranTerbatas += '<div class="countdown_text">';
                    penawaranTerbatas += '<p><span>Hurry Up!</span> Offers ends in: </p>';
                    penawaranTerbatas += '</div>';
                    penawaranTerbatas += '<div class="product_timing">';
                    penawaranTerbatas += '<div data-countdown="2021/12/15"></div>';
                    penawaranTerbatas += '</div>';
                    penawaranTerbatas += '</div>';
                    penawaranTerbatas += '<div class="add_to_cart">';
                    penawaranTerbatas += '<a href="'+ BaseUrl + '/kategori/list_kategori/empty/empty/empty'+'" title="Checkout">Checkout</a>';
                    penawaranTerbatas += '</div>';

                    penawaranTerbatas += '</div>';
                    penawaranTerbatas += '</figure>';
                    penawaranTerbatas += '</article>';
                }

                $('#generatePenawaranTerbatas').html(penawaranTerbatas);

               
                var simple = $('.product_column5');
                simple.owlCarousel('destroy');
                
                 /*---product column5 activation---*/
                $('.product_column5').on('changed.owl.carousel initialized.owl.carousel', function (event) {
                    $(event.target).find('.owl-item').removeClass('last').eq(event.item.index + event.page.size - 1).addClass('last')}).owlCarousel({
                    autoplay: true,
                    loop: true,
                    nav: true,
                    autoplay: false,
                    autoplayTimeout: 8000,
                    items: 5,
                    dots:false,
                    navText: ['<i class="ion-ios-arrow-back"></i>','<i class="ion-ios-arrow-forward"></i>'],
                    responsiveClass:true,
                    responsive:{
                            0:{
                            items:1,
                        },
                        768:{
                            items:3,
                        },
                        992:{
                            items:4,
                        },
                    1200:{
                            items:5,
                        },

                    }
                });
                
                function checkClasses(){
                    var total = $('.product_column5 .owl-stage .owl-item.active').length;
                    
                    $(".product_column5").each(function(){
                        $(this).find('.owl-item').removeClass('firstActiveItem');
                        $(this).find('.owl-item').removeClass('lastActiveItem');
                        $(this).find('.owl-item.active').each(function(index){
                            if (index === 0) { $(this).addClass('firstActiveItem'); }
                            if (index === total - 1 && total > 1) {
                                $(this).addClass('lastActiveItem');
                            }
                        });  
                    });
                }
                checkClasses();
              
                $('[data-countdown]').each(function() {
                    var $this = $(this), finalDate = $(this).data('countdown');
                    $this.countdown(finalDate, function(event) {
                    $this.html(event.strftime('<div class="countdown_area"><div class="single_countdown"><div class="countdown_number">%D</div><div class="countdown_title">days</div></div><div class="single_countdown"><div class="countdown_number">%H</div><div class="countdown_title">hours</div></div><div class="single_countdown"><div class="countdown_number">%M</div><div class="countdown_title">mins</div></div><div class="single_countdown"><div class="countdown_number">%S</div><div class="countdown_title">secs</div></div></div>'));     
                           
                   });
                });	

                
            } else if (response.status == 401) {
                e('info', '401 server conection error');
            } else if (response.status == 404) {
                
            }
        },
        dataType: 'json'
    })

};
getPenawaranTerbatas();

function formatRupiah(itemTotal, prefix) {
        
    var number_string = itemTotal.toString().replace(/[^,\d]/g, ""),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        sub_total = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
        separator = sisa ? "." : "";
        sub_total += separator + ribuan.join(".");
    }
    
    sub_total = split[1] != undefined ? sub_total + "," + split[1] : sub_total;
    return prefix == undefined ? sub_total : sub_total ? "Rp. " + sub_total : "";
}

var semuaBarang = '';
var incerementHelper2 = 0;
var closeSection = false;

function getSemuaJenisBarang() {

    $.ajax({
        data: "",
        url: ServeUrl + "/barang?page=8&per-page=10",
        method: 'GET',
        complete: function(response) {
            if (response.status == 200) {
                
                console.log('response.responseJSON.itemssss', response.responseJSON.items)
                var checkKategori = '';

                semuaBarang += '<div class="home_section_style4">';
                semuaBarang += '<div class="container">';
                
                semuaBarang += '<div class="row">';
                semuaBarang += '<div class="col-12">';
                semuaBarang += '<div class="section_title s_title_style3">';
                semuaBarang += '<h2>PRODUK PALING LARIS</h2>';
                semuaBarang += '</div>';
                semuaBarang += '</div>';
                semuaBarang += '</div>';

                
                semuaBarang += '<div class="home_style4_inner">';
                semuaBarang += '<div class="row no-gutters">';
                semuaBarang += '<div class="col-lg-2">';
                semuaBarang += '<div class="category_menu">';
                semuaBarang += '<div class="category_menu_content">';
                semuaBarang += '<ul>';

                for (let i = 0; i < response.responseJSON.items.length; i++) {
                    if (checkKategori.includes(response.responseJSON.items[i].kategoriName, 0) === false) {
                        semuaBarang += '<li><a href="'+ BaseUrl + '/kategori/list_kategori/empty/empty/' + response.responseJSON.items[i].kategori_id + '">'+response.responseJSON.items[i].kategoriName+'</a></li>';
                        checkKategori = checkKategori + response.responseJSON.items[i].kategoriName;
                    }
                }

                semuaBarang += '</ul>';
                semuaBarang += '</div>';

                semuaBarang += '<div class="category_menu_img">';
                semuaBarang += '<img src="assets/img/icon/categori-menu1.png" alt="">';
                semuaBarang += '</div>';
                semuaBarang += '</div>';
                semuaBarang += '</div>';
                semuaBarang += '<div class="col-lg-4">';
                semuaBarang += '<figure class="single_banner">';
                semuaBarang += '<div class="banner_thumb">';
                semuaBarang += '<a href="shop.html"><img src="assets/img/bg/banner12.jpg" alt=""></a>';
                semuaBarang += '</div>';
                semuaBarang += '</figure>';
                semuaBarang += '</div>';
                semuaBarang += '<div class="col-lg-6">';
                        
                semuaBarang += '<div class="product_area">';
                semuaBarang += '<div class="product_carousel product_style product_column3 owl-carousel">';

                var pisahBarang = response.responseJSON.items.length / 2;
                var barang1 = [];
                var barang2 = [];

                for (let q = 0; q < pisahBarang; q++) {
                    
                    barang1[q] = response.responseJSON.items[q];
                    
                }
                
                var incBrang2 = 0;
                for (let incHelperPisah = pisahBarang; incHelperPisah < response.responseJSON.items.length; incHelperPisah++) {
                    
                    barang2[incBrang2] = response.responseJSON.items[incHelperPisah];
                    incBrang2++;
                }
                

                for (let i = 0; i < pisahBarang; i++) {
                 
                    semuaBarang += '<div class="product_items">';
  
                        semuaBarang += '<article class="single_product">';
                        semuaBarang += '<figure>';
                        semuaBarang += '<div class="product_thumb">';

                        if (response.responseJSON.items[i].images != null && response.responseJSON.items[i].images.length > 0) {
                            semuaBarang += '<a class="primary_img" href="'+ BaseUrl + '/detail/detail_barang/'+ barang1[i].id +'"><img style="width: 217px; height: 217px;" src="'+barang1[i].images[0].original+'" alt=""></a>';
                        }
    
                        if (response.responseJSON.items[i].images != null && response.responseJSON.items[i].images.length > 1) {
                            semuaBarang += '<a class="secondary_img" href="'+ BaseUrl + '/detail/detail_barang/'+ barang1[i].id +'"><img style="width: 217px; height: 217px;" src="'+barang1[i].images[1].original+'" alt=""></a>';
                        }
                        
                        semuaBarang += '<div class="label_product">';
                        semuaBarang += '<span class="label_sale">Sale</span>';
                        semuaBarang += '</div>';
                        semuaBarang += '<div class="action_links">';
                        semuaBarang += '<ul>';

                        var idRandom = Math.floor(Math.random() * 10000);
                        semuaBarang += '<li class="wishlist"><input value='+barang1[i].id+' id="data-favorite-'+idRandom+'" type="hidden" name='+idRandom+'  /><a id="click-favorite-'+idRandom+'"  onclick="favorite(this)" data="'+barang1[i]+'" class="click-favorites"><img class="icon-item-costum-like-home image-favorite-'+idRandom+'" src="'+BaseUrl+'/assets/img/icon/like-hover.svg" alt="like" /></a></li>';
                        semuaBarang += '<li class="compare"><a><img class="icon-item-costum-compare-home" src="'+BaseUrl+'/assets/img/icon/compare-hover.svg" alt="compare" /></a></li>';
                        semuaBarang += '<li class="quick_button"><input value='+barang1[i].id+' id="data-cart-'+idRandom+'" type="hidden" name='+idRandom+'  /><a id="click-cart-'+idRandom+'"  onclick="cart(this)" data="'+barang1[i]+'" class="click-cart"><img class="icon-item-costum-cart-home image-cart-'+idRandom+'" src="'+BaseUrl+'/assets/img/icon/cart-hover.svg" alt="like" /></a></li>';

                        semuaBarang += '</ul>';
                        semuaBarang += '</div>';
                        semuaBarang += '</div>';
                        semuaBarang += '<div class="product_content">';
                        semuaBarang += '<div class="product_content_inner">';
                        semuaBarang += '<h4 class="product_name" style="height: 50px;"><a href="'+ BaseUrl + '/detail/detail_barang/'+ barang1[i].id +'">'+barang1[i].name+'</a></h4>';
                        semuaBarang += '<div class="price_box">';
                        semuaBarang += '<span class="current_price">'+formatRupiah(barang2[i].price, "Rp. ")+'</span>';
                        semuaBarang += '</div>';
                        semuaBarang += '</div>';
                        semuaBarang += '<div class="add_to_cart" style="padding-top: 10px !important;">';
                        semuaBarang += '<a title="Checkout">Checkout</a>';
                        semuaBarang += '</div>';
                        semuaBarang += '</div>';
                        semuaBarang += '</figure>';
                        semuaBarang += '</article>';


                        semuaBarang += '<article class="single_product">';
                        semuaBarang += '<figure>';
                        semuaBarang += '<div class="product_thumb">';
                        semuaBarang += '<a class="primary_img" href="'+ BaseUrl + '/detail/detail_barang/'+ barang2[i].id +'"><img style="width: 217px; height: 217px;" src="'+barang2[i].images[0].original+'" alt=""></a>';
                        semuaBarang += '<a class="secondary_img" href="'+ BaseUrl + '/detail/detail_barang/'+ barang2[i].id +'"><img style="width: 217px; height: 217px;" src="'+barang2[i].images[0].original+'" alt=""></a>';
                        semuaBarang += '<div class="label_product">';
                        semuaBarang += '<span class="label_sale">Sale</span>';
                        semuaBarang += '</div>';
                        semuaBarang += '<div class="action_links">';
                        semuaBarang += '<ul>';
                        var idRandom2 = Math.floor(Math.random() * 10000);
                        semuaBarang += '<li class="wishlist"><input value='+barang2[i].id+' id="data-favorite-'+idRandom2+'" type="hidden" name='+idRandom2+'  /><a id="click-favorite-'+idRandom2+'"  onclick="favorite(this)" data="'+barang2[i]+'" class="click-favorites"><img class="icon-item-costum-like-home image-favorite-'+idRandom2+'" src="'+BaseUrl+'/assets/img/icon/like-hover.svg" alt="like" /></a></li>';
                        semuaBarang += '<li class="compare"><a><img class="icon-item-costum-compare-home" src="'+BaseUrl+'/assets/img/icon/compare-hover.svg" alt="compare" /></a></li>';
                        semuaBarang += '<li class="quick_button"><input value='+barang2[i].id+' id="data-cart-'+idRandom2+'" type="hidden" name='+idRandom2+'  /><a id="click-cart-'+idRandom2+'"  onclick="cart(this)" data="'+barang2[i]+'" class="click-cart"><img class="icon-item-costum-cart-home image-cart-'+idRandom2+'" src="'+BaseUrl+'/assets/img/icon/cart-hover.svg" alt="like" /></a></li>';
                        semuaBarang += '</ul>';
                        semuaBarang += '</div>';
                        semuaBarang += '</div>';
                        semuaBarang += '<div class="product_content">';
                        semuaBarang += '<div class="product_content_inner">';
                        semuaBarang += '<h4 class="product_name" style="height: 50px;"><a href="'+ BaseUrl + '/detail/detail_barang/'+ barang2[i].id +'">'+barang2[i].name+'</a></h4>';
                        semuaBarang += '<div class="price_box">';
                        semuaBarang += '<span class="current_price">'+formatRupiah(barang2[i].price, "Rp. ")+'</span>';
                        semuaBarang += '</div>';
                        semuaBarang += '</div>';
                        semuaBarang += '<div class="add_to_cart">';
                        semuaBarang += '<a title="Checkout">Checkout</a>';
                        semuaBarang += '</div>';
                        semuaBarang += '</div>';
                        semuaBarang += '</figure>';
                        semuaBarang += '</article>';

                    

                    semuaBarang += '</div>';
    
                    }
                    semuaBarang += '</div>';
                    semuaBarang += '</div>';
                    semuaBarang += '</div>';
                            
                    semuaBarang += '</div>';
                    semuaBarang += '</div>';
                    semuaBarang += '</div>';
                    semuaBarang += '</div>';
                    semuaBarang += '</div>';
                    $('#generateSemuaBarang').html(semuaBarang);

                    var simple = $('.product_column3');
                    simple.owlCarousel('destroy');
                    
                    /*---product column3 activation---*/
                    $('.product_column3').on('changed.owl.carousel initialized.owl.carousel', function (event) {
                        $(event.target).find('.owl-item').removeClass('last').eq(event.item.index + event.page.size - 1).addClass('last')}).owlCarousel({
                        autoplay: true,
                        loop: true,
                        nav: true,
                        autoplay: false,
                        autoplayTimeout: 8000,
                        items: 3,
                        dots:false,
                        navText: ['<i class="ion-ios-arrow-back"></i>','<i class="ion-ios-arrow-forward"></i>'],
                        responsiveClass:true,
                        responsive:{
                                0:{
                                items:1,
                            },
                            768:{
                                items:3,
                            },
                            992:{
                                items:2,
                            },
                            1200:{
                                items:3,
                            },

                        }
                    });

                } else if (response.status == 401) {
                            e('info', '401 server conection error');
                        } else if (response.status == 404) {
                            
                        }
                    },
                    dataType: 'json'
                })   
};
getSemuaJenisBarang();

function getRekomendasiProduk() {
    $.ajax({
        data: "",
        url: ServeUrl + "/barang?page=5&page=1",
        method: 'GET',
        complete: function(response) {
            if (response.status == 200) {

                var pisahBarang = response.responseJSON.items.length / 2;
                var barang1 = [];
                var barang2 = [];

                for (let q = 0; q < pisahBarang; q++) {
                    
                    barang1[q] = response.responseJSON.items[q];
                    
                }
               
                
                var incBrang2 = 0;
                for (let incHelperPisah = pisahBarang; incHelperPisah < response.responseJSON.items.length; incHelperPisah++) {
                    
                    barang2[incBrang2] = response.responseJSON.items[incHelperPisah];
                    incBrang2++;
                }

                var rekomendasi = '';

                for (let i = 0; i < pisahBarang; i++) {
                    rekomendasi += '<div class="product_items" >';
                    rekomendasi += '<figure class="single_product">';
                    rekomendasi += '<div class="product_thumb">';

                    if (barang1[i].images != null && barang1[i].images.length > 0) {
                        rekomendasi += '<a class="primary_img" href="'+ BaseUrl + '/detail/detail_barang/'+ barang1[i].id +'"><img style="width: 166px; height: 166px;" src="'+barang1[i].images[0].original+'" alt=""></a>';
                    }

                    if (barang1[i].images != null && barang1[i].images.length > 1) {
                        rekomendasi += '<a class="secondary_img" href="'+ BaseUrl + '/detail/detail_barang/'+ barang1[i].id +'"><img style="width: 166px; height: 166px;" src="'+barang1[i].images[1].original+'" alt=""></a>';
                    }
                    
                    rekomendasi += '</div>';
                    rekomendasi += '<div class="product_content">';
                    rekomendasi += '<h4 class="product_name"><a href="'+ BaseUrl + '/detail/detail_barang/'+ barang1[i].id +'">'+barang1[i].name+'</a></h4>';
                    rekomendasi += '<div class="price_box">';
                    rekomendasi += '<span class="current_price">'+formatRupiah(barang1[i].price, "Rp. ")+'</span>';
                    rekomendasi += '</div>';
                    rekomendasi += '<div class="product_cart_button">';
                    var idRandom = Math.floor(Math.random() * 10000);
                    rekomendasi += '<input value='+barang1[i].id+' id="data-cart-'+idRandom+'" type="hidden" name='+idRandom+'  /><a id="click-cart-'+idRandom+'"  onclick="cart(this)" data="'+barang1[i]+'" class="click-cart"><img class="icon-item-costum-cart-home image-cart-'+idRandom+'" src="'+BaseUrl+'/assets/img/icon/cart-hover.svg" alt="like" /></a>';

                    rekomendasi += '</div>';
                    rekomendasi += '</div>';
                    rekomendasi += '</figure>';

                    if (barang2 != null) {
                        rekomendasi += '<figure class="single_product">';
                        rekomendasi += '<div class="product_thumb">';
    
                        if (barang2 != null && barang2[i].images != null && barang2[i].images.length > 0) {
                            rekomendasi += '<a class="primary_img" href="'+ BaseUrl + '/detail/detail_barang/'+ barang2[i].id +'"><img style="width: 166px; height: 166px;" src="'+barang2[i].images[0].original+'" alt=""></a>';
                        }
    
                        if (barang2 != null && barang2[i].images != null && barang2[i].images.length > 1) {
                            rekomendasi += '<a class="secondary_img" href="'+ BaseUrl + '/detail/detail_barang/'+ barang2[i].id +'"><img style="width: 166px; height: 166px;" src="'+barang2[i].images[1].original+'" alt=""></a>';
                        }
                        
                        rekomendasi += '</div>';
                        rekomendasi += '<div class="product_content">';
    
                        if (barang2 != null) {
                            rekomendasi += '<h4 class="product_name"><a href="'+ BaseUrl + '/detail/detail_barang/'+ barang2[i].id +'">'+barang2[i].name+'</a></h4>';
                        }
                        rekomendasi += '<div class="price_box">';
                        rekomendasi += '<span class="current_price">'+formatRupiah(barang2[i].price, "Rp. ")+'</span>';
                        rekomendasi += '</div>';
                        rekomendasi += '<div class="product_cart_button">';
                        var idRandom = Math.floor(Math.random() * 10000);
                        rekomendasi += '<input value='+barang2[i].id+' id="data-cart-'+idRandom+'" type="hidden" name='+idRandom+'  /><a id="click-cart-'+idRandom+'"  onclick="cart(this)" data="'+barang2[i]+'" class="click-cart"><img class="icon-item-costum-cart-home image-cart-'+idRandom+'" src="'+BaseUrl+'/assets/img/icon/cart-hover.svg" alt="like" /></a>';
                        rekomendasi += '</div>';
    
                        rekomendasi += '</div>';
                        rekomendasi += '</figure>';
                    }
                    
                    rekomendasi += '</div>';
            };
            
            $('#generateRekomendasiProduk').html(rekomendasi);

            var simple = $('.small_product_column3');
            simple.owlCarousel('destroy');

            $('.small_product_column3').on('changed.owl.carousel initialized.owl.carousel', function (event) {
                $(event.target).find('.owl-item').removeClass('last').eq(event.item.index + event.page.size - 1).addClass('last')}).owlCarousel({
                autoplay: true,
                loop: true,
                nav: true,
                autoplay: false,
                autoplayTimeout: 8000,
                items: 3,
                dots:false,
                navText: ['<i class="ion-ios-arrow-back"></i>','<i class="ion-ios-arrow-forward"></i>'],
                responsiveClass:true,
                responsive:{
                        0:{
                        items:1,
                    },
                    768:{
                        items:2,
                    },
                    992:{
                        items:2,
                    },
                    1200:{
                        items:3,
                    },

                }
            });

            } else if (response.status == 401) {
                e('info', '401 server conection error');
            } else if (response.status == 404) {
                
            }
        },
        dataType: 'json'
    })   
}

getRekomendasiProduk();

var lastKategori = [];
function getKategoriforPage() {
 
                $.ajax({
                    data: "",
                    url: ServeUrl + "/kategori-barang/" + semuaJenisbarangMain[0],
                    method: 'GET',
                    complete: function(response) {
                        if (response.status == 200) {
                            lastKategori = response.responseJSON.items;
                            console.log('lastKategori', lastKategori)
                            getKategoriPage(1, lastKategori[Math.floor(Math.random() * lastKategori.length)].id)

                        } else if (response.status == 401) {
                            e('info', '401 server conection error');
                        } else if (response.status == 404) {
                            
                        }
                        },
                        dataType: 'json'
                        }) 
 
}
setTimeout(function(){getKategoriforPage(); }, 2000);


function getKategoriPage(page, idKategoris){

    $.ajax({
        data: "",
        url: ServeUrl + "/barang?kategori_id=" + idKategoris,
        method: 'GET',
        complete: function(response) {
            if (response.status == 200) {
                console.log('response.responseJSON.items', response.responseJSON.items)
                var kategoriPage = '';
                var incKategori = 0;
                for (let i = 0; i < response.responseJSON.items.length / 3; i++) {

                kategoriPage += '<div class="product_items">';

                for (let j = 0; j < 3; j++) {
                    
                    if (response.responseJSON.items[incKategori] != null) {

                        kategoriPage += '<figure class="single_product">';
                        kategoriPage += '<div class="product_thumb">';

                        if (response.responseJSON.items[incKategori].images != null && response.responseJSON.items[incKategori].images.length > 0) {
                            kategoriPage += '<a class="primary_img" href="'+ BaseUrl + '/detail/detail_barang/'+ response.responseJSON.items[incKategori].id +'"><img style="width: 100px; height: 100px;" src="'+response.responseJSON.items[incKategori].images[0].original+'" alt=""></a>';
                        }
    
                        if (response.responseJSON.items[incKategori].images != null && response.responseJSON.items[incKategori].images.length > 1) {
                            kategoriPage += '<a class="secondary_img" href="'+ BaseUrl + '/detail/detail_barang/'+ response.responseJSON.items[incKategori].id +'"><img style="width: 100px; height: 100px;" src="'+response.responseJSON.items[incKategori].images[1].original+'" alt=""></a>';
                        }
                        
                        kategoriPage += '</div>';
                        kategoriPage += '<div class="product_content">';
                        kategoriPage += '<h4 class="product_name"><a href="'+ BaseUrl + '/detail/detail_barang/'+ response.responseJSON.items[incKategori].id +'">'+response.responseJSON.items[incKategori].name+'</a></h4>';
                        kategoriPage += '<div class="price_box">';
                        kategoriPage += '<span class="current_price">'+formatRupiah(response.responseJSON.items[incKategori].price, "Rp. ")+'</span>';
                        kategoriPage += '</div>';
                        kategoriPage += '<div class="product_cart_button">';
                        var idRandom = Math.floor(Math.random() * 10000);
                        kategoriPage += '<input value='+response.responseJSON.items[incKategori].id+' id="data-cart-'+idRandom+'" type="hidden" name='+idRandom+'  /><a id="click-cart-'+idRandom+'"  onclick="cart(this)" data="'+response.responseJSON.items[incKategori]+'" class="click-cart"><img class="icon-item-costum-cart-home image-cart-'+idRandom+'" src="'+BaseUrl+'/assets/img/icon/cart-hover.svg" alt="like" /></a>';
                        kategoriPage += '</div>';
                        kategoriPage += '</div>';
                        kategoriPage += '</figure>';
                        incKategori++;
                }
                }

                kategoriPage += '</div>';

            };

            var idKategoriRandom = lastKategori[Math.floor(Math.random() * lastKategori.length)].id;
            if (page == 1) {
                $('#generatePage1Kategori').html(kategoriPage);
                $('#kategoriNamePage1').html(response.responseJSON.items[0].kategoriName);
                getKategoriPage(2, idKategoriRandom)
            } else if (page == 2) {
                $('#kategoriNamePage2').html(response.responseJSON.items[0].kategoriName);
                $('#generatePage2Kategori').html(kategoriPage);
                getKategoriPage(3, idKategoriRandom)
            } else if (page == 3){
                $('#kategoriNamePage3').html(response.responseJSON.items[0].kategoriName);
                $('#generatePage3Kategori').html(kategoriPage);
            }
            

            var simple = $('.product_column1');
            simple.owlCarousel('destroy');
            /*---product column1 activation---*/
            $('.product_column1').on('changed.owl.carousel initialized.owl.carousel', function (event) {
                $(event.target).find('.owl-item').removeClass('last').eq(event.item.index + event.page.size - 1).addClass('last')}).owlCarousel({
                autoplay: true,
                loop: true,
                nav: false,
                autoplay: false,
                autoplayTimeout: 8000,
                items: 1,
                dots:false,
                navText: ['<i class="ion-ios-arrow-back"></i>','<i class="ion-ios-arrow-forward"></i>'],
                responsiveClass:true,
                responsive:{
                        0:{
                        items:1,
                    },
                    768:{
                        items:2,
                    },
                    992:{
                        items:1,
                    },

                }
            });
            
                } else if (response.status == 401) {
                    e('info', '401 server conection error');
                } else if (response.status == 404) {
                    
                }
                },
                dataType: 'json'
                })   
            
}
