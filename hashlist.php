<?php require_once('connect.php');
session_start();
if ($_SESSION['UID'] != null) {
	$uid = $_SESSION['UID'];
	$hashkey = $_SESSION["HashKey"];
} else {
	if (isset($_POST['sublog'])) {
		$hashkey = $_POST["Hashkey"];
		$username = $_POST["Username"];
		$passwd = $_POST["Password"];
		if ($username == null or $passwd == null) {
			echo "Please fill in Username and Password.";
?><form action="register.php">
				<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" value="Back"></div>
			</form><?php
					return null;
				} else {
					$q = "select * from personalinfo where Username = '$username' AND Password='$passwd'";
					$result = $mysqli->query($q);
					$row = $result->fetch_array();
					$rowcount = mysqli_num_rows($result);

					if ($rowcount == 0) {
						echo "Username or Password is wrong, Please try again.";
					?><form action="register.php">
					<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" value="Back"></div>
				</form><?php
						return false;
					} else {
						$_SESSION['UID'] = $row['UID'];
						$_SESSION['HashKey'] = $hashkey;
					}
				}
			}
		}
//for teacher
		$qaa = "select * from personalinfo,hashlist WHERE personalinfo.UID=hashlist.UID AND personalinfo.Ustatus='Teacher'";
		$resulta = $mysqli->query($qaa);
		if (!$resulta) {
			echo "Select failed. Error: " . $mysqli->error;
			return false;
		}
//for student
		$qab = "select * from personalinfo,hashlist WHERE personalinfo.UID=hashlist.UID AND personalinfo.Ustatus='Student'";
		$resultb = $mysqli->query($qab);
		if (!$resultb) {
			echo "Select failed. Error: " . $mysqli->error;
			return false;
		}
//for assignment
		$qac = "select * from personalinfo,hashlist WHERE personalinfo.UID=hashlist.UID AND personalinfo.Ustatus='Teacher' AND hashlist.Assignment = 'Yes'";
		$resultc = $mysqli->query($qac);
		if (!$resultc) {
			echo "Select failed. Error: " . $mysqli->error;
			return false;
		}
						?>
<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<!--  <link rel="stylesheet" href="style.css">   -->
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
		<a style="margin-left:20px" class="navbar-brand" href="hashlist.php">HashKey</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a style="margin-left:20px" class="navbar-brand" href="#teacher">TeacherHash</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a style="margin-left:20px" class="navbar-brand" href="#student">StudentHash</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a style="margin-left:20px" class="navbar-brand" href="#assignment">Assignment</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
		</div>
	</nav>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
		<!-- bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="themes/css/bootstrappage.css" rel="stylesheet" />

		<!-- global styles -->
		<link href="themes/css/flexslider.css" rel="stylesheet" />
		<link href="themes/css/main.css" rel="stylesheet" />

		<!-- scripts -->
		<script src="themes/js/jquery-1.7.2.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="themes/js/superfish.js"></script>
		<!--	<script src="themes/js/jquery.scrolltotop.js"></script>  -->
		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>
		<div id="wrapper" class="container smooth-edge">
			<br>
			<section class="header_text sub">
				<h4><span><mark>Your Hash Key: </mark></span></h4>
				<br>
				<td><a><?php echo $hashkey; ?></a></td>
			</section>
		</div>
		<div id="wrapper" class="container smooth-edge">
			<br>
			<br>
			<section class="header_text sub">
				<h4><span><mark>Upload Hash Key</mark></span></h4>
				<br>
				<form action="success.php" method="post">
					<fieldset>
						<div class="form-group">
							<label class="control-label">Hash key</label>
							<div class="form-group">
								<input type="text" style="height:30px" placeholder="Enter your Hash key here" name="Uploadinghashkey" class="input-xlarge">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">File Name</label>
							<div class="form-group">
								<input type="text" style="height:30px" placeholder="Enter your file name" name="hashkeyname" class="input-xlarge">
							</div>
						</div>

						<div class="form-group">
									<label class="control-label">Assignment:</label>
									<div class="controls">
									<select name="Assignment">
    									<option value="Yes">Yes</option>
   										<option value="No">No</option>
 									</select>
									</div>
                                </div>     

						<div class="form-group">
							<label class="control-label">Note</label>
							<div class="form-group">
								<input type="text" style="height:30px" placeholder="Note" name="Note" class="input-xlarge">
							</div>
						</div>
						<div class="form-group">
							<input tabindex="3" class="btn btn-inverse btn-sm" type="submit" name="uphash" value="Upload">
						</div>
					</fieldset>
				</form>
				<br>
				<h4><span><mark>Want to Download?</mark></span></h4>
				<br>
				<form action="http://localhost:8000/">
					<fieldset>
						<div class="control-group">
							<input tabindex="3" class="btn btn-inverse" type="submit" name="uphash" value="Go to Download">
						</div>
					</fieldset>
				</form>
			</section>
		</div>
		<div id="wrapper" class="container smooth-edge">
			<br>
			<section class="header_text sub">
				<h4 id="teacher"><span><mark>Teacher Hash Key</mark></span></h4>
			</section>
			<section class="main-content">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>No.</th>
							<th>Uploader</th>
							<th>Status</th>
							<th>Assignment</th>
							<th>Hash Key</th>
							<th>File Name</th>
							<th>Note</th>
							<th>Go to download</th>
						</tr>
					</thead>
					<tbody>
						<?php
						while ($rowa = $resulta->fetch_array()) {
						?> <tr>
								<td><a><?= $rowa['HID'] ?></a></td>
								<td><a><?= $rowa['Fname'] ?></a></td>
								<td><a><?= $rowa['Ustatus'] ?></a></td>
								<td><a><?= $rowa['Assignment'] ?></a></td>
								<td><a><?= $rowa['Hashkey'] ?></a></td>
								<td><a><?= $rowa['Filename'] ?></a></td>
								<td><a><?= $rowa['Note'] ?></a></td>
								<?php	$thisislinka = 'https://ipfs.io/ipfs/'. $rowa['Hashkey'];
						//	echo $thisislink;  ?>
							<td>
							<form action="<?= $thisislinka ?>" target="_blank">
					
						<div class="control-group">
							<input tabindex="3" class="btn btn-inverse" type="submit" name="downin" value="Download">
						</div>
					
				</form>
						
								</td>
							<?php
						}
							?>
							</tr>
					</tbody>
				</table>
				<br>
			</section>
		</div>
		<div id="wrapper" class="container smooth-edge">
			<br>
			<section class="header_text sub">
				<h4 id="student"><span><mark>Student Hash Key</mark></span></h4>
			</section>
			<section class="main-content">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>No.</th>
							<th>Uploader</th>
							<th>Status</th>
							<th>Assignment</th>
							<th>Hash Key</th>
							<th>File Name</th>
							<th>Note</th>
							<th>Go to download</th>
						</tr>
					</thead>
					<tbody>
						<?php
						while ($rowb = $resultb->fetch_array()) {
						?> <tr>
								<td><a><?= $rowb['HID'] ?></a></td>
								<td><a><?= $rowb['Fname'] ?></a></td>
								<td><a><?= $rowb['Ustatus'] ?></a></td>
								<td><a><?= $rowb['Assignment'] ?></a></td>
								<td><a><?= $rowb['Hashkey'] ?></a></td>
								<td><a><?= $rowb['Filename'] ?></a></td>
								<td><a><?= $rowb['Note'] ?></a></td>
								<?php	$thisislinkb = 'https://ipfs.io/ipfs/'. $rowb['Hashkey'];
						//	echo $thisislink;  ?>
							<td>
							<form action="<?= $thisislinkb ?>" target="_blank">
					
						<div class="control-group">
							<input tabindex="3" class="btn btn-inverse" type="submit" name="downin" value="Download">
						</div>
				
				</form>
						
								</td>
							<?php
						}
							?>
							</tr>
					</tbody>
				</table>
				<br>
			</section>
		</div>

		<div id="wrapper" class="container smooth-edge">
			<br>
			<section class="header_text sub">
				<h4 id="assignment"><span><mark>Assignment</mark></span></h4>
			</section>
			<section class="main-content">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>No.</th>
							<th>Uploader</th>
							<th>Status</th>
							<th>Hash Key</th>
							<th>File Name</th>
							<th>Note</th>
							<th>Go to download</th>
						</tr>
					</thead>
					<tbody>
						<?php
						while ($rowc = $resultc->fetch_array()) {
						?> <tr>
								<td><a><?= $rowc['HID'] ?></a></td>
								<td><a><?= $rowc['Fname'] ?></a></td>
								<td><a><?= $rowc['Ustatus'] ?></a></td>
								<td><a><?= $rowc['Hashkey'] ?></a></td>
								<td><a><?= $rowc['Filename'] ?></a></td>
								<td><a><?= $rowc['Note'] ?></a></td>
							<?php	$thisislinkc = 'https://ipfs.io/ipfs/'. $rowc['Hashkey'];
						//	echo $thisislink;  ?>
							<td>
							<form action="<?= $thisislinkc ?>" target="_blank">
					
						<div class="control-group">
							<input tabindex="3" class="btn btn-inverse" type="submit" name="downin" value="Download">
						</div>
					
				</form>
						
								</td>
							<?php
						}
							?>
							</tr>
					</tbody>
				</table>
				<br>
			</section>
		</div>
		<footer>
			<section id="copyright">
				<h5>
					<center>Copyright 2021 KrataiKhongPreePhoo Team All right reserved.</center>
				</h5>
			</section>
		</footer>
		<script src="themes/js/common.js"></script>
		<script>
			$(document).ready(function() {
				$('#checkout').click(function(e) {
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


