<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="all,follow">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Sales Mate | Login </title>
		<link rel="apple-touch-icon" href="">
		<link rel="shortcut icon" href="">
		<!-- Ladda -->
		<link rel="stylesheet" href="<?=url('vendors/ladda/ladda.min.css');?>">
		<!-- Bootstrap -->
		<link href="<?=url('vendors/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">
		<!-- Font Awesome -->
		<link href="<?=url('vendors/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">
		<!-- NProgress -->
		<link href="<?=url('vendors/nprogress/nprogress.css');?>" rel="stylesheet">
		<!-- Animate.css -->
		<link href="<?=url('vendors/animate.css/animate.min.css');?>" rel="stylesheet">

		<!-- Custom Theme Style -->
		<link href="<?=url('build/css/custom.min.css');?>" rel="stylesheet">
	</head>
	<body class="login">
		<div>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                        <h1>Login Form</h1>
                        <div class="error-alert"></div>
                        <div class="form-group mt-2">
                            <label for="id" class="text-md-right"><strong>Id or Email</strong></label>
                            <input id="id" type="username" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ old('id') }}" required  autofocus>
                        </div>
                        <div class="form-group mt-2">
                            <label for="password"><strong>Password</strong></label><br>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        </div>
                        @if(Session::has('error'))
                            <div class="alert-box success">
                                <p class="text-danger">{{ Session::get('error') }}</p>
                            </div>
                        @endif
                        <div>
                            <button type="submit" class="btn btn-submit btn-primary ladda-button btn-block">Login</button>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">
                        <div class="clearfix"></div>
                        <div>
                            <h1><center><a href=""><img src=""; class='img-responsive' style="max-width:150px;"></a></center></h1>
                            <p>&copy;2017 <b>Version</b> 1.0.0 <strong>All rights reserved.</strong></p>
                            <p>default password (year-month-date)</p>
                        </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
	</body>
</html>
