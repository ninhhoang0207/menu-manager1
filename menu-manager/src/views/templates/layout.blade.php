<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('title')| Laravel</title>
	<!-- Bootstrap library-->
	<link href="/vendor/menu-manager/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font-awsome -->
	<link href="/vendor/menu-manager/css/font-awesome.min.css" rel="stylesheet">
	<!-- Toastr -->
	<link href="/vendor/menu-manager/css/toastr.min.css" rel="stylesheet">
	<!-- Custom Theme Style -->
	<link href="/vendor/menu-manager/build/css/custom.css" rel="stylesheet">
	@yield('header')
</head>
<body class="nav">
	<div class="container body">
		<div class="main_container">
			<!-- page content -->
			<div class="right_col row" role="main">
				<div class="col-md-10 col-md-offset-1">
				@yield('content')
				</div>
			</div>
		</div>
	</div>
	<!-- Modal delete-->
	<div id="modal-delete" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Remove</h4>
				</div>
				<div class="modal-body">
				<p>Comfirm delete?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<a href="" id="link-delete"  class="btn btn-danger" >Delete</a>
				</div>
			</div>
		</div>
	</div>
</body>
<!-- jQuery -->
<script src="/vendor/menu-manager/js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/vendor/menu-manager/js/bootstrap.min.js"></script>
<!-- Toastr -->
<script type="text/javascript" src="/vendor/menu-manager/js/toastr.min.js"></script>
<!-- Custom Theme Scripts -->
<script src="/vendor/menu-manager/build/js/custom.min.js"></script>

<script type="text/javascript">
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	@if (Session::has('success'))
		toastr.success('{{ Session::get('success') }}');
	@endif

	@if (Session::has('error'))
		toastr.error('{{ Session::get('error') }}');
	@endif

</script>
@yield('scripts')
</html>
