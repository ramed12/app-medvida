
<!DOCTYPE html>
<html lang="PT-BR">
<head>

        <meta charset="utf-8">
        <meta name="csrf-token" content="{!!csrf_token()!!}"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <title>Medvida Saúde - Login</title>
        <link rel="icon" type="image/png" href="assets/img/favicon.png">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.all.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css" integrity="sha512-gMjQeDaELJ0ryCI+FtItusU9MkAifCZcGq789FrzkiM49D8lbDhoaUaIX4ASU187wofMNlgBJ4ckbrXM9sE6Pg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

        <div class="switch-theme-mode">
            <label id="switch" class="switch">
                    <input type="checkbox" onchange="toggleTheme()" id="slider">
                    <span class="slider round"></span>
            </label>
        </div>

        <div class="page-wrapper">
            <div class="content-wrapper">
                <section class="Login-wrap  pb-75">
                    <div class="container">
                        <div class="row gx-5">
                            <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                                <div class="logo">
                                    <center><img style="max-width:250px !important; position:relative; top:-90px;" src="{!! asset('assets/img/logo.png') !!}"></center>
                                </div>

                                @include('usuario.include.voltar', ["route" => route('cadastro-inicio')])
                                <div class="login-form-wrap">
                                    <div class="login-header">
                                        <center><h3>Preencha os dados abaixo</h3>
                                        <p> Campos marcados com <span style="color:red">* </span> são obrigatórios </p>
                                    </center>
                                    </div>
                                    <form action="{!! route('cadastro-formulario-envia') !!}" method="POST"  class="login-form">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label> Digite seu CPF <span style="color:red">* </span></label>
                                                    <input id="cpf" inputmode="numeric" value="{!! old('cpf') !!}" name="cpf" type="text" placeholder="Ex: 999.999.999-99" required>
                                                    <script>$("#cpf").mask('999.999.999-99');</script>
                                                    @error('cpf')
                                                        <div class="alert alert-danger" role="alert">{!! $message !!} </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label> Seu Nome Completo <span style="color:red">* </span></label>
                                                    <input id="nome" value="{!! old('nome') !!}" name="nome" type="text" placeholder="Digite seu nome Completo" required>
                                                    @error('nome')
                                                    <div class="alert alert-danger" role="alert">{!! $message !!} </div>
                                                     @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label> Digite seu e-mail <span style="color:red">* </span></label>
                                                    <input id="email" value="{!! old('email') !!}" name="email" type="text" placeholder="Digite seu E-mail" required>
                                                    @error('email')
                                                    <div class="alert alert-danger" role="alert">{!! $message !!} </div>
                                                     @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label> Telefone Whatsapp com DDD <span style="color:red">* </span></label>
                                                    <input id="telefone" inputmode="numeric" value="{!! old('telefone') !!}" name="telefone" type="text" placeholder="Ex: (99) 9 9999-9999" required>
                                                    <script>$("#telefone").mask('(99) 9 9999-9999');</script>
                                                    @error('telefone')
                                                    <div class="alert alert-danger" role="alert">{!! $message !!} </div>
                                                     @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group" style="position: relative !important">
                                                    <label> Digite sua senha <span style="color:red">* </span></label>
                                                    <input id="password" name="password" placeholder="Digite aqui sua senha" type="password" required >
                                                    @error('password')
                                                    <div class="alert alert-danger" role="alert">{!! $message !!} </div>
                                                     @enderror
                                                </div>
                                            </div>
                                            <div id="resultado" style="margin-top:20px;"></div>
                                            <div style="margin-top:20px !important;" class="col-lg-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn style1 w-100 d-block">
                                                        Cadastrar Conta
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- Page Wrapper End -->

    <!-- Back-to-top button Start -->
     <a href="javascript:void(0)" class="back-to-top bounce"><i class="ri-arrow-up-s-line"></i></a>
    <!-- Back-to-top button End -->

    <!-- Link of JS files -->

    <script src="{!! asset('assets/js/jquery.min.js') !!}"></script>
    <script src="{!! asset('assets/js/bootstrap.bundle.min.js') !!}"></script>
    <script src="{!! asset('assets/js/form-validator.min.js') !!}"></script>
    <script src="{!! asset('assets/js/contact-form-script.js') !!}"></script>
    <script src="{!! asset('assets/js/aos.js') !!}"></script>
    <script src="{!! asset('assets/js/owl.carousel.min.js') !!}"></script>
    <script src="{!! asset('assets/js/odometer.min.js') !!}"></script>
    <script src="{!! asset('assets/js/fancybox.js') !!}"></script>
    <script src="{!! asset('assets/js/jquery.appear.js') !!}"></script>
    <script src="{!! asset('assets/js/tweenmax.min.js') !!}"></script>
    <script src="{!! asset('assets/js/main.js') !!}"></script>


</body>


</html>
