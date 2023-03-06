var semuaJenisbarangMain = [];
var semuaKategoriBarang = [];
var idKategori = [];
var panjangJenisBarang = 0;
function getJenisBarang() {
    $.ajax({
        data: "",
        url: ServeUrl + "/jenis-barang",
        method: 'GET',
        complete: function(response) {
            if (response.status == 200) {

                var navbarJenisBarang = '';
                var kategoriBarangUtama = '';
                panjangJenisBarang = response.responseJSON.items.length;
                    for (let i = 0; i < response.responseJSON.items.length; i++) {
                        semuaJenisbarangMain.push(response.responseJSON.items[i].id);
                        semuaJenisbarangMain.push(response.responseJSON.items[i].name);
                        semuaJenisbarangMain.push(response.responseJSON.items[i].image_thumb);

                        navbarJenisBarang += '<li><a href="'+ BaseUrl + '/kategori/list_kategori/'+ response.responseJSON.items[i].id + '/empty' + '/empty' +'">'+response.responseJSON.items[i].name+'</a></li>';

                        kategoriBarangUtama += '<div class="col-md-3">';
                        kategoriBarangUtama += '<a class="go-to-jenisbarang" href="'+ BaseUrl + '/kategori/list_kategori/'+ response.responseJSON.items[i].id + '/empty' + '/empty' +'"><div class="single_categories_product-costum">';
                        kategoriBarangUtama += '<div class="categories_product_content">';
                        kategoriBarangUtama += '<h4>'+response.responseJSON.items[i].name+'</a></h4>';
                        kategoriBarangUtama += '<a class="go-to-jenisbarang-deskripsi" href="'+ BaseUrl + '/kategori/list_kategori/'+ response.responseJSON.items[i].id + '/empty' + '/empty' +'"><p>'+response.responseJSON.items[i].description+'</p></a>';
                        kategoriBarangUtama += '</div>';
                        kategoriBarangUtama += '<div class="categories_product_thumb">';
                        kategoriBarangUtama += '<a href="'+ BaseUrl + '/kategori/list_kategori/'+ response.responseJSON.items[i].id + '/empty' + '/empty' +'"><img class="image-icon-dashboard" src="'+response.responseJSON.items[i].image_thumb+'" alt="">';
                        kategoriBarangUtama += '</div>';
                        kategoriBarangUtama += '</div></a>';
                        kategoriBarangUtama += '</div>';
                    }

                    $('#generateNavbarJenisBarang').html(navbarJenisBarang);
                    $('#generatekategoriBarangUtama').html(kategoriBarangUtama);

                getKategori(semuaJenisbarangMain[0], semuaJenisbarangMain[1], semuaJenisbarangMain[2])
                
            } else if (response.status == 401) {
                e('info', '401 server conection error');
            } else if (response.status == 404) {
                
            }
        },
        dataType: 'json'
    })

};
getJenisBarang();
var semuaJenisBarang = '';
var incrementHelper = 0;

var semuaJenisBarangHover = '';

function getKategori(idJenisBarang, namaJenisBarang, gambarJenisBarang) {
    incrementHelper = incrementHelper + 3;
    $.ajax({
        data: "",
        url: ServeUrl + "/kategori-barang/" + idJenisBarang,
        method: 'GET',
        complete: function(response) {
            if (response.status == 200) {

                    semuaJenisBarangHover += '<li><a href="'+ BaseUrl + '/kategori/list_kategori/'+ idJenisBarang + '/empty' + '/empty' +'">'+namaJenisBarang+'</a>';
                    semuaJenisBarangHover += '<ul>';

                    semuaJenisBarang += '<li class="menu_item_children"><a href="'+ BaseUrl + '/kategori/list_kategori/'+ idJenisBarang + '/empty' + '/empty' +'"> <img class="image-jenis-barang" src="'+gambarJenisBarang+'" alt="" />'+ namaJenisBarang +' <i class="fa fa-angle-right"></i></a>';
                    semuaJenisBarang += '<ul class="categories_mega_menu column_3">';

                    for (let i = 0; i < response.responseJSON.items.length; i++) {
                        semuaJenisBarang += '<ul class="categorie_sub_menu">';
                        semuaJenisBarang += '<li class="wrapper-kategori-child"><img class="image-kategori-hover" src="'+response.responseJSON.items[i].image_thumb+'" alt=""/><a class="link-kategori-hover" href="'+ BaseUrl + '/kategori/list_kategori/'+ idJenisBarang + '/empty/' + response.responseJSON.items[i].id + '">'+response.responseJSON.items[i].name+'</a></li>';
                        semuaJenisBarang += '</ul>';

                        semuaKategoriBarang.push(response.responseJSON.items[i].name);
                        idKategori.push(response.responseJSON.items[i].id);

                        semuaJenisBarangHover += '<li ><a href="'+ BaseUrl + '/kategori/list_kategori/'+ idJenisBarang + '/empty/' + response.responseJSON.items[i].id + '">'+response.responseJSON.items[i].name+'</a></li>';
                    }
                    
                semuaJenisBarang += '</ul>';
                semuaJenisBarang += '</li>';

                semuaJenisBarangHover += '</ul>';
                semuaJenisBarangHover += '</li>';

                $('#generateJenisBarang').html(semuaJenisBarang);
                $('#generateJenisBarangHover').html(semuaJenisBarangHover);

                if (incrementHelper < semuaJenisbarangMain.length) {
                    getKategori(semuaJenisbarangMain[incrementHelper], semuaJenisbarangMain[incrementHelper + 1], semuaJenisbarangMain[incrementHelper + 2])
                }
            } else if (response.status == 401) {
                e('info', '401 server conection error');
            } else if (response.status == 404) {
                
            }
        },
        dataType: 'json'
    })
};

function search() {
    var query = document.getElementById('search-query').value;
    if (query == null || query == '') {
        query = document.getElementById('search-query-mobile').value;
    }
    query = query.replace('/', '|')

    window.location.href = BaseUrl + '/kategori/list_kategori/empty/' + query + '/empty';
}

var favoriteCount = 0;
var favoriteData = [];
var favoriteIdIcon = [];
function favorite(attribute) {
    var subId = attribute.id.split('-');
    var id = subId[subId.length - 1];

    var dataId = document.getElementById('data-favorite-'+id).value
    if ($('.image-favorite-'+id).hasClass('hasClick')) {
        $('.image-favorite-'+id).attr('src',BaseUrl + '/assets/img/icon/like-hover.svg');
        $('.image-favorite-'+id).removeClass('hasClick');
        favoriteCount -= 1;
        $('#favorite-count-first').html(favoriteCount);
        $('#favorite-count-second').html(favoriteCount);

        const index = favoriteData.indexOf(dataId);
        const index3 = favoriteIdIcon.indexOf(id);

        if (index > -1) {
            favoriteData.splice(index, 1);
        }

        if (index3 > -1) {
            favoriteIdIcon.splice(index3, 1);
        }
        
    } else {
        $('.image-favorite-'+id).attr('src',BaseUrl + '/assets/img/icon/like-click.svg');
        $('.image-favorite-'+id).addClass('hasClick');
        favoriteCount += 1;
        $('#favorite-count-first').html(favoriteCount);
        $('#favorite-count-second').html(favoriteCount);

        favoriteData.push(dataId)
        favoriteIdIcon.push(id)
    }

    var data = $("#" + attribute.id).attr('data')
    $('#generateFavorite').html(data[0].name);
    
}

var incHelperFavorite = 0;
function openFavoriteItem() {
    $('#modal_favorite_item').modal('show');

    getFavoriteData();
    
}
var htmlBarang = '';
function getFavoriteData() {
    
    if (favoriteData[0] == null) {
        
        var htmlNotfound = '';
        htmlNotfound += '<div class="container_not_found"><img class="not_found_item" src="'+ BaseUrl + '/assets/img/notfound/notfound.svg" alt=""></div>';
        $('#generateFavorite').html(htmlNotfound);

    } else {

    $.ajax({
        data: "",
        url: ServeUrl + "/barang/" + favoriteData[incHelperFavorite],
        method: 'GET',
        complete: function(response) {
            if (response.status == 200) {

                var numberInc = incHelperFavorite + 1;
                htmlBarang += '<div class="container_favorite_modal">'

                htmlBarang += '<div class="row">'

                htmlBarang += '<div class="col-md-1 container_number_favorite">';
                htmlBarang += '<span class="number_favorite">'+numberInc+'</span>'
                htmlBarang += '</div>'

                htmlBarang += '<div class="col-md-2">';
                htmlBarang += '<div class="container_image_favorite">';
                htmlBarang += '<a class="cart_primary_costum" href="'+ BaseUrl + '/detail/detail_barang/'+ response.responseJSON.id +'">'
                htmlBarang += '<img class="cart_image_costum" src="'+response.responseJSON.images[0].original+'" alt="">'
                htmlBarang += '</a>'
                htmlBarang += '</div>'
                htmlBarang += '</div>'

                htmlBarang += '<div class="col-md-7">';
                htmlBarang += '<div class="container_content_favorite">';
                htmlBarang += '<a  href="'+ BaseUrl + '/detail/detail_barang/'+ response.responseJSON.id +'">'
                htmlBarang += '<h5 class="cart_content_name">'+ response.responseJSON.name +'</h5>'
                htmlBarang += '</a>'
                htmlBarang += '<a  href="'+ BaseUrl + '/detail/detail_barang/'+ response.responseJSON.id +'">'
                htmlBarang += '<div class="cart_content_garansi">'+ response.responseJSON.garansi +'</div>'
                htmlBarang += '</a>'
                htmlBarang += '<a  href="'+ BaseUrl + '/detail/detail_barang/'+ response.responseJSON.id +'">'
                htmlBarang += '<div class="cart_content_price">'+formatRupiah(response.responseJSON.price, "Rp. ")+'</div>'
                htmlBarang += '</a>'
                htmlBarang += '</div>'
                htmlBarang += '</div>'

                htmlBarang += '<div class="col-md-2">';
                htmlBarang += '<div class="container_button_favorite">';
                htmlBarang += '<button onclick="removeFavorite('+response.responseJSON.id+')" class="btn_favorite_hapus" href="">Hapus</button>'
                htmlBarang += '</div>'
                htmlBarang += '</div>'

                htmlBarang += '</div>'

                htmlBarang += '</div>'
            

            $('.btn_favorite_hapus').prop('disabled', false);
            $(".btn_favorite_hapus").css("opacity", 1);
            incHelperFavorite++;
            if (incHelperFavorite < favoriteData.length) {
                getFavoriteData();
            } else {
                $('#generateFavorite').html(htmlBarang);
            }

            } else if (response.status == 401) {
                e('info', '401 server conection error');
            } else if (response.status == 404) {
                
            }
        },
        dataType: 'json'
    })
}
}

function removeFavorite(id) {

    htmlBarang = '';
    incHelperFavorite = 0;
    $('.btn_favorite_hapus').prop('disabled', true);
    $(".btn_favorite_hapus").css("opacity", 0.5);
    
    removeA(favoriteData, id.toString());
    openFavoriteItem();
}

function removeA(arr) {
    var what, a = arguments, L = a.length, ax;
    while (L > 1 && arr.length) {
        what = a[--L];
        while ((ax= arr.indexOf(what)) !== -1) {
            arr.splice(ax, 1);

            $('.image-favorite-'+favoriteIdIcon[ax]).attr('src',BaseUrl + '/assets/img/icon/like-hover.svg');
            $('.image-favorite-'+favoriteIdIcon[ax]).removeClass('hasClick');
            favoriteCount -= 1;
            $('#favorite-count-first').html(favoriteCount);
            $('#favorite-count-second').html(favoriteCount);
            
            favoriteIdIcon.splice(ax, 1);
        }
    }
    return arr;
}

var cartCount = 0;
var cartData = [];
var cartIdIcon = [];
function cart(attribute) {
    var subId = attribute.id.split('-');
    var id = subId[subId.length - 1];

    var dataId = document.getElementById('data-cart-'+id).value
    if ($('.image-cart-'+id).hasClass('hasClick')) {
        $('.image-cart-'+id).attr('src',BaseUrl + '/assets/img/icon/cart-hover.svg');
        $('.image-cart-'+id).removeClass('hasClick');
        cartCount -= 1;
        $('#cart-count-first').html(cartCount);
        $('#cart-count-second').html(cartCount);

        const index = cartData.indexOf(dataId);
        const index3 = cartIdIcon.indexOf(id);

        if (index > -1) {
            cartData.splice(index, 1);
        }

        if (index3 > -1) {
            cartIdIcon.splice(index3, 1);
        }
        
    } else {
        $('.image-cart-'+id).attr('src',BaseUrl + '/assets/img/icon/cart-click.svg');
        $('.image-cart-'+id).addClass('hasClick');
        cartCount += 1;
        $('#cart-count-first').html(cartCount);
        $('#cart-count-second').html(cartCount);

        cartData.push(dataId)
        cartIdIcon.push(id)
    }

    var data = $("#" + attribute.id).attr('data')
    $('#generatecart').html(data[0].name);
    
}

var incHelpercart = 0;
function opencartItem() {
    $('#mini_cart').addClass('active');
    getcartData();
    
}
var htmlCart = '';
var countTotalCart = 0;
function getcartData() {
    
    if (cartData[0] == null) {
        
        var htmlNotfound = '';
        htmlNotfound += '<div class="container_not_found"><img class="not_found_item" src="'+ BaseUrl + '/assets/img/notfound/notfound.svg" alt=""></div>';

        $('#generateCartItems').html(htmlNotfound);

    } else {

    $.ajax({
        data: "",
        url: ServeUrl + "/barang/" + cartData[incHelpercart],
        method: 'GET',
        complete: function(response) {
            if (response.status == 200) {

                htmlCart += '<div class="cart_item">';
                htmlCart += '<div class="cart_img">';
                htmlCart += '<a href="'+ BaseUrl + '/detail/detail_barang/'+ response.responseJSON.id +'"><img src="'+response.responseJSON.images[0].original+'" alt=""></a>';
                htmlCart += '</div>';
                htmlCart += '<div class="cart_info">';
                htmlCart += '<a href="'+ BaseUrl + '/detail/detail_barang/'+ response.responseJSON.id +'">'+ response.responseJSON.name +'</a>';
                htmlCart += '<p>Qty: 1 X <span> '+formatRupiah(response.responseJSON.price, "Rp. ")+' </span></p>';
                htmlCart += '</div>';
                htmlCart += '<div class="cart_remove">';
                htmlCart += '<a onclick="removecart('+response.responseJSON.id+','+response.responseJSON.price+')"><i class="ion-android-close"></i></a>';
                htmlCart += '</div>';
                htmlCart += '</div>';

            incHelpercart++;
            countTotalCart = countTotalCart + response.responseJSON.price;
            if (incHelpercart < cartData.length) {
                getcartData();
                
            } else {
                $('#generateCartItems').html(htmlCart);
                $('#totalCartFirst').html(formatRupiah(countTotalCart, "Rp. "));
                countTotalCart = 0;
            }

            } else if (response.status == 401) {
                e('info', '401 server conection error');
            } else if (response.status == 404) {
                
            }
        },
        dataType: 'json'
    })
}
}

function removecart(id, price) {

    htmlCart = '';
    incHelpercart = 0;
    
    removeAcart(cartData, id.toString());
    opencartItem();
}

function removeAcart(arr) {
    var what, a = arguments, L = a.length, ax;
    while (L > 1 && arr.length) {
        what = a[--L];
        while ((ax= arr.indexOf(what)) !== -1) {
            arr.splice(ax, 1);

            $('.image-cart-'+cartIdIcon[ax]).attr('src',BaseUrl + '/assets/img/icon/cart-hover.svg');
            $('.image-cart-'+cartIdIcon[ax]).removeClass('hasClick');
            cartCount -= 1;
            $('#cart-count-first').html(cartCount);
            $('#cart-count-second').html(cartCount);
            
            cartIdIcon.splice(ax, 1);
        }
    }
    return arr;
}

    // Security

    // var x = document.getElementById("snackbar");
    // x.className = "show";
    // setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);

    // document.addEventListener('contextmenu', function(e) {
    //     e.preventDefault();
    // });

    // document.onkeydown = function(e) {
    //     if(event.keyCode == 123) {
    //        return false;
    //     }
    //     if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
    //        return false;
    //     }
    //     if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
    //        return false;
    //     }
    //     if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
    //        return false;
    //     }
    //     if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
    //        return false;
    //     }
    //   }

    // console.clear();
    // $(document).ajaxStart(function(){
    //     console.clear();
    // });
    
    // $(document).ajaxStop(function(){
    //     console.clear();
    // });