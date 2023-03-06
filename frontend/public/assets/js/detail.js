
var currentPrice = 0;
var currentKategori = 0;
function getDetail() {
    
    $.ajax({
        data: "",
        url: ServeUrl + "/barang/" + idBarang.idBarang,
        method: 'GET',
        complete: function(response) {
            if (response.status == 200) {
                console.log('object', response.responseJSON)
                $('#title_breadcumb_detail').html('<li><a href="'+BaseUrl+'">home</a></li><li>'+response.responseJSON.jenisName+'</li><li ><a href="'+ BaseUrl + '/kategori/list_kategori/'+ 'empty' + '/empty/' + response.responseJSON.kategori_id +'">'+response.responseJSON.kategoriName+'</a></li><li >'+response.responseJSON.name+'</li>');
                    $('#namaBarang').html(response.responseJSON.name);
                    $('#kodeBarang').html(response.responseJSON.code);
                    
                    $('#hargaBarang').html(formatRupiah(response.responseJSON.price, "Rp. "));

                    var shortDescription = '';

                    for (let i = 0; i < response.responseJSON.short_description.length; i++) {
                        shortDescription += '<div class="col-md-6"><li>'+response.responseJSON.short_description[i]+'</li></div>';
                    }

                    $('#shortDescription').html(shortDescription);
                    $('#garansi').html(response.responseJSON.garansi);
                    $('#kategori').html(response.responseJSON.kategoriName);
                    $('#jenisbarang').html(response.responseJSON.jenisName);

                    var includes = '';
                    if (response.responseJSON.include[0] == '') {
                        includes += '<div class="col-md-6"><li>Tidak ada barang tambahan</li></div>';
                    } else {
                        for (let i = 0; i < response.responseJSON.include.length; i++) {
                            includes += '<div class="col-md-6"><li>'+response.responseJSON.include[i]+'</li></div>';
                        }
                    }
                    $('#include').html(includes);

                    var excludes = '';
                    if (response.responseJSON.exclude[0] == '') {
                        excludes += '<div class="col-md-6"><li>Tidak ada barang yang di kecualikan</li></div>';
                    } else {
                        for (let i = 0; i < response.responseJSON.exclude.length; i++) {
                            excludes += '<div class="col-md-6"><li>'+response.responseJSON.exclude[i]+'</li></div>';
                        }
                    }
                    $('#exclude').html(excludes);

                    $('#image-detail-main').html('<img id="zoom1" class="images-zoom-detail" src="'+response.responseJSON.images[0].original+'" data-zoom-image="'+response.responseJSON.images[0].original+'" alt="big-1">');
                    var imageList = '';
                    
                    for (let k = 0; k < response.responseJSON.images.length; k++) {
                        imageList += '<li>';
                        imageList += '<a href="#/"  class="elevatezoom-gallery active" data-update="" data-image="'+response.responseJSON.images[k].original+'" data-zoom-image="'+response.responseJSON.images[k].original+'">';
                        imageList += '<img style="width: 110px; height: 110px;" src="'+response.responseJSON.images[k].original+'" alt="zo-th-1" />';
                        imageList += '</a>';
                        imageList += '</li>';
                    }
                    $('#gallery_01').html(imageList);
                    
                    $('.single-product-active').owlCarousel({
                        autoplay: false,
                        loop: false,
                        nav: false,
                        autoplay: false,
                        autoplayTimeout: 8000,
                        items: 4,
                        margin:15,
                        dots:false,
                        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
                        responsiveClass:false,
                        responsive:{
                                0:{
                                items:1,
                            },
                            320:{
                                items:2,
                                margin:10,
                            },
                            992:{
                                items:3,
                            },
                            1200:{
                                items:4,
                            },
                        }
                    });

                    $("#zoom1").elevateZoom({
                        responsive: true,
                        constrainSize:974, 
                        zoomType: "lens", 
                        containLensZoom: true, 
                        gallery:'gallery_01', 
                        cursor: 'crosshair',
                        scrollZoom : true,
                        borderColour : '#232F3E',
                    });

                    $('#total').html(formatRupiah(response.responseJSON.price, "Rp. "));
                    currentPrice = response.responseJSON.price;

                    $('#generateLongdeskripsi').html(response.responseJSON.long_description);

                    var htmlSpesifikasi = '';
                    var incBorderHelper = 0;
                    $.each(response.responseJSON.spesifikasi, function(index, value) {
                        incBorderHelper++

                        htmlSpesifikasi += '<div class="col-md-2 spesifikasikey"><span class="">'+index+' :</span></div>';
                        htmlSpesifikasi += '<div class="col-md-4 spesifikasivalue"><span class="">'+value+'</span></div>';

                        if (incBorderHelper % 2 == 0) {
                            htmlSpesifikasi += '<div class="border-divider"></div>';
                        }
                        
                    });

                    $('#generateSpesifikasi').html(htmlSpesifikasi);
                    currentKategori = response.responseJSON.kategori_id;
                    getRelatedProduk(response.responseJSON.kategori_id, 1);

            } else if (response.status == 401) {
                e('info', '401 server conection error');
            } else if (response.status == 404) {
                
            }
        },
        dataType: 'json'
    })
}
getDetail();

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

jumlahBarang = document.getElementById("jumlah");

$("#jumlah").bind('keyup mouseup', function () {
    handleTotal(jumlahBarang.value);
});

function handleTotal(jumlah) {
    resultPrice = currentPrice * jumlah;
    $('#total').html(formatRupiah(resultPrice, "Rp. "));
}

var incrementHelperKategori = 1;

function getRelatedProduk(kategoriBarang, page) {
    incrementHelperKategori++;
    $.ajax({
        data: "",
        url: ServeUrl + "/barang?kategori_id=" + kategoriBarang + "&page=" + page,
        method: 'GET',
        complete: function(response) {
            if (response.status == 200) {

                
                var htmlProdukSerupa = '';
                for (let i = 0; i < response.responseJSON.items.length; i++) {

                    htmlProdukSerupa += '<article class="single_product">';
                    htmlProdukSerupa += '<figure>';

                    htmlProdukSerupa += '<div style="width: 260px; height: 260px;" class="product_thumb">';
                    htmlProdukSerupa += '<a class="primary_img" href="'+ BaseUrl + '/detail/detail_barang/'+ response.responseJSON.items[i].id +'"><img src="'+response.responseJSON.items[i].images[0].original+'" alt=""></a>';
                    htmlProdukSerupa += '<a class="secondary_img" href="'+ BaseUrl + '/detail/detail_barang/'+ response.responseJSON.items[i].id +'"><img src="'+response.responseJSON.items[i].images[1].original+'" alt=""></a>';
                    htmlProdukSerupa += '<div class="label_product">';
                    htmlProdukSerupa += '<span class="label_sale">Sale</span>';
                    htmlProdukSerupa += '</div>';
                    htmlProdukSerupa += '<div class="action_links">';
                    htmlProdukSerupa += '<ul>';
                    var idRandom = Math.floor(Math.random() * 10000);
                    htmlProdukSerupa += '<li class="wishlist"><input value='+response.responseJSON.items[i].id+' id="data-favorite-'+idRandom+'" type="hidden" name='+idRandom+'  /><a id="click-favorite-'+idRandom+'"  onclick="favorite(this)" data="'+response.responseJSON.items[i]+'" class="click-favorites"><img class="icon-item-costum-like-home image-favorite-'+idRandom+'" src="'+BaseUrl+'/assets/img/icon/like-hover.svg" alt="like" /></a></li>';
                    htmlProdukSerupa += '<li class="compare"><a><img class="icon-item-costum-compare-home" src="'+BaseUrl+'/assets/img/icon/compare-hover.svg" alt="compare" /></a></li>';
                    htmlProdukSerupa += '<li class="quick_button"><input value='+response.responseJSON.items[i].id+' id="data-cart-'+idRandom+'" type="hidden" name='+idRandom+'  /><a id="click-cart-'+idRandom+'"  onclick="cart(this)" data="'+response.responseJSON.items[i]+'" class="click-cart"><img class="icon-item-costum-cart-home image-cart-'+idRandom+'" src="'+BaseUrl+'/assets/img/icon/cart-hover.svg" alt="like" /></a></li>';
                    htmlProdukSerupa += '</ul>';
                    htmlProdukSerupa += '</div>';
                    htmlProdukSerupa += '</div>';
                    htmlProdukSerupa += '<div class="product_content">';
                    htmlProdukSerupa += '<div class="product_content_inner">';
                    htmlProdukSerupa += '<h4 class="product_name"><a href="product-details.html">Natus erro at congue massa commodo sit Natus erro</a></h4>';
                    htmlProdukSerupa += '<div class="price_box">';
                    htmlProdukSerupa += '<span class="old_price">$80.00</span>';
                    htmlProdukSerupa += '<span class="current_price">$70.00</span>';
                    htmlProdukSerupa += '</div>';
                    htmlProdukSerupa += '</div>';
                    htmlProdukSerupa += '<div class="add_to_cart">';
                    htmlProdukSerupa += '<a href="cart.html" title="Add to cart">Checkout</a>';
                    htmlProdukSerupa += '</div>';

                    htmlProdukSerupa += '</div>';
                    htmlProdukSerupa += '</figure>';
                    htmlProdukSerupa += '</article>';
                }

                $('#generateProdukSerupa').html(htmlProdukSerupa);

                var simple = $('.product_column5');
                simple.owlCarousel('destroy');
                
                 /*---product column5 activation---*/
                $('.product_column5').on('changed.owl.carousel initialized.owl.carousel', function (event) {

                    var items = event.item.count;
                    var item = event.item.index;
                    var size = event.page.size;

                    if ((items - item) === size) {
                        getRelatedProduk(currentKategori, incrementHelperKategori);
                    }

                    $(event.target).find('.owl-item').removeClass('last').eq(event.item.index + event.page.size - 1).addClass('last')}).owlCarousel({
                    autoplay: true,
                    loop: false,
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

            } else if (response.status == 401) {
                e('info', '401 server conection error');
            } else if (response.status == 404) {
                
            }
        },
        dataType: 'json'
    })
}

function cartClick() {
    Swal.fire({
        title: 'Oops!',
        text: 'This is beta version. The page you want to visit is in development',
        icon: 'error',
        confirmButtonColor: "#232F3E",
        confirmButtonText: 'Baiklah',
      })
}
    

