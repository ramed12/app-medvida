

    <style>

        .menu-footer {  position: fixed; bottom:0; }
        .menu-footer ul {}
        .menu-footer ul li {text-align:center; float:left; margin-left:70px; position: relative; left:-20px; list-style: none;}
        .menu-footer { padding:15px; border-top:1px solid rgba(0,0,0,.1); width:100%; }

    </style>

        <div class="menu-footer">
            <ul>
                <li> <i class="fas fa-home"></i> <BR> Início</li>
                <li> <i class="fas fa-calendar-alt"></i> <BR> Consultas </li>
                <li><i class="fas fa-question"></i> <BR> Ajuda</li>
            </ul>
        </div>



         <a href="javascript:void(0)" class="back-to-top bounce"><i class="ri-arrow-up-s-line"></i></a>

         <script src="{!! asset('assets/js/jquery.min.js') !!}"></script>
         <link rel="stylesheet" href="https://cdn.test/js/all.min.js">
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

         <script type="text/javascript">
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             </script>
    </body>
</html>
