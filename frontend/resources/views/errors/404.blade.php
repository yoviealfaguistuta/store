<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Microdata Indonesia</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('assets/img') }}/logo/logo-down.svg">
    <link rel="stylesheet" href="{{ url('assets/css') }}/plugins.css">
    <link rel="stylesheet" href="{{ url('assets/css') }}/style.css">
    <link rel="stylesheet" href="{{ url('assets/css') }}/costum.css">
</head>

<body>
    <div class="error_page_bg">
        <div class="container">
            <div class="error_section">
                <div class="row">
                    <div class="col-12">
                        <div class="error_form">
                            <h1>404</h1>
                            <h2>Oops! PAGE NOT BE FOUND</h2>
                            <p>Sorry but the page you are looking for does not exist, have been<br> removed, name
                                changed or is temporarily unavailable.</p>
                            <form action="javascript:redirect()">
                                <input id="notfound_query" placeholder="Search Item..." type="text">
                                <button type="submit"><i class="ion-ios-search-strong"></i></button>
                            </form>
                            <a href="{{ url('/') }}">Back to home page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function redirect() {
            var query = document.getElementById('notfound_query').value;
            window.location.href = '{{ url(' / ') }}' + '/kategori/list_kategori/empty/' + query + '/empty';
        }

    </script>
</body>

</html>
