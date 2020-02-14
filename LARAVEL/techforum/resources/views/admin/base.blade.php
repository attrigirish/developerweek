<!DOCTYPE html>
<html>
<head>
	<title>TechForum</title>

	<!-- CSS -->
	<link href="{{ Storage::url('css/bootstrap.min.css') }}" rel="stylesheet">
	<!-- End CSS -->
</head>
<body>
		
	<div class="container-fluid">
		<!-- header -->
		<div class="row">
			<div class="col-md-10">
			</div>
			<div class="col-md-2">
				@if(Cookie::get('userid'))
				<a href="/admin">Welcome</a>
				<a href="/admin/logout">Logout</a>
				@endif
			</div>
		</div>

		<!-- content -->
		<div class="content">
			@yield('content')
		</div>

		<!-- footer -->
		<div class="footer">
		</div>
	</div>

	<script src="{{ Storage::url('js/jquery.min.js') }}"></script>
</body>
</html>