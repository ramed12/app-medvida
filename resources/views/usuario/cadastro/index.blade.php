
<!DOCTYPE html>
<html lang="PT-BR">
<head>

        <meta charset="utf-8">
        <meta name="csrf-token" content="{!!csrf_token()!!}"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/flaticon.css">
        <link rel="stylesheet" href="assets/css/remixicon.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/odometer.min.css">
        <link rel="stylesheet" href="assets/css/fancybox.css">
        <link rel="stylesheet" href="assets/css/aos.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
        <link rel="stylesheet" href="assets/css/dark-theme.css">
        <title>Medvida Saúde - Login</title>
        <link rel="icon" type="image/png" href="assets/img/favicon.png">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.all.min.js"></script>
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
                                <div class="logo" style="">
                                    <center><img style="border-radius:900px; max-width:200px !important; position:relative; top:-40px;" src="{!! asset('assets/img/cadastro-medico.png') !!}"></center>
                                </div>
                                @include('usuario.include.voltar', ["route" => route('login')])
                                <div class="login-form-wrap">
                                    <div class="login-header">
                                        <center><h3>Vamos Começar</h3></center>
                                        <p> Para criar sua conta, precisamos de algumas informações, tudo bem? </p>
                                        <ul>
                                            <li>Número do seu CPF;</li>
                                            <li>Seu nome completo;</li>
                                            <li>Telefone celular e e-mail;</li>
                                        </ul>
                                        <button onclick="window.location.href='{!! route('cadastro-formulario') !!}'" class="btn style1 w-100 d-block">
                                            Ok, entendi
                                        </button>
                                    </div>
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
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/form-validator.min.js"></script>
    <script src="assets/js/contact-form-script.js"></script>
    <script src="assets/js/aos.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/odometer.min.js"></script>
    <script src="assets/js/fancybox.js"></script>
    <script src="assets/js/jquery.appear.js"></script>
    <script src="assets/js/tweenmax.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        </script>

    <script>

        $("#loginUser").submit(function(e){
            e.preventDefault();

            login = $("#cpf").val()
            senha = $("#pwdSenha").val()

            $("#resultado").hide();

            $.ajax({
                url: "{!! route('envia-dados-login') !!}",
                type: "POST",
                data: {
                        cpf: login,
                        password: senha,
                        "_token": "{!! csrf_token() !!}"
                },
                dataType: "json",
                success: function(s){
                resultado.innerHTML = `<div class='alert alert-${s.status}' role='alert'>${s.mensagem}</div>`
                $("#resultado").show("slow")

                // console.log(s.mensagem)

                setTimeout(() => {
                    $("#resultado").hide("slow");
                }, 3000);

                },
                error: function(e){
                console.log(e);
                }
            });

        });


    </script>


</body>


</html>
