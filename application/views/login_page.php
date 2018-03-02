<!doctype html>
	<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
	<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
	<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
	<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <title>Petty Cash - Login</title>
	    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <link rel="apple-touch-icon" href="apple-icon.png">
	    <link rel="shortcut icon" href="favicon.ico">

	    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/normalize.css">
	    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
	    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/themify-icons.css">
	    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/flag-icon.min.css">
	    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/cs-skin-elastic.css">
	    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-select.less"> -->
	    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/scss/style.css">

	    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

	    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

	</head>
	<body class="bg-dark">

	    <div class="sufee-login d-flex align-content-center flex-wrap">
	        <div class="container">
	            <div class="login-content">
	                <div class="login-logo">
	                    <a href="index.html">
	                        <img class="align-content" href="/" src="<?php echo base_url(); ?>assets/images/logo.png" alt="">
	                    </a>
	                </div>
	                <div class="login-form">
	                    <form method="post" action="<?php echo base_url('login'); ?>">
	                        <div class="form-group">
	                            <label>Email address</label>
	                            <input type="email" class="form-control" name="email" placeholder="Email">
	                        </div>
	                        <div class="form-group">
	                            <label>Password</label>
	                            <input type="password" class="form-control" name="password" placeholder="Password">
	                        </div>
	                        <!-- <div class="checkbox">
	                            <label>
	                                <input type="checkbox"> Remember Me
	                            </label>
	                            <label class="pull-right">
	                                <a href="#">Forgotten Password?</a>
	                            </label>

	                        </div> -->
	                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>

	                        <div class="register-link m-t-15 text-center">
	                            <p>Don't have account ? <a href="<?php echo base_url('login/register'); ?>"> Sign Up Here</a></p>
	                        </div>

	                        <?php
							$success_msg= $this->session->flashdata('success_msg');
							$error_msg= $this->session->flashdata('error_msg');

							if($success_msg){ ?>
							<div class="alert alert-success">
								<?php echo $success_msg; ?>
							</div>
							<?php
							}
							if($error_msg){ ?>
							<div class="alert alert-danger">
								<?php echo $error_msg; ?>
							</div>
							<?php } ?>

							<?php echo validation_errors(); ?>

	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>


	    <script src="<?php echo base_url(); ?>assets/js/vendor/jquery-2.1.4.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/lib/popper-js/dist/umd/popper.min.js"></script>
	    <script src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
	    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>


	</body>
</html>