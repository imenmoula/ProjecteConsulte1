<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Fafo">
    <meta name="keywords" content="HTML,CSS,JavaScript">
    <meta name="author" content="HiBootstrap">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <title> </title>
    <link rel="icon" href="{{ asset('images/1.jfif') }}" type="image/png"
        sizes="16x16">

    <link rel="stylesheet" href="{{ asset('user/assets/css/bootstrap.min.css') }}"
        type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('user/assets/css/bootstrap-reboot.min.css') }}"
        type="text/css" media="all" />

    <link rel="stylesheet" href="{{ asset('user/assets/css/animate.min.css') }}" type="text/css"
        media="all" />

    <link rel="stylesheet" href="{{ asset('user/assets/css/owl.carousel.min.css') }}"
        type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('user/assets/css/owl.theme.default.min.css') }}"
        type="text/css" media="all" />

    <link rel="stylesheet" href="{{ asset('user/assets/css/slick.css') }}" type="text/css"
        media="all" />
    <link rel="stylesheet" href="{{ asset('user/assets/css/slick-theme.css') }}" type="text/css"
        media="all" />

    <link rel="stylesheet" href="{{ asset('user/assets/css/jquery-ui.css') }}" type="text/css"
        media="all" />

    <link rel="stylesheet" href="{{ asset('user/assets/css/jquery.timepicker.min.css') }}"
        type="text/css" media="all" />

    <link rel="stylesheet" href="{{ asset('user/assets/css/meanmenu.min.css') }}"
        type="text/css" media="all" />

    <link rel="stylesheet" href="{{ asset('user/assets/css/magnific-popup.min.css') }}"
        type="text/css" media="all" />

    <link rel="stylesheet" href="{{ asset('user/assets/css/icofont.min.css') }}" type="text/css"
        media="all" />

    <link rel="stylesheet" href="{{ asset('user/assets/css/flaticon.css') }}" type="text/css"
        media="all" />

    <link rel="stylesheet" href="{{ asset('user/assets/css/settings.css') }}" type="text/css"
        media="all" />
    <link rel="stylesheet" href="{{ asset('user/assets/css/layers.css') }}" type="text/css"
        media="all" />
    <link rel="stylesheet" href="{{ asset('user/assets/css/navigation.css') }}" type="text/css"
        media="all" />

    <link rel="stylesheet" href="{{ asset('user/assets/css/style.css') }}" type="text/css"
        media="all" />

    <link rel="stylesheet" href="{{ asset('user/assets/css/responsive.css') }}" type="text/css"
        media="all" />

    <link rel="stylesheet" href="{{ asset('user/assets/css/theme-dark.css') }}" type="text/css"
        media="all" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" />
        <style>
        img.logo.logo1 {
            height: 88px;
            width: 131px;
        }

        .logout-button {
            background: none;
            border: none;
            padding: 0;
            font: inherit;
            cursor: pointer;
            color: rgb(18, 15, 15);
        }
        .header-carousel-two .item {
    text-align: center; /* Centrer le contenu */
    width: 100%; /* Occuper toute la largeur du conteneur */
}

.header-carousel-two .item img {
    max-width: 50%; /* L'image occupe 80% de la largeur */
    height: auto; /* Maintenir les proportions */
    display: block; /* Centrer l'image */
    margin: 0 auto; /* Centrer dans le conteneur */
}

.header-carousel-two .item p {
    font-size: 20px; /* Augmenter la taille du texte */
    font-weight: bold; /* Mettre le texte en gras */
    color:#333; /* Couleur du texte */
    margin-top: 15px; /* Ajouter de l'espace entre l'image et le texte */
}


            </style>
            <script>
                $(document).ready(function(){
                    $('.header-carousel-two').owlCarousel({
                        loop: true,
                        items: 1,
                        nav: true,
                        dots: true,
                        autoplay: true,
                        autoplayTimeout: 3000
                    });
                });
                $(document).ready(function () {
                $('.header-carousel-two').owlCarousel({
                    loop: true,
                    margin: 10,
                    nav: true,
                    items: 1, // Afficher un élément à la fois
                    responsive: {
                        0: { items: 1 },
                        600: { items: 1 },
                        1000: { items: 1 }
                    }
                });
            });


            </script>

    
</head>

<body>
    @include('partiales.header')

    @section('container')
    @show

    @include('partiales.footer')




     

   
    


    <script src="{{ asset('user/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('user/assets/js/jquery-ui.js') }}"></script>

    <script src="{{ asset('user/assets/js/jquery.timepicker.min.js') }}"></script>

    <script src="{{ asset('user/assets/js/jquery.magnific-popup.min.js') }}"></script>

    <script src="{{ asset('user/assets/js/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('user/assets/js/slick.min.js') }}"></script>

    <script src="{{ asset('user/assets/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/jquery.themepunch.tools.min.js') }}"></script>

    <script
        src="{{ asset('user/assets/js/extensions/revolution.extension.actions.min.js') }}">
    </script>
    <script
        src="{{ asset('user/assets/js/extensions/revolution.extension.carousel.min.js') }}">
    </script>
    <script
        src="{{ asset('user/assets/js/extensions/revolution.extension.kenburn.min.js') }}">
    </script>
    <script
        src="{{ asset('user/assets/js/extensions/revolution.extension.layeranimation.min.js') }}">
    </script>
    <script
        src="{{ asset('user/assets/js/extensions/revolution.extension.migration.min.js') }}">
    </script>
    <script
        src="{{ asset('user/assets/js/extensions/revolution.extension.navigation.min.js') }}">
    </script>
    <script
        src="{{ asset('user/assets/js/extensions/revolution.extension.parallax.min.js') }}">
    </script>
    <script
        src="{{ asset('user/assets/js/extensions/revolution.extension.slideanims.min.js') }}">
    </script>
    <script src="{{ asset('user/assets/js/extensions/revolution.extension.video.min.js') }}">
    </script>

    <script src="{{ asset('user/assets/js/wow.min.js') }}"></script>

    <script src="{{ asset('user/assets/js/jquery.ajaxchimp.min.js') }}"></script>

    <script src="{{ asset('user/assets/js/form-validator.min.js') }}"></script>

    <script src="{{ asset('user/assets/js/contact-form-script.js') }}"></script>

    <script src="{{ asset('user/assets/js/jquery.meanmenu.min.js') }}"></script>

    <script src="{{ asset('user/assets/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
     
</body>


</html>
