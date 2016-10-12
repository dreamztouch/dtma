<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>404 Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ URL::asset('bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom Style -->
    <link href="{{ URL::asset('css/custom-style.css') }}" rel="stylesheet">

</head>

<body class="body-bg">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 margin-top-1">
				<img src="{{ URL::asset('images/404.png') }}">
				<h3>SORRY</h3>
				<p>The Page You Are Looking For</p>
				<p>Is Not Found</p>
				<a class="link-button" href="{{ URL::asset('admin/dashboard') }}">Dashboard</a>
				<a class="link-button" href="">Doctors</a>
				<a class="link-button" href="{{ URL::asset('admin/hospital') }}">Hospitals</a>
				<a class="link-button" href="{{ URL::asset('admin/ambulance') }}">Ambulance</a>
				<a class="link-button" href="{{ URL::asset('admin/bloodbank') }}">Bloodbank</a>
			</div>
			<!-- /.col-lg-6 -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</body>
</html> 