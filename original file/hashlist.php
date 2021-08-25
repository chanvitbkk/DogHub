<?php require_once('connect.php'); 
session_start();
if($_SESSION['UID'] != null){
	$uid = $_SESSION['UID'];
	$hashkey = $_SESSION["HashKey"];
}
else{ 
if(isset($_POST['sublog'])) {
	$hashkey = $_POST["Hashkey"];
	$username = $_POST["Username"];
	$passwd = $_POST["Password"]; 
					$q="select * from personalinfo where Username = '$username' AND Password='$passwd'";
					}
					$result=$mysqli->query($q);
					if($result==null){
						echo "Select failed. Error: ".$mysqli->error ;
						return false;
                    }
                    else{
				 $row=$result->fetch_array();
				 $_SESSION['UID'] = $row['UID'];
				 $_SESSION['HashKey'] = $hashkey; }}

					 $qaa="select * from personalinfo,hashlist WHERE personalinfo.UID=hashlist.UID";
					$resulta=$mysqli->query($qaa);
					if(!$resulta){
						echo "Select failed. Error: ".$mysqli->error ;
						return false;
					} ?>
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
		<a style="margin-left:20px" class="navbar-brand" href="hashlist.php">Hash Key</a>
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
				<h4><span>Your Hash Key: </span></h4>
					<td><a><?php echo $hashkey; ?></a></td>
			</section>	
		</div>
		<div id="wrapper" class="container">
		<section class="header_text sub">
				<h4><span>Upload Hash Key  </span></h4>
					<form action="success.php" method="post">
					<fieldset>
						<div class="control-group">
									<label class="control-label">Hash key</label>
									<div class="controls">
										<input type="text" placeholder="Enter your Hash key here" name="Uploadinghashkey" class="input-xlarge">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">File Name</label>
									<div class="controls">
										<input type="text" placeholder="Enter your file name" name="hashkeyname" class="input-xlarge">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Note</label>
									<div class="controls">
										<input type="text" placeholder="Note" name="Note" class="input-xlarge">
									</div>
								</div>
								<div class="control-group">
							<input tabindex="3" class="btn btn-inverse large" type="submit" name="uphash" value="Upload">
							</div>
						</fieldset>
					</form>
				<h4><span>Want to Download?</span></h4>
					<form action="http://localhost:8000/">
					<fieldset>
						<div class="control-group">
							<input tabindex="3" class="btn btn-inverse large" type="submit" name="uphash" value="Go to Download">
						</div>
					</fieldset>
			</section>	
		</div>
		<div id="wrapper" class="container">
			<section class="header_text sub">
				<h4><span>Hash key List</span></h4>
			</section>			
			<section class="main-content">							
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Hash ID</th>
									<th>Uploader</th>
									<th>Status</th>
									<th>Hash Key</th>
									<th>File Name</th>
									<th>Note</th>
								</tr>
							</thead>
							<tbody>
							<?php 
							while($rowa=$resulta->fetch_array()) {
								?> <tr> 
                                    <td><a><?=$rowa['HID']?></a></td>
									<td><a><?=$rowa['Fname']?></a></td>
									<td><a><?=$rowa['Ustatus']?></a></td>
									<td><a><?=$rowa['Hashkey']?></a></td>
									<td><a><?=$rowa['Filename']?></a></td>
									<td><a><?=$rowa['Note']?></a></td>
								<?php
								}
								 ?>
								</tr>			  	  
							</tbody>
						</table>									
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