<!DOCTYPE html>
<html lang=jp>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Image-post</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    
    <!--ナビゲーションバー-->
    @include('commons.navbar')
    
    <div class="container">
        <!--エラーメッセージ-->
        @include('commons.error_messages')
        <!--本文-->
        @yield('content')
    </div>
    
    <!--フッター-->
    <footer class="p-3 bg-dark text-white fixed-bottom">
      <p class="text-center">&copy; 2020 tobi</p>
    </footer>
    
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
</body>
</html>