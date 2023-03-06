<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Antomi - Electronics eCommerce HTML Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS 
    ========================= -->

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ url('assets/css') }}/plugins.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ url('assets/css') }}/style.css">

    <link rel="stylesheet" href="{{ url('assets/css') }}/costum.css">
</head>

<body>

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <div class="login_logo_container">
                            <a href="{{ url('/') }}"><img class="logo-dark-main"
                                    src="{{ url('assets/img') }}/logo/logo-dark.svg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!-- customer login start -->
    <div class="login_page_bg">
        <div class="container">
            <div class="customer_login">
                <div class="container_login_wrapper">
                    <div class="row">
                        <!--login area start-->

                        <div class="col-lg-6 col-md-6">
                            <div class="container_image_login">
                                <img class="image_login" src="{{ url('assets/img') }}/logo/login.svg" alt="">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">

                            <div class="account_form login">
                                <h2>login</h2>
                                <form action="javascript:redirect()" class="card_login">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-6">
                                            <p>
                                                <label>Phone Number or Email <span>*</span></label>
                                                <input type="text" placeholder="+62">
                                            </p>
                                            <div class="login_submit">
                                                <a href="{{ url('/') }}">Lost your password?</a>
                                                <label for="remember">
                                                    <input id="remember" type="checkbox">
                                                    Remember me
                                                </label>
                                                <button type="submit">login</button>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-lg-4 col-md-6">
                                            <div class="border-divider"></div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 container_sign_inwith">
                                            <span class="sign_inwith">or sign in with</span>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="border-divider"></div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="container_login_button">
                                                <img class="image_login" src="{{ url('assets/img') }}/logo/facebook.svg"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="container_login_button">
                                                <img class="image_login" src="{{ url('assets/img') }}/logo/google.svg"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 col-md-6 mt-3">
                                            <a href="{{ url('/Za2Xaw11') }}">Register Here</a>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <!--login area start-->
                </div>
            </div>
        </div>
    </div>

    <!-- customer login end -->

    <!--footer area start-->
    <footer class="footer_widgets" style="border-top: 1px solid #ebebeb">

        <div class="footer_bottom">
            <div class="container">
                <div class="row align-items-center ">
                    <div class="col-lg-12 col-md-6 ">
                        <div class="copyright_area" style="margin-left: 20px;">
                            <p><span style="color: red; font-weight: bolder">Beta</span> Version - Copyright &copy; 2021
                                <a href="http://microdataindonesia.co.id/">Microdata Indonesia</a> All Right Reserved.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        function redirect() {
            window.location.href = '{{ url(' / ') }}'
        }

    </script>

</body>

</html>
