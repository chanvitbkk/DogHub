<?php
require_once('connect.php');
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
        $qaa = "select * from personalinfo,hashlist WHERE personalinfo.UID=hashlist.UID AND personalinfo.Ustatus='Teacher'";
        $resulta = $mysqli->query($qaa);
        if (!$resulta) {
          echo "Select failed. Error: " . $mysqli->error;
          return false;
        }
        $qab = "select * from personalinfo,hashlist WHERE personalinfo.UID=hashlist.UID AND personalinfo.Ustatus='Student'";
        $resultb = $mysqli->query($qab);
        if (!$resultb) {
          echo "Select failed. Error: " . $mysqli->error;
          return false;
        }
        $qac = "select * from personalinfo,hashlist WHERE personalinfo.UID=hashlist.UID AND personalinfo.Ustatus='Teacher' AND hashlist.Assignment = 'Yes'";
        $resultc = $mysqli->query($qac);
        if (!$resultc) {
          echo "Select failed. Error: " . $mysqli->error;
          return false;
        }
        if($hashkey==""){
          $hashkey = "No selected hashkey";
        }
                ?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="https://icons.iconarchive.com/icons/google/noto-emoji-animals-nature/256/22214-dog-face-icon.png">

  <title>DogHub</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-space-dynamic.css">
  <link rel="stylesheet" href="assets/css/animated.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <!--
    
TemplateMo 562 Space Dynamic

https://templatemo.com/tm-562-space-dynamic

-->
</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="second.php" class="logo">
              <h4>DOG<span>HUB</span></h4>
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
              <li class="scroll-to-section"><a href="#about">Upload</a></li>
              <li class="scroll-to-section"><a href="#services">Assignments</a></li>
              <li class="scroll-to-section"><a href="#blog">Students</a></li>
              <li class="scroll-to-section"><a href="first.php">Log out</a></li>
              <li class="scroll-to-section">
                <div class="main-red-button"><a href="http://localhost:8000/">Get Hashkey</a></div>
              </li>
            </ul>
            <a class='menu-trigger'>
              <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <h6>Your trusted decentralized e-Learning platform</h6>
                <h2>Welcome to <em>DOG</em><span>HUB</span> </h2>
                <p>Doghub is a dog hub run by a cat lover. Doghub is a dog hub run by a cat lover. Doghub is a dog hub run by a cat lover. </p>
                <form id="search" action="#services" method="GET">
                  <fieldset>
                    <input type="address" name="address" placeholder="Any work left today?">
                  </fieldset>
                  <fieldset>
                    <button type="submit" class="main-button">View Assignment</button>
                  </fieldset>
                </form>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="assets/images/seconddog.png" alt="team meeting">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div id="portfolio" class="our-portfolio section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 offset-lg-12">
          <div class="section-heading  wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
            <h2 style="text-align:center" >Your hashkey:<br>
            <span><?= $hashkey ?></span></h2>
          </div>
        </div>
      
      <div class="row">
        <div class="col-lg-4 col-sm-8">
          <a href="#about">
            <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
              <div class="hidden-content">
                <h4>Upload your hashkey</h4>
                <p>Easily done in one click. DogHub supports you to share your files with your friends!</p>
              </div>
              <div class="showed-content">
                 <img src="assets/images/submit.png" alt=""> 
                <!-- <div><a href="https://www.flaticon.com/authors/pixel-perfect" title="Pixel perfect"></a> </div> -->
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-8">
          <a href="#services">
            <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.4s">
              <div class="hidden-content">
                <h4>See Class Assignments</h4>
                <p>Dont miss your class assignments. Check here.</p>
              </div>
              <div class="showed-content">
                <img src="assets/images/task-list.png" alt="">
              </div>
            </div>
          </a>
        </div>
        <!-- <div class="col-lg-3 col-sm-6">
          <a href="#contact">
            <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.5s">
              <div class="hidden-content">
                <h4>See what your teachers have uploaded</h4>
                <p>Lorem ipsum dolor sit ameti ctetur aoi adipiscing eto.</p>
              </div>
              <div class="showed-content">
                <img src="assets/images/portfolio-image.png" alt="">
              </div>
            </div>
          </a>
        </div>  -->
        <div class="col-lg-4 col-sm-8">
          <a href="#blog">
            <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.6s">
              <div class="hidden-content">
                <h4>What your friends have uploaded</h4>
                <p>See interesting files of your friends.</p>
              </div>
              <div class="showed-content">
                <img src="assets/images/collaboration.png" alt="">
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div id="about" class="about-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="left-image wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
            <img src="assets/images/about-left-image.png" alt="person graphic">
           
          </div>
        </div>
        <div class="col-lg-8 align-self-center">
          <div class="services">
            <div class="row">
              <!-- <div class="col-lg-6">
                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                  <div class="icon">
                    <img src="assets/images/service-icon-01.png" alt="reporting">
                  </div>
                  <div class="right-text">
                    <h4>Data Analysis</h4>
                    <p>Lorem ipsum dolor sit amet, ctetur aoi adipiscing eliter</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
                  <div class="icon">
                    <img src="assets/images/service-icon-02.png" alt="">
                  </div>
                  <div class="right-text">
                    <h4>Data Reporting</h4>
                    <p>Lorem ipsum dolor sit amet, ctetur aoi adipiscing eliter</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.9s">
                  <div class="icon">
                    <img src="assets/images/service-icon-03.png" alt="">
                  </div>
                  <div class="right-text">
                    <h4>Web Analytics</h4>
                    <p>Lorem ipsum dolor sit amet, ctetur aoi adipiscing eliter</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="1.1s">
                  <div class="icon">
                    <img src="assets/images/service-icon-04.png" alt="">
                  </div>
                  <div class="right-text">
                    <h4>SEO Suggestions</h4>
                    <p>Lorem ipsum dolor sit amet, ctetur aoi adipiscing eliter</p>
                  </div>
                </div>
              </div> -->
              <form id="contact" action="success.php" method="post">
                <div class="row">
                  <h4>Upload your hashkey</h4><br><br>
                  <div class="col-lg-12">
                    <fieldset>
                      <input type="name" name="Uploadinghashkey" id="name" placeholder="Enter your Hash key here" autocomplete="off" required>
                    </fieldset>
                  </div>
                  <div class="col-lg-6">
                    <fieldset>
                      <input type="surname" name="hashkeyname" id="surname" placeholder="Enter your file name" autocomplete="on" required>
                    </fieldset>
                  </div>
                  <div class="col-lg-6">
                    <fieldset>
                      <input type="name" name="Assignment" id="name" placeholder="Assignment" autocomplete="on" required>
                    </fieldset>
                  </div>
                  <div class="col-lg-6">
                    <fieldset>
                      <input type="surname" name="Note" id="surname" placeholder="Note" autocomplete="on" required>
                    </fieldset>
                  </div>
                  <div class="col-lg-6">
                    <fieldset>
                      <button type="submit" id="form-submit" name="uphash" class="main-button ">Upload</button>
                    </fieldset>
                  </div>
                </div>
                <div class="contact-dec">
                  <img src="assets/images/contact-decoration.png" alt="">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div id="services" class="our-services section">
    <div class="container">
      <div class="col-lg-12 wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
        <h1>
          <font color="#000000"><em>Class Assignments</em>
        </h1><br>
      </div>
      <div class="row">
        <div class="col-lg-12 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Teacher</th>
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
                  <td><a><?= $rowc['Hashkey'] ?></a></td>
                  <td><a><?= $rowc['Filename'] ?></a></td>
                  <td><a><?= $rowc['Note'] ?></a></td>
                  <?php $thisislinkc = 'https://ipfs.io/ipfs/' . $rowc['Hashkey'];
                  //	echo $thisislink;  
                  ?>
                  <td>
                    <form action="<?= $thisislinkc ?>" target="_blank">
                      <li class="scroll-to-section">
                        <div class="main-red-button"><a href="<?= $thisislinkc ?> " target="_blank">Download</a></div>
                      </li>

                    </form>

                  </td>
                <?php
              }
                ?>
                </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


  <div id="contact" class="contact-us section">
    <div class="container">
      <div class="col-lg-12 wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
        <h1>
          <font color="#FFFFFF"><em>Other</em><span> uploads from your teachers</span>
        </h1><br>
        <h4>Sometimes your teachers upload something interesting and they are NOT assignments!!</h4><br>
      </div>
      <div class="row">
        <div class="col-lg-12 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>
                  <font color="#FFFFFF">No.
                </th>
                <th>
                  <font color="#FFFFFF">Uploader
                </th>
                <th>
                  <font color="#FFFFFF">Status
                </th>
                <th>
                  <font color="#FFFFFF">Assignment
                </th>
                <th>
                  <font color="#FFFFFF">Hash Key
                </th>
                <th>
                  <font color="#FFFFFF">File Name
                </th>
                <th>
                  <font color="#FFFFFF">Note
                </th>
                <th>
                  <font color="#FFFFFF">Go to download
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($rowa = $resulta->fetch_array()) {
              ?> <tr>
                  <td>
                    <font color="#FFFFFF"><a><?= $rowa['HID'] ?></a>
                  </td>
                  <td>
                    <font color="#FFFFFF"><a><?= $rowa['Fname'] ?></a>
                  </td>
                  <td>
                    <font color="#FFFFFF"><a><?= $rowa['Ustatus'] ?></a>
                  </td>
                  <td>
                    <font color="#FFFFFF"><a><?= $rowa['Assignment'] ?></a>
                  </td>
                  <td>
                    <font color="#FFFFFF"><a><?= $rowa['Hashkey'] ?></a>
                  </td>
                  <td>
                    <font color="#FFFFFF"><a><?= $rowa['Filename'] ?></a>
                  </td>
                  <td>
                    <font color="#FFFFFF"><a><?= $rowa['Note'] ?></a>
                  </td>
                  <?php $thisislinka = 'https://ipfs.io/ipfs/' . $rowa['Hashkey'];
                  //	echo $thisislink;  
                  ?>
                  <td>
                    <form action="<?= $thisislinka ?>" id="search" target="_blank">
                      <li class="scroll-to-section">
                        <div class="main-white-button"><a href="<?= $thisislinka ?> " target="_blank">Download</a></div>
                      </li>
                      <!-- <div class="main-red-button"><button type="submit" class="main-button" name="downin" >View Assignment</button></div> -->
                      <!-- <input tabindex="3" class="btn btn-inverse" type="submit" name="downin" value="Download"> -->

                    </form>
                  </td>
                <?php
              }
                ?>
                </tr>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>


  <!-- <div id="contact" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <div class="section-heading">
            <h2>Feel Free To Send Us a Message About Your Website Needs</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doer ket eismod tempor incididunt ut labore et dolores</p>
            <div class="phone-info">
              <h4>For any enquiry, Call Us: <span><i class="fa fa-phone"></i> <a href="#">010-020-0340</a></span></h4>
            </div>
          </div>
        </div>
        <div class="col-lg-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <form id="contact" action="" method="post">
            <div class="row">
              <div class="col-lg-6">
                <fieldset>
                  <input type="name" name="name" id="name" placeholder="Name" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                  <input type="surname" name="surname" id="surname" placeholder="Surname" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <textarea name="message" type="text" class="form-control" id="message" placeholder="Message" required=""></textarea>  
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="main-button ">Send Message</button>
                </fieldset>
              </div>
            </div>
            <div class="contact-dec">
              <img src="assets/images/contact-decoration.png" alt="">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div> -->

  <div id="blog" class="our-blog section">
    <div class="container">
      <div class="col-lg-12 wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
        <h1>
          <font color="#000000"><em>Student</em><span>Table</span>
        </h1><br>
      </div>
      <div class="row">
        <div class="col-lg-12 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
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
                  <?php $thisislinkb = 'https://ipfs.io/ipfs/' . $rowb['Hashkey'];
                  //	echo $thisislink;  
                  ?>
                  <td>
                    <form action="<?= $thisislinkb ?>" target="_blank">

                      <li class="scroll-to-section">
                        <div class="main-red-button"><a href="<?= $thisislinkb ?> " target="_blank">Download</a></div>
                      </li>

                    </form>

                  </td>
                <?php
              }
                ?>
                </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
          <p>© Copyright 2021 KrataiKhongPreePhoo All Rights Reserved.

          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- Scripts -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/animation.js"></script>
  <script src="assets/js/imagesloaded.js"></script>
  <script src="assets/js/templatemo-custom.js"></script>

</body>

</html>