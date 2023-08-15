@if (Session::has('alert'))
    {{-- <div class="row">
    	<div style="position:relative; top:20px;" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    		<div class="alert alert-{!!session('alert.tipo')!!} alert-dismissible fade show py-2" role="alert">
			  {!! session('alert.text') !!}
			  <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
    	</div>
    </div> --}}


    <script>sweetAlert('', "{!! session('alert.text') !!}", "{!!session('alert.tipo')!!}");</script>


@endif
