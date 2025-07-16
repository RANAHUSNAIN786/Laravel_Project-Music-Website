<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Musico</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Add this in your <head> tag -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">


    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('user/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/audioplayer.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/gijgo.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/style.css')}}">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>

    @yield('content')

   


    
    <!-- link that opens popup -->

    <!-- JS here -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
            crossorigin="anonymous">
    </script>
   <script src="{{ asset('user/js/vendor/modernizr-3.5.0.min.js') }}"></script>
<script src="{{ asset('user/js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('user/js/popper.min.js') }}"></script>
<script src="{{ asset('user/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('user/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('user/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('user/js/ajax-form.js') }}"></script>
<script src="{{ asset('user/js/waypoints.min.js') }}"></script>
<script src="{{ asset('user/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('user/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('user/js/audioplayer.js') }}"></script>
<script src="{{ asset('user/js/scrollIt.js') }}"></script>
<script src="{{ asset('user/js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('user/js/wow.min.js') }}"></script>
<script src="{{ asset('user/js/nice-select.min.js') }}"></script>
<script src="{{ asset('user/js/jquery.slicknav.min.js') }}"></script>
<script src="{{ asset('user/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('user/js/plugins.js') }}"></script>
<script src="{{ asset('user/js/gijgo.min.js') }}"></script>
<script src="{{ asset('user/js/slick.min.js') }}"></script>

  <script src="https://cdn.tailwindcss.com"></script>
<!-- Contact JS -->
<script src="{{ asset('user/js/contact.js') }}"></script>
<script src="{{ asset('user/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('user/js/jquery.form.js') }}"></script>
<script src="{{ asset('user/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('user/js/mail-script.js') }}"></script>

  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="{{ asset('user/js/main.js') }}"></script>

    
		<script>
                $(function() {
                    $('audio').audioPlayer({

                    });
                });


     
     
  // dashboard ////////
        document.getElementById('deleteBtn').addEventListener('click', () => {
            document.getElementById('deletePopup').classList.remove('hidden');
        });

        document.querySelectorAll('#deletePopup button').forEach(btn => {
            btn.addEventListener('click', () => {
                document.getElementById('deletePopup').classList.add('hidden');
            });
        });

        document.getElementById('musicForm').addEventListener('submit', (e) => {
            e.preventDefault();
            alert('Music uploaded successfully!');
        });

        document.getElementById('videoForm').addEventListener('submit', (e) => {
            e.preventDefault();
            alert('Video uploaded successfully!');
        });

        document.getElementById('categoryForm').addEventListener('submit', (e) => {
            e.preventDefault();
            alert('Category created successfully!');
        });
                 
  // dashboard ////////
              
            </script>
</body>

</html>