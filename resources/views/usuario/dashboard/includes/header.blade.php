
<!DOCTYPE html>
<html lang="pt-BR">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{!!csrf_token()!!}"/>
        <link rel="stylesheet" href="{!! asset('assets/css/bootstrap.min.css') !!}">
        <link rel="stylesheet" href="{!! asset('assets/css/flaticon.css') !!}">
        <link rel="stylesheet" href="{!! asset('assets/css/remixicon.css') !!}">
        <link rel="stylesheet" href="{!! asset('assets/css/owl.carousel.min.css') !!}">
        <link rel="stylesheet" href="{!! asset('assets/css/odometer.min.css') !!}">
        <link rel="stylesheet" href="{!! asset('assets/css/fancybox.css') !!}">
        <link rel="stylesheet" href="{!! asset('assets/css/aos.css') !!}">
        <link rel="stylesheet" href="{!! asset('assets/css/style.css') !!}">
        <link rel="stylesheet" href="{!! asset('assets/css/responsive.css') !!}">
        <link rel="stylesheet" href="{!! asset('assets/css/dark-theme.css') !!}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.0/css/all.min.css" integrity="sha512-3PN6gfRNZEX4YFyz+sIyTF6pGlQiryJu9NlGhu9LrLMQ7eDjNgudQoFDK3WSNAayeIKc6B8WXXpo4a7HqxjKwg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>MedVida - Início</title>
        <link rel="icon" type="image/png" href="assets/img/favicon.png">
    </head>

    <body>
        <div class="loader js-preloader">
            <div class="absCenter">
                <div class="loaderPill">
                    <div class="loaderPill-anim">
                        <div class="loaderPill-anim-bounce">
                            <div class="loaderPill-anim-flop">
                                <div class="loaderPill-pill"></div>
                            </div>
                        </div>
                    </div>
                    <div class="loaderPill-floor">
                        <div class="loaderPill-floor-shadow"></div>
                    </div>
                </div>
            </div>
        </div>


        <div class="page-wrapper">


            <header class="header-wrap style3">
                <div class="container">
                    <div class="header-bottom">
                        <nav class="navbar navbar-expand-md navbar-light">
                           <a class="navbar-brand" href="#">
                                <img class="logo-light" src="{!! asset('assets/img/logo.png') !!}" alt="logo">
                            </a>
                            <div class="collapse navbar-collapse main-menu-wrap" id="navbarSupportedContent">
                                <div class="menu-close d-lg-none">
                                    <a href="javascript:void(0)"> <i class="ri-close-line"></i></a>
                                </div>
                                <Span> Aqui entra as informações do usuário </Span>
                                {{-- <ul class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link active">
                                            Início
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="about.html" class="nav-link">
                                            Meus Dependentes
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Minhas Consultas
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="contact.html" class="nav-link">Meus dados</a>
                                    </li>
                                </ul> --}}
                            </div>
                        </nav>
                        <div class="mobile-bar-wrap">
                            <div class="mobile-menu d-lg-none">
                                <a href="javascript:void(0)"><i class="fas fa-user"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
