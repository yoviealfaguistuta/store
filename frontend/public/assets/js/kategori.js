var currentKategori = '';
var currentSort = '';

console.log('data', data)
if (data.search !== 'empty') {

    data.search = data.search.replace('|', '/')
    searchBarang();
} else if (data.idKategori !== 'empty') {
    generateBarang(data.idKategori, 1)
} else {
    generateKategori()
}

function searchBarang(page, sort) {
    
    var sortir = document.getElementById("sortir-barang").value;
    currentSort = sortir;

    if (sortir != '') {
        
        url = ServeUrl + "/barang?name=" +data.search+ "&sort=" + currentSort +"&page=" + page
    } else {
        url = ServeUrl + "/barang?name=" +data.search+ "&page=" + page
    }

    $.ajax({
        data: "",
        url: url,
        method: 'GET',
        complete: function(response) {
            if (response.status == 200) {
                // console.log('response.re', data.search)

                $('#title_breadcumb').html('<li><a href="'+BaseUrl+'">home</a></li><li >Kategori</li></li><li >'+data.search+'</li>');

                if (response.responseJSON.items.length == 0) {
                    
                    var htmlNotfound = '';
                    htmlNotfound += '<div class="col-lg-12 col-md-4 col-12 ">';
                    htmlNotfound += '<div class="container_not_found"><img class="not_found_item" src="'+ BaseUrl + '/assets/img/notfound/notfound.svg" alt=""></div>';
                    htmlNotfound += '</div>';
                    $('#generateBarang').html(htmlNotfound);

                } else {

                var checkKategori = '';
                var htmlKategori = '';
                
                for (let j = 0; j < response.responseJSON.items.length; j++) {
                    if (checkKategori.includes(response.responseJSON.items[j].kategoriName, 0) === false) {
                        htmlKategori += '<li><a href="#/" onclick="generateBarang('+response.responseJSON.items[j].kategori_id+','+1+')">'+response.responseJSON.items[j].kategoriName+'</a></li>';
                        checkKategori = checkKategori + response.responseJSON.items[j].kategoriName;
                    }
                }
                $('#generateKategori').html(htmlKategori);
                
                
                var htmlBarang = '';

                for (let i = 0; i < response.responseJSON.items.length; i++) {
                    
                    htmlBarang += '<div class="col-lg-3 col-md-4 col-12 ">';
                    htmlBarang += '<article class="single_product">';
                    htmlBarang += '<figure>';
                    htmlBarang += '<div class="product_thumb">';

                    if (response.responseJSON.items != null && response.responseJSON.items[i].images != null && response.responseJSON.items[i].images.length > 0) {
                        htmlBarang += '<a class="primary_img" href="'+ BaseUrl + '/detail/detail_barang/'+ response.responseJSON.items[i].id +'"><img class="image1-barang-grid" src="'+response.responseJSON.items[i].images[0].original+'" alt=""></a>';
                    }

                    if (response.responseJSON.items != null && response.responseJSON.items[i].images != null && response.responseJSON.items[i].images.length > 0) {
                        htmlBarang += '<a class="secondary_img" href="'+ BaseUrl + '/detail/detail_barang/'+ response.responseJSON.items[i].id +'"><img class="image2-barang-grid" src="'+response.responseJSON.items[i].images[1].original+'" alt=""></a>';
                    }

                    htmlBarang += '<div class="label_product">';
                    htmlBarang += '<span class="label_sale">Sale</span>';
                    htmlBarang += '</div>';
                    htmlBarang += '<div class="action_links">';
                    htmlBarang += '<ul>';
                    var idRandom = Math.floor(Math.random() * 10000);
                    htmlBarang += '<li class="wishlist"><input value='+response.responseJSON.items[i].id+' id="data-favorite-'+idRandom+'" type="hidden" name='+idRandom+'  /><a id="click-favorite-'+idRandom+'"  onclick="favorite(this)" data="'+response.responseJSON.items[i]+'" class="click-favorites"><img class="icon-item-costum-like image-favorite-'+idRandom+'" src="'+BaseUrl+'/assets/img/icon/like-hover.svg" alt="like" /></a></li>';
                    htmlBarang += '<li class="compare"><a><img class="icon-item-costum-compare" src="'+BaseUrl+'/assets/img/icon/compare-hover.svg" alt="compare" /></a></li>';
                    htmlBarang += '<li class="quick_button"><input value='+response.responseJSON.items[i].id+' id="data-cart-'+idRandom+'" type="hidden" name='+idRandom+'  /><a id="click-cart-'+idRandom+'"  onclick="cart(this)" data="'+response.responseJSON.items[i]+'" class="click-cart"><img class="icon-item-costum-cart image-cart-'+idRandom+'" src="'+BaseUrl+'/assets/img/icon/cart-hover.svg" alt="like" /></a></li>';
                    htmlBarang += '</ul>';
                    htmlBarang += '</div>';
                    htmlBarang += '</div>';

                    htmlBarang += '<div class="product_content grid_content">';
                    htmlBarang += '<div class="product_content_inner">';
                    htmlBarang += '<h4 class="product_name" style="height: 50px;"><a href="'+ BaseUrl + '/detail/detail_barang/'+ response.responseJSON.items[i].id +'">'+response.responseJSON.items[i].name+'</a></h4>';
                    htmlBarang += '<div class="price_box">';
                    htmlBarang += '<span class="current_price">'+formatRupiah(response.responseJSON.items[i].price, "Rp. ")+'</span>';
                    htmlBarang += '</div>';
                    htmlBarang += '</div>';
                    htmlBarang += '<div class="add_to_cart">';
                    htmlBarang += '<a title="Add to cart">Checkout</a>';
                    htmlBarang += '</div>';
                    htmlBarang += '</div>';
                    htmlBarang += '<div class="product_content list_content">';
                    htmlBarang += '<h4 class="product_name"><a href='+ BaseUrl + '/detail/detail_barang/'+ response.responseJSON.items[i].id +'>'+response.responseJSON.items[i].name+'</a></h4>';
                    htmlBarang += '<div class="price_box">';
                    htmlBarang += '<span class="current_price">'+formatRupiah(response.responseJSON.items[i].price, "Rp. ")+'</span>';
                    htmlBarang += '</div>';
                    htmlBarang += '<div class="product_desc">';
                    htmlBarang += '<p>'+response.responseJSON.items[i].garansi+'</p>';

                    
                    htmlBarang += '<ul>';
                    htmlBarang += '<div class="row">';
                    for (let j = 0; j < response.responseJSON.items[i].short_description.length; j++) {
                        htmlBarang += '<div class="col-md-4"><li class="wrapper-list-kategori"> <ion-icon name="ellipse"></ion-icon> '+response.responseJSON.items[i].short_description[j]+'</li></div>';
                    }
                    htmlBarang += '</div>';
                    htmlBarang += '<ul>';
                    

                    htmlBarang += '</div>';
                    htmlBarang += '<div class="add-cart-costum">';
                    htmlBarang += '<a title="Add to cart">Checkout</a>';
                    htmlBarang += '<a id="click-favorite-'+idRandom+'" onclick="favorite(this)" class="click-favorites" ><img class="icon-item-costum-like image-favorite-'+idRandom+'" src="'+BaseUrl+'/assets/img/icon/like.svg" alt="like" /></a>';
                    htmlBarang += '<a  title="Add to cart"><img class="icon-item-costum-compare" src="'+BaseUrl+'/assets/img/icon/compare.svg" alt="compare" /></a>';
                    htmlBarang += '<a id="click-cart-'+idRandom+'" onclick="cart(this)" class="click-cart"><img class="icon-item-costum-cart image-cart-'+idRandom+'" src="'+BaseUrl+'/assets/img/icon/cart.svg" alt="like" /></a>';

                    htmlBarang += '</div>';
                    htmlBarang += '</div>';
                    htmlBarang += '</figure>';
                    htmlBarang += '</article>';
                    htmlBarang += '</div>';

                }

                if (response.responseJSON._meta.currentPage == response.responseJSON._meta.pageCount) {
                    pageCount(response.responseJSON._meta.totalCount, 
                        response.responseJSON._meta.perPage, 
                        response.responseJSON._meta.currentPage,
                        'search')
                } else {
                    if (response.responseJSON._meta.totalCount > 20) {
                        pageCount(response.responseJSON._meta.totalCount, 
                            response.responseJSON._meta.perPage, 
                            response.responseJSON._meta.currentPage)
                    } else {
                        pageCount(response.responseJSON._meta.totalCount, 
                            response.responseJSON._meta.totalCount, 
                            response.responseJSON._meta.currentPage)
                    }
                }

                var htmlPagination = '';

                for (let j = 1; j <= response.responseJSON._meta.pageCount; j++) {
                    if (j == response.responseJSON._meta.currentPage) {
                        htmlPagination += '<li class="current">'+j+'</li>';
                    } else {
                        htmlPagination += '<li><a href="#/" onclick="searchBarang('+j+')">'+j+'</a></li>';
                    }
                }
                var next = response.responseJSON._meta.currentPage + 1;
                if (response.responseJSON._meta.pageCount != response.responseJSON._meta.currentPage) {
                    htmlPagination += '<li class="next"><a href="#/" onclick="searchBarang('+next+')">next</a></li>';
                    htmlPagination += '<li><a href="#/" onclick="searchBarang('+response.responseJSON._meta.pageCount+')" >>></a></li>';
                }
                
                
                $('#generateBarang').html(htmlBarang);
                $('#generatePagination').html(htmlPagination);

                document.getElementById("buttonResetLayoutList").click();

            }

            } else if (response.status == 401) {
                e('info', '401 server conection error');
            } else if (response.status == 404) {
                
            }
        },
        dataType: 'json'
    })
}

function generateKategori() {

    shimmer();

    $.ajax({
        data: "",
        url: ServeUrl + "/kategori-barang/" + data.idJenisbarang,
        method: 'GET',
        complete: function(response) {
            if (response.status == 200) {

                
                var htmlKategori = '';
                $.each(response.responseJSON.items, function(index, value) {
                    htmlKategori += '<li><a href="#/" onclick="generateBarang('+value.id+','+1+')">'+value.name+'</a></li>';
                });
                $('#generateKategori').html(htmlKategori);
                generateBarang(response.responseJSON.items[0].id, 1)
            } else if (response.status == 401) {
                e('info', '401 server conection error');
            } else if (response.status == 404) {
                
            }
        },
        dataType: 'json'
    })
}

function generateBarang(idKategori, page, sort) {

    shimmer();

    var sortir = document.getElementById("sortir-barang").value;
    currentSort = sortir;

    currentKategori = idKategori;

    var url = '';
    if (sortir != '') {
        console.log('sortmasuk')
        url = ServeUrl + "/barang?kategori_id=" +idKategori+ "&sort=" + currentSort +"&page=" + page
    } else {
        url = ServeUrl + "/barang?kategori_id=" +idKategori+ "&page=" + page
    }

    document.getElementById("buttonResetLayoutGrid").click();
    $.ajax({
        data: "",
        url: url,
        method: 'GET',
        complete: function(response) {

            

            if (response.status == 200) {
                
                if (response.responseJSON.items.length == 0) {
                    $('#title_breadcumb').html('<li><a href="'+BaseUrl+'">home</a></li><li >Tidak ada barang</li>');
                    var htmlNotfound = '';
                    htmlNotfound += '<div class="col-lg-12 col-md-4 col-12 ">';
                    htmlNotfound += '<div class="container_not_found"><img class="not_found_item" src="'+ BaseUrl + '/assets/img/notfound/notfound.svg" alt=""></div>';
                    htmlNotfound += '</div>';
                    $('#generateBarang').html(htmlNotfound);

                } else {
                    $('#title_breadcumb').html('<li><a href="'+BaseUrl+'">home</a></li><li >'+response.responseJSON.items[0].jenisName+'</li></li><li >'+response.responseJSON.items[0].kategoriName+'</li>');
                if (data.idKategori !== 'empty') {
                    var checkKategori = '';
                    var htmlKategori = '';
                    
                    for (let j = 0; j < response.responseJSON.items.length; j++) {
                        if (checkKategori.includes(response.responseJSON.items[j].kategoriName, 0) === false) {
                            htmlKategori += '<li><a href="#/" onclick="generateBarang('+response.responseJSON.items[j].kategori_id+','+1+')">'+response.responseJSON.items[j].kategoriName+'</a></li>';
                            checkKategori = checkKategori + response.responseJSON.items[j].kategoriName;
                        }
                    }
                    $('#generateKategori').html(htmlKategori);
                }

                    if (response.responseJSON._meta.currentPage == response.responseJSON._meta.pageCount) {
                        pageCount(response.responseJSON._meta.totalCount, 
                            response.responseJSON._meta.perPage, 
                            response.responseJSON._meta.currentPage,
                            'sisa',response.responseJSON.items.length)
                    } else {
                        pageCount(response.responseJSON._meta.totalCount, 
                            response.responseJSON._meta.perPage, 
                            response.responseJSON._meta.currentPage)
                    }

                var htmlBarang = '';

                for (let i = 0; i < response.responseJSON.items.length; i++) {
                    
                    htmlBarang += '<div class="col-lg-3 col-md-4 col-12 ">';
                    htmlBarang += '<article class="single_product">';
                    htmlBarang += '<figure>';
                    htmlBarang += '<div class="product_thumb">';
                    htmlBarang += '<a class="primary_img" href="'+ BaseUrl + '/detail/detail_barang/'+ response.responseJSON.items[i].id +'"><img id="testload" class="image1-barang" src="'+response.responseJSON.items[i].images[0].original+'" alt=""></a>';
                    
                    if (response.responseJSON.items != null && response.responseJSON.items[i].images != null && response.responseJSON.items[i].images.length > 0) {
                        htmlBarang += '<a class="secondary_img" href="'+ BaseUrl + '/detail/detail_barang/'+ response.responseJSON.items[i].id +'"><img class="image2-barang" src="'+response.responseJSON.items[i].images[1].original+'" alt=""></a>';
                    }
                    htmlBarang += '<div class="label_product">';
                    htmlBarang += '<span class="label_sale">Sale</span>';
                    htmlBarang += '</div>';
                    htmlBarang += '<div class="action_links">';
                    htmlBarang += '<ul>';
                    var idRandom = Math.floor(Math.random() * 10000);
                    htmlBarang += '<li class="wishlist"><input value='+response.responseJSON.items[i].id+' id="data-favorite-'+idRandom+'" type="hidden" name='+idRandom+'  /><a id="click-favorite-'+idRandom+'"  onclick="favorite(this)" data="'+response.responseJSON.items[i]+'" class="click-favorites"><img class="icon-item-costum-like image-favorite-'+idRandom+'" src="'+BaseUrl+'/assets/img/icon/like-hover.svg" alt="like" /></a></li>';
                    htmlBarang += '<li class="compare"><a><img class="icon-item-costum-compare" src="'+BaseUrl+'/assets/img/icon/compare-hover.svg" alt="compare" /></a></li>';
                    htmlBarang += '<li class="quick_button"><input value='+response.responseJSON.items[i].id+' id="data-cart-'+idRandom+'" type="hidden" name='+idRandom+'  /><a id="click-cart-'+idRandom+'"  onclick="cart(this)" data="'+response.responseJSON.items[i]+'" class="click-cart"><img class="icon-item-costum-cart image-cart-'+idRandom+'" src="'+BaseUrl+'/assets/img/icon/cart-hover.svg" alt="like" /></a></li>';
                    htmlBarang += '</ul>';
                    htmlBarang += '</div>';
                    htmlBarang += '</div>';

                    htmlBarang += '<div class="product_content grid_content">';
                    htmlBarang += '<div class="product_content_inner">';
                    htmlBarang += '<h4 class="product_name" style="height: 50px;"><a href="'+ BaseUrl + '/detail/detail_barang/'+ response.responseJSON.items[i].id +'">'+response.responseJSON.items[i].name+'</a></h4>';
                    htmlBarang += '<div class="price_box">';
                    htmlBarang += '<span class="current_price">'+formatRupiah(response.responseJSON.items[i].price, "Rp. ")+'</span>';
                    htmlBarang += '</div>';
                    htmlBarang += '</div>';
                    htmlBarang += '<div class="add_to_cart">';
                    htmlBarang += '<a href="cart.html" title="Add to cart">Checkout</a>';
                    htmlBarang += '</div>';
                    htmlBarang += '</div>';
                    htmlBarang += '<div class="product_content list_content">';
                    htmlBarang += '<h4 class="product_name"><a href='+ BaseUrl + '/detail/detail_barang/'+ response.responseJSON.items[i].id +'>'+response.responseJSON.items[i].name+'</a></h4>';
                    htmlBarang += '<div class="price_box">';
                    htmlBarang += '<span class="current_price">'+formatRupiah(response.responseJSON.items[i].price, "Rp. ")+'</span>';
                    htmlBarang += '</div>';
                    htmlBarang += '<div class="product_desc">';
                    htmlBarang += '<p>'+response.responseJSON.items[i].garansi+'</p>';

                    
                    htmlBarang += '<ul>';
                    htmlBarang += '<div class="row">';
                    for (let j = 0; j < response.responseJSON.items[i].short_description.length; j++) {
                        htmlBarang += '<div class="col-md-6"><li class="wrapper-list-kategori"> <ion-icon name="ellipse"></ion-icon> '+response.responseJSON.items[i].short_description[j]+'</li></div>';
                    }
                    htmlBarang += '</div>';
                    htmlBarang += '<ul>';
                    
                    htmlBarang += '</div>';
                    htmlBarang += '<div class="add-cart-costum">';

                    htmlBarang += '<a href="cart.html" title="Add to cart">Checkout</a>';
                    htmlBarang += '<a id="click-favorite-'+idRandom+'"  onclick="favorite(this)" class="click-favorites"><img class="icon-item-costum-like image-favorite-'+idRandom+'" src="'+BaseUrl+'/assets/img/icon/like.svg" alt="like" /></a>';
                    htmlBarang += '<a  title="Add to cart"><img class="icon-item-costum-compare" src="'+BaseUrl+'/assets/img/icon/compare.svg" alt="compare" /></a>';
                    htmlBarang += '<a id="click-cart-'+idRandom+'" onclick="cart(this)" class="click-cart"><img class="icon-item-costum-cart image-cart-'+idRandom+'" src="'+BaseUrl+'/assets/img/icon/cart.svg" alt="like" /></a>';

                    htmlBarang += '</div>';
                    htmlBarang += '</div>';
                    htmlBarang += '</figure>';
                    htmlBarang += '</article>';
                    htmlBarang += '</div>';
                }
                
                var htmlPagination = '';

                for (let j = 1; j <= response.responseJSON._meta.pageCount; j++) {
                    if (j == response.responseJSON._meta.currentPage) {
                        htmlPagination += '<li class="current">'+j+'</li>';
                    } else {
                        htmlPagination += '<li><a href="#/" onclick="generateBarang('+currentKategori+','+j+')">'+j+'</a></li>';
                    }
                }
                var next = response.responseJSON._meta.currentPage + 1;
                if (response.responseJSON._meta.pageCount != response.responseJSON._meta.currentPage) {
                    htmlPagination += '<li class="next"><a href="#/" onclick="generateBarang('+currentKategori+','+next+')">next</a></li>';
                    htmlPagination += '<li><a href="#/" onclick="generateBarang('+currentKategori+','+response.responseJSON._meta.pageCount+')" >>></a></li>';
                }
                
                $('#generateBarang').html(htmlBarang);
                $('#generatePagination').html(htmlPagination);

            }

            } else if (response.status == 401) {
                e('info', '401 server conection error');
            } else if (response.status == 404) {
                
            }
        },
        dataType: 'json'
    })
}

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


function sortirAscDesc() {

    shimmer();

    var sortir = document.getElementById("sortir-barang").value;
    currentSort = sortir;
    if (data.search == 'empty') {
      url = ServeUrl + '/barang?kategori_id=' + currentKategori + '&sort=' + sortir;
    } else {
      url = ServeUrl + '/barang?kategori_id=' + currentKategori + '&name=' + data.search + '&sort=' + sortir;
    }
  
    $.ajax({
      data: "",
      url: url,
      method: 'GET',
      cache: true,
      complete: function (response) {
        if (response.status == 200) {

            
            pageCount(response.responseJSON._meta.totalCount, 
                response.responseJSON._meta.perPage, 
                response.responseJSON._meta.currentPage)

                var htmlBarang = '';

                for (let i = 0; i < response.responseJSON.items.length; i++) {
                    
                    htmlBarang += '<div class="col-lg-3 col-md-4 col-12 ">';
                    htmlBarang += '<article class="single_product">';
                    htmlBarang += '<figure>';
                    htmlBarang += '<div class="product_thumb">';
                    htmlBarang += '<a class="primary_img" href="'+ BaseUrl + '/detail/detail_barang/'+ response.responseJSON.items[i].id +'"><img class="image1-barang-grid" src="'+response.responseJSON.items[i].images[0].original+'" alt=""></a>';
                    
                    if (response.responseJSON.items != null && response.responseJSON.items[i].images != null && response.responseJSON.items[i].images.length > 0) {
                        htmlBarang += '<a class="secondary_img" href="'+ BaseUrl + '/detail/detail_barang/'+ response.responseJSON.items[i].id +'"><img class="image2-barang-grid" src="'+response.responseJSON.items[i].images[1].original+'" alt=""></a>';
                    }
                    htmlBarang += '<div class="label_product">';
                    htmlBarang += '<span class="label_sale">Sale</span>';
                    htmlBarang += '</div>';
                    htmlBarang += '<div class="action_links">';
                    htmlBarang += '<ul>';
                    var idRandom = Math.floor(Math.random() * 10000);
                    htmlBarang += '<li class="wishlist"><input value='+response.responseJSON.items[i].id+' id="data-favorite-'+idRandom+'" type="hidden" name='+idRandom+'  /><a id="click-favorite-'+idRandom+'"  onclick="favorite(this)" data="'+response.responseJSON.items[i]+'" class="click-favorites"><img class="icon-item-costum-like image-favorite-'+idRandom+'" src="'+BaseUrl+'/assets/img/icon/like-hover.svg" alt="like" /></a></li>';
                    htmlBarang += '<li class="compare"><a><img class="icon-item-costum-compare" src="'+BaseUrl+'/assets/img/icon/compare-hover.svg" alt="compare" /></a></li>';
                    htmlBarang += '<li class="quick_button"><input value='+response.responseJSON.items[i].id+' id="data-cart-'+idRandom+'" type="hidden" name='+idRandom+'  /><a id="click-cart-'+idRandom+'"  onclick="cart(this)" data="'+response.responseJSON.items[i]+'" class="click-cart"><img class="icon-item-costum-cart image-cart-'+idRandom+'" src="'+BaseUrl+'/assets/img/icon/cart-hover.svg" alt="like" /></a></li>';
                    htmlBarang += '</ul>';
                    htmlBarang += '</div>';
                    htmlBarang += '</div>';

                    htmlBarang += '<div class="product_content grid_content">';
                    htmlBarang += '<div class="product_content_inner">';
                    htmlBarang += '<h4 class="product_name" style="height: 50px;"><a href="'+ BaseUrl + '/detail/detail_barang/'+ response.responseJSON.items[i].id +'">'+response.responseJSON.items[i].name+'</a></h4>';
                    htmlBarang += '<div class="price_box">';
                    htmlBarang += '<span class="current_price">'+formatRupiah(response.responseJSON.items[i].price, "Rp. ")+'</span>';
                    htmlBarang += '</div>';
                    htmlBarang += '</div>';
                    htmlBarang += '<div class="add_to_cart">';
                    htmlBarang += '<a href="cart.html" title="Add to cart">Checkout</a>';
                    htmlBarang += '</div>';
                    htmlBarang += '</div>';
                    htmlBarang += '<div class="product_content list_content">';
                    htmlBarang += '<h4 class="product_name"><a href='+ BaseUrl + '/detail/detail_barang/'+ response.responseJSON.items[i].id +'>'+response.responseJSON.items[i].name+'</a></h4>';
                    htmlBarang += '<div class="price_box">';
                    htmlBarang += '<span class="current_price">'+formatRupiah(response.responseJSON.items[i].price, "Rp. ")+'</span>';
                    htmlBarang += '</div>';
                    htmlBarang += '<div class="product_desc">';
                    htmlBarang += '<p>'+response.responseJSON.items[i].garansi+'</p>';

                    
                    htmlBarang += '<ul>';
                    htmlBarang += '<div class="row">';
                    for (let j = 0; j < response.responseJSON.items[i].short_description.length; j++) {
                        htmlBarang += '<div class="col-md-4"><li> <ion-icon name="ellipse"></ion-icon> '+response.responseJSON.items[i].short_description[j]+'</li></div>';
                    }
                    htmlBarang += '</div>';
                    htmlBarang += '<ul>';
                    

                    htmlBarang += '</div>';
                    htmlBarang += '<div class="add-cart-costum">';
                    htmlBarang += '<a href="cart.html" title="Add to cart">Checkout</a>';
                    htmlBarang += '<a id="click-favorite-'+idRandom+'"  onclick="favorite(this)" class="click-favorites"><img class="icon-item-costum-like image-favorite-'+idRandom+'" src="'+BaseUrl+'/assets/img/icon/like.svg" alt="like" /></a>';
                    htmlBarang += '<a  title="Add to cart"><img class="icon-item-costum-compare" src="'+BaseUrl+'/assets/img/icon/compare.svg" alt="compare" /></a>';
                    htmlBarang += '<a id="click-cart-'+idRandom+'" onclick="cart(this)" class="click-cart"><img class="icon-item-costum-cart image-cart-'+idRandom+'" src="'+BaseUrl+'/assets/img/icon/cart.svg" alt="like" /></a>';
                    htmlBarang += '</div>';
                    htmlBarang += '</div>';
                    htmlBarang += '</figure>';
                    htmlBarang += '</article>';
                    htmlBarang += '</div>';

                }

                
                var htmlPagination = '';

                if (data.search === 'empty') {
                    
                    for (let j = 1; j <= response.responseJSON._meta.pageCount; j++) {
                        if (j == response.responseJSON._meta.currentPage) {
                            htmlPagination += '<li class="current">'+j+'</li>';
                        } else {
                            htmlPagination += '<li><a href="#/" onclick="generateBarang('+currentKategori+','+j+','+currentSort+')">'+j+'</a></li>';
                        }
                    }
                    var next = response.responseJSON._meta.currentPage + 1;
                    if (response.responseJSON._meta.pageCount != response.responseJSON._meta.currentPage) {
                        htmlPagination += '<li class="next"><a href="#/" onclick="generateBarang('+currentKategori+','+next+','+currentSort+')">next</a></li>';
                        htmlPagination += '<li><a href="#/" onclick="generateBarang('+currentKategori+','+response.responseJSON._meta.pageCount+','+currentSort+')" >>></a></li>';
                    }

                } else {
                    for (let j = 1; j <= response.responseJSON._meta.pageCount; j++) {
                        if (j == response.responseJSON._meta.currentPage) {
                            htmlPagination += '<li class="current"><a href="#/" onclick="searchBarang('+j+','+currentSort+')">'+j+'</a></li>';
                        } else {
                            htmlPagination += '<li><a href="#/" onclick="searchBarang('+j+','+currentSort+')">'+j+'</a></li>';
                        }
                    }
                    var next = response.responseJSON._meta.currentPage + 1;
                    if (response.responseJSON._meta.pageCount != response.responseJSON._meta.currentPage) {
                        htmlPagination += '<li class="next"><a href="#/" onclick="searchBarang('+next+','+currentSort+')">next</a></li>';
                        htmlPagination += '<li><a href="#/" onclick="searchBarang('+response.responseJSON._meta.pageCount+','+currentSort+')" >>></a></li>';
                    }
                }

                $('#generateBarang').html(htmlBarang);
                $('#generatePagination').html(htmlPagination);

                if (data.search !== 'empty') {
                    document.getElementById("buttonResetLayoutList").click();
                }

        } else if (response.status == 401) {
          console.log('401', 'server conection error')
        } else if (response.status == 404) {
          console.log('404', 'URL Not Found')
        } else {
          console.log('Message', response.message)
        }
      },
      dataType: 'json'
    })
  }

  function pageCount(totalCount, perPage, currentPage, search, sisa) {

    var endPage = perPage * currentPage;
        var startPage = 1 + endPage - perPage;
        var htmlPageCount = '';

      if (search == 'search') {
        
        htmlPageCount += '<p>Showing '+startPage+'–'+totalCount+' of '+totalCount+' results</p>';
      } else if (search == 'sisa') {
          var sisa = totalCount - sisa;
        htmlPageCount += '<p>Showing '+sisa+'–'+totalCount+' of '+totalCount+' results</p>';
      } else {
        htmlPageCount += '<p>Showing '+startPage+'–'+endPage+' of '+totalCount+' results</p>';
      }

      $('#page-count-kategori').html(htmlPageCount);
  }
  function shimmer() {
    var htmlBarang = '';
    for (let i = 0; i < 20; i++) {

    htmlBarang += '<div class="col-lg-3 col-md-4 col-12 ">';
    htmlBarang += '<article class="single_product">';
    htmlBarang += '<figure>';
    htmlBarang += '<div class="product_thumb">';
    htmlBarang += '<box class="shine"></box>';
    htmlBarang += '</div>';

    htmlBarang += '<div class="product_content grid_content">';
    htmlBarang += '<div class="product_content_inner">';
    htmlBarang += '<h4 class="product_name" style="height: 10px;"><a href=""><lines class="shine"></lines></a></h4>';
    htmlBarang += '<h4 class="product_name" style="height: 10px;"><a href=""><lines class="shine"></lines></a></h4>';
    htmlBarang += '<h4 class="product_name" style="height: 30px;"><a href=""><lines class="shine"></lines></a></h4>';
    htmlBarang += '<h4 class="product_name" style="height: 10px;"><a href=""><lines class="shine"></lines></a></h4>';
    htmlBarang += '</div>';
    htmlBarang += '</div>';
    htmlBarang += '<div class="product_content list_content">';
    htmlBarang += '<h4 class="product_name"><a><lines class="shine"></lines></a></h4>';
    htmlBarang += '<div class="price_box">';
    htmlBarang += '<span class="current_price"><lines class="shine"></lines></span>';
    htmlBarang += '</div>';
    htmlBarang += '<div class="product_desc">';
    htmlBarang += '<p><lines class="shine"></lines></p>';

    
    htmlBarang += '<ul>';
    htmlBarang += '<div class="row">';

    htmlBarang += '<div class="col-md-6"><li class="wrapper-list-kategori"><lines class="shine"></lines></li></div>';
    htmlBarang += '<div class="col-md-6"><li class="wrapper-list-kategori"><lines class="shine"></lines></li></div>';
    htmlBarang += '<div class="col-md-6"><li class="wrapper-list-kategori"><lines class="shine"></lines></li></div>';
    htmlBarang += '<div class="col-md-6"><li class="wrapper-list-kategori"><lines class="shine"></lines></li></div>';

    htmlBarang += '</div>';
    htmlBarang += '<ul>';
    

    htmlBarang += '</div>';
    htmlBarang += '<div class="add-cart-costum">';
    htmlBarang += '<box class="shine"></box>';
    htmlBarang += '<box class="shine"></box>';
    htmlBarang += '<box class="shine"></box>';
    htmlBarang += '<box class="shine"></box>';
    htmlBarang += '</div>';
    htmlBarang += '</div>';
    htmlBarang += '</figure>';
    htmlBarang += '</article>';
    htmlBarang += '</div>';
    }
    $('#generateBarang').html(htmlBarang);
  }

  const player = document.getElementById("lottie-player");
  $(document).ajaxStart(function(){
      $("#lottie-player").fadeIn("slow");
      player.load("https://assets9.lottiefiles.com/packages/lf20_oCWIv0.json");
  });
  
  $(document).ajaxStop(function(){
  
      setTimeout(function(){ 
          const player = document.getElementById("lottie-player");
      player.load("https://assets3.lottiefiles.com/temp/lf20_PRvG5R.json");
      $("#lottie-player").fadeOut(2800);
       }, 1000);
      
  });