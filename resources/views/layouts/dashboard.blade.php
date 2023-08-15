<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Painel Administrativo - {{ config('app.name', 'Laravel') }}</title>
    <meta name="base-url" content="{!!url('/')!!}"/>
    <input type="hidden" id="web-router" value="{{url('/dashboard')}}">

    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/image/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/image/favicon-16x16.png')}}">

    {{-- @yield('styles') --}}
    <!-- Custom fonts for this template-->
    <link href="{{asset('assets/dashboard/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="{{asset('assets/dashboard/css/sb-admin-2.css')}}" rel="stylesheet">
    <!-- summernote editor-->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

</head>

<body id="page-top">
<!-- Page Wrapper -->
    <div id="wrapper">
        @include('layouts.inc.dashboard-sidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @include('layouts.inc.dashboard-header')

                @yield('content')

                @include('layouts.inc.dashboard-footer')
            </div>
        </div>
    </div>

     @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    @yield('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('assets/dashboard/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('assets/dashboard/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('assets/dashboard/js/sb-admin-2.min.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <!-- Page level plugins -->{{--
    <script src="{{asset('assets/dashboard/vendor/chart.js/Chart.min.js')}}"></script> --}}
    <!-- Page level custom scripts -->
    {{-- <script src="{{asset('assets/dashboard/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/demo/chart-pie-demo.js')}}"></script> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <!-- Main JS-->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $("#cpf").mask('999.999.999-99');
        $("#telefone").mask('(99) 9 9999-9999');
    </script>
    <script>
        $(document).ready(function(){
            $('.moeda').mask('000.000.000.000.000,00', {reverse: true});
        });
        $(".moeda").focusout(function(){
        if($(this).val().length <= 2){
            temp = $(this).val()
            var newNum = temp + ",00"
            $(this).val(newNum)
            $(this).type = 'number'
        }
        })
    </script>

    <script>
        var baseUrl = $('meta[name="base-url"]').attr("content");

        $(".btn-delete").on("click", function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            new Swal({
                title: 'Deseja realmente excluir esse item?',
                text: "Não será possivel a recuperação do mesmo.",
                icon: 'error',
                showDenyButton: true,
                confirmButtonText: 'Excluir',
                denyButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                window.location.href = url;
                    } else if (result.isDenied) {
                          Swal.fire('Operação cancelada', '', 'info')
                    }
            });
        });
        $('#editor').summernote({
            height: 300
        });

        $('.btn-upload-document').on('click',function(e){
            e.preventDefault();

            if($(this).data('type') === "prestador"){
                var typeUser = 'visible_provider';
                var provider_id = $(this).data('provider-id');
                var provider_name = $(this).data('provider-name');
                if(provider_id == ''){
                    new Swal({
                        title: 'Error!',
                        text: 'Cadastre primeiro o prestador de serviço.',
                        icon: 'error',
                     })
                     return false;
                }else{
    
                     $.ajax({
                        type: "get",
                        url: baseUrl + `/api/tipo-de-documento/${typeUser}`,
                        dataType: 'json',
                        contentType: "application/json; charset=utf-8",
                        success: function (dados) {
                            if (dados != null) {
                                    var option = '<option>Selecione o Tipo de documento</option>';
                                $.each(dados, function(i, data){
                                    option += '<option value="'+data.id+'">'+data.name+'</option>';
    
                                })
                                 $('#type_documents_id').html(option).show();
                            }
                        }
                    });
    
                    $('#providers_name').val(provider_name);
                    $('#provider_id').val(provider_id);
                    $('#documentProvider').modal('show')
                }
            }else if($(this).data('type') === "usuario"){
                var typeUser = 'visible_customer';
                var user_id = $(this).data('user-id');
                var user_name = $(this).data('user-name');
                if(user_id == ''){
                    new Swal({
                        title: 'Error!',
                        text: 'Cadastre primeiro o prestador de serviço.',
                        icon: 'error',
                     })
                     return false;
                }else{
    
                     $.ajax({
                        type: "get",
                        url: baseUrl + `/api/tipo-de-documento/${typeUser}`,
                        dataType: 'json',
                        contentType: "application/json; charset=utf-8",
                        success: function (dados) {
                            if (dados != null) {
                                    var option = '<option>Selecione o Tipo de documento</option>';
                                $.each(dados, function(i, data){
                                    option += '<option value="'+data.id+'">'+data.name+'</option>';
    
                                })
                                 $('#type_documents_id').html(option).show();
                            }
                        }
                    });
    
                    $('#user_name').val(user_name);
                    $('#user_id').val(user_id);
                    $('#documentUser').modal('show')
                }
            }
        });
        $('.btn-apply-or-reject-document').on('click',function(e){
            e.preventDefault();
            var document_id = $(this).data('document-id');
            var status   = $(this).data('status');
            var action   = $(this).data('action');
            var typeUser = $(this).data('type');
            var text     = action === "aprovar" ? "Aprovado" : "Rejeitado";
            var url      = baseUrl + `/dashboard/tipo-de-documento-${typeUser}/aprovar-ou-rejeitar/${document_id}`;

            if(document_id != '')
            {
                new Swal({
                    title: `Deseja realmente ${action} esse documento?`,
                    text: "Não será possivel a recuperação do mesmo.",
                    icon: 'info',
                    showDenyButton: true,
                    confirmButtonColor: '#1cc88a',
                    confirmButtonText: action.charAt(0).toUpperCase() + action.slice(1),
                    denyButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            method: 'PUT',
                            cors: true,
                            secure: true,
                            headers: {
                                'Access-Control-Allow-Origin': '*',
                                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                status: status,
                                action: action,
                                text: text,
                            },
                            success: function(response) {
                                window.location.reload();
                            }
                        })
                        } else if (result.isDenied) {
                            Swal.fire('Operação cancelada', '', 'info')
                        }
                });
            }else{
                new Swal({
                title: 'Error!',
                text: 'Não achou um documento relacionado.',
                icon: 'error',
             })
             return false;
            }
        })
    </script>
</body>
</html>
