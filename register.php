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
<!--    <link rel="stylesheet" href="style.css">  -->
	<link rel="shortcut icon" href="https://icons.iconarchive.com/icons/google/noto-emoji-animals-nature/256/22214-dog-face-icon.png">
    <title>DogHub - Upload/Download system</title>
</head>

<body>
    <div class="jumbotron text-center" style="margin-bottom:0 ;margin-top:10px">
        <h1>DogHub Decentralized E-learning System</h1>
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
		<!-- scripts
		<script src="themes/js/jquery.scrolltotop.js"></script>-->
		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
	</head>
    <body>		
		<div id="wrapper" class="container smooth-edge">
			<section class="header_text sub">
				<br>
				<h4><span><mark> Login or Regsiter</mark></span></h4>
			</section>			
			<section class="center">				
				<div>
					<div>					
						<h4 class="title"><span class="text"><strong>Login</strong> Form</span></h4>
						<form action="hashlist.php" method="post">
							<input type="hidden" name="next" value="/">
							<fieldset>
								<div class="control-group">
									<label class="control-label">Hash key:</label>
									<div class="controls">
										<input type="text" style="height:30px" placeholder="Enter your Hash key (if needed)" name="Hashkey" class="input-xlarge">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Username:</label>
									<div class="controls">
										<input type="text" style="height:30px" placeholder="Enter your username" name="Username" class="input-xlarge">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Password:</label>
									<div class="controls">
										<input type="password" style="height:30px" placeholder="Enter your password" name="Password" class="input-xlarge">
									</div>
								</div>
								<div class="control-group">
									<input tabindex="3" class="btn btn-inverse large" type="submit" name="sublog" value="Sign into your account">
								</div>
							</fieldset>
						</form>				
					</div>
					<div>					
						<h4 class="title"><span class="text"><strong>Register</strong> Form</span></h4>
						<form action="sucess.php" method="post" class="form-stacked">
							<fieldset>
								<div class="control-group">
									<label class="control-label">Username:</label>
									<div class="controls">
										<input type="text" style="height:30px" placeholder="Enter your username" name="Username" class="input-xlarge">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Password:</label>
									<div class="controls">
										<input type="password" style="height:30px" placeholder="Enter your password" name="Password" class="input-xlarge">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">First Name:</label>
									<div class="controls">
										<input type="text" style="height:30px" placeholder="Enter your first name" name="Fname" class="input-xlarge">
									</div>
                                </div>
								<div class="control-group">
									<label class="control-label">Last Name:</label>
									<div class="controls">
										<input type="text" style="height:30px" placeholder="Enter your last name" name="Lname" class="input-xlarge">
									</div>
                                </div>
                                <div class="control-group">
									<label class="control-label">Status:</label>
									<div class="controls">
									<select name="Ustatus">
    									<option value="Student">Student</option>
   										<option value="Teacher">Teacher</option>
 									</select>
									</div>
                                </div>                    
								<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" name="subreg" value="Create your account"></div>
							</fieldset>
						</form>		
						<br>			
					</div>				
				</div>
			</section>			
		</div>
		<footer>
		<section id="copyright">
				<h5><center>Copyright 2021 KrataiKhongPreePhoo Team All right reserved.</center></h5>
			</section>
		</footer>
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
<?php

define('E_FATAL',  E_ERROR | E_USER_ERROR | E_PARSE | E_CORE_ERROR | 
        E_COMPILE_ERROR | E_RECOVERABLE_ERROR);

define('ENV', 'dev');

//Custom error handling vars
define('DISPLAY_ERRORS', TRUE);
define('ERROR_REPORTING', E_ALL | E_STRICT);
define('LOG_ERRORS', TRUE);

register_shutdown_function('shut');

set_error_handler('handler');

//Function to catch no user error handler function errors...
function shut(){

    $error = error_get_last();

    if($error && ($error['type'] & E_FATAL)){
        handler($error['type'], $error['message'], $error['file'], $error['line']);
    }

}

function handler( $errno, $errstr, $errfile, $errline ) {

    switch ($errno){

        case E_ERROR: // 1 //
            $typestr = 'E_ERROR'; break;
        case E_WARNING: // 2 //
            $typestr = 'E_WARNING'; break;
        case E_PARSE: // 4 //
            $typestr = 'E_PARSE'; break;
        case E_NOTICE: // 8 //
            $typestr = 'E_NOTICE'; break;
        case E_CORE_ERROR: // 16 //
            $typestr = 'E_CORE_ERROR'; break;
        case E_CORE_WARNING: // 32 //
            $typestr = 'E_CORE_WARNING'; break;
        case E_COMPILE_ERROR: // 64 //
            $typestr = 'E_COMPILE_ERROR'; break;
        case E_CORE_WARNING: // 128 //
            $typestr = 'E_COMPILE_WARNING'; break;
        case E_USER_ERROR: // 256 //
            $typestr = 'E_USER_ERROR'; break;
        case E_USER_WARNING: // 512 //
            $typestr = 'E_USER_WARNING'; break;
        case E_USER_NOTICE: // 1024 //
            $typestr = 'E_USER_NOTICE'; break;
        case E_STRICT: // 2048 //
            $typestr = 'E_STRICT'; break;
        case E_RECOVERABLE_ERROR: // 4096 //
            $typestr = 'E_RECOVERABLE_ERROR'; break;
        case E_DEPRECATED: // 8192 //
            $typestr = 'E_DEPRECATED'; break;
        case E_USER_DEPRECATED: // 16384 //
            $typestr = 'E_USER_DEPRECATED'; break;

    }

    $message = '<b>'.$typestr.': </b>'.$errstr.' in <b>'.$errfile.'</b> on line <b>'.$errline.'</b><br/>';

    if(($errno & E_FATAL) && ENV === 'production'){

        header('Location: 500.html');
        header('Status: 500 Internal Server Error');

    }

    if(!($errno & ERROR_REPORTING))
        return;

    if(DISPLAY_ERRORS)
        printf('%s', $message);

    //Logging error on php file error log...
    if(LOG_ERRORS)
        error_log(strip_tags($message), 0);

}

ob_start();

//@include 'content.php';

ob_end_flush();
?>