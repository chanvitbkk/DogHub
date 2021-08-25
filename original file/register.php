<?php require_once('connect.php');
session_start();
$_SESSION['UID']=null;
$_SESSION['HashKey']=null; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>DogHub - Upload/Download system</title>
</head>

<body>
    <div class="jumbotron text-center" style="margin-bottom:0 ;margin-top:10px">
        <h1>DogHub Decentralized E-learning System</h1>
        <p>Connect each others easily</p>
    </div>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a style="margin-left:20px" class="navbar-brand" href="http://localhost:8000/">DogHub</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
		<a style="margin-left:20px" class="navbar-brand" href="register.php">Hash Key</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <!--<ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="upload.html">Upload/Download</a>
                </li>
            </ul> -->
            <!--<ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="order.php">Post</a>
                </li>
            </ul>-->
        </div>
    </nav>

                            </body>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
		<!-- bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">      
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">		
		<link href="themes/css/bootstrappage.css" rel="stylesheet"/>
		
		<!-- global styles -->
		<link href="themes/css/flexslider.css" rel="stylesheet"/>
		<link href="themes/css/main.css" rel="stylesheet"/>

		<!-- scripts -->
		<script src="themes/js/jquery-1.7.2.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>				
		<script src="themes/js/superfish.js"></script>	
		<script src="themes/js/jquery.scrolltotop.js"></script>
		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
	</head>
    <body>		
		<div id="wrapper" class="container">
			<section class="header_text sub">
				<h4><span>Login or Regsiter</span></h4>
			</section>			
			<section class="main-content">				
				<div class="row">
					<div class="span5">					
						<h4 class="title"><span class="text"><strong>Login</strong> Form</span></h4>
						<form action="hashlist.php" method="post">
							<input type="hidden" name="next" value="/">
							<fieldset>
								<div class="control-group">
									<label class="control-label">Hash key</label>
									<div class="controls">
										<input type="text" placeholder="Enter your Hash key (if needed)" name="Hashkey" class="input-xlarge">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Username</label>
									<div class="controls">
										<input type="text" placeholder="Enter your username" name="Username" class="input-xlarge">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Password</label>
									<div class="controls">
										<input type="password" placeholder="Enter your password" name="Password" class="input-xlarge">
									</div>
								</div>
								<div class="control-group">
									<input tabindex="3" class="btn btn-inverse large" type="submit" name="sublog" value="Sign into your account">
								</div>
							</fieldset>
						</form>				
					</div>
					<div class="span7">					
						<h4 class="title"><span class="text"><strong>Register</strong> Form</span></h4>
						<form action="sucess.php" method="post" class="form-stacked">
							<fieldset>
								<div class="control-group">
									<label class="control-label">Username:</label>
									<div class="controls">
										<input type="text" placeholder="Enter your username" name="Username" class="input-xlarge">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Password:</label>
									<div class="controls">
										<input type="password" placeholder="Enter your password" name="Password" class="input-xlarge">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">First Name:</label>
									<div class="controls">
										<input type="text" placeholder="Enter your first name" name="Fname" class="input-xlarge">
									</div>
                                </div>
								<div class="control-group">
									<label class="control-label">Last Name:</label>
									<div class="controls">
										<input type="text" placeholder="Enter your last name" name="Lname" class="input-xlarge">
									</div>
                                </div>
                                <div class="control-group">
									<label class="control-label">Status:</label>
									<div class="controls">
										<input type="text" placeholder="Enter your status" name="Ustatus" class="input-xlarge">
									</div>
                                </div>                    
								<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" name="subreg" value="Create your account"></div>
							</fieldset>
						</form>					
					</div>				
				</div>
			</section>			
			<section id="copyright">
				<span>Copyright 2021 KrataiKhongPreePhoo Team  All right reserved.</span>
			</section>
		</div>
		<script src="themes/js/common.js"></script>
		<script>
			$(document).ready(function() {
				$('#checkout').click(function (e) {
					document.location.href = "checkout.html";
				})
			});
		</script>		
    </body>
</html>