<?php
    if(!isset($_GET['member'])) {
        $_GET['member'] = "" ;
    }
    $notFound = 0 ;
    $memberName = htmlspecialchars(stripcslashes(trim($_GET['member'])));
    $sql = new PDO('mysql:host=localhost;port=3306;dbname=members', 'root', '');
    // To display errors
    $sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    // Qureys
    $qureyView = "SELECT * FROM members";
    $qureyViewMember = "SELECT * FROM members Where name = '$memberName'";
    // to display
    $stmt = $sql->query($qureyViewMember);
    $stmtAll = $sql->query($qureyView);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if(count($row) == 1)
        $notFound = 1 ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Members</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <!-- <link href="img/favicon.png" rel="icon"> -->
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style-yellow.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: DevFolio
    Theme URL: https://bootstrapmade.com/devfolio-bootstrap-portfolio-html-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>
  <!--/ Nav Star /-->
  <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll" href="#page-top"> IDT Egypt</a> 
      <!-- <img src="img/logo.png" style="width:30px"> -->
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll active" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="index.php#crew">Our Crew</a> 
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="index.php#stars">Our Stars</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll dropdown-toggle cart" data-toggle="dropdown" href="##">Events</a>
                    <ul class="dropdown-menu">
                    <li><a class="nav-link js-scroll" href="#"> Consulting</a></li>
                    <li><a class="nav-link js-scroll" href="#"> Institute</a></li>
                    <li><a class="nav-link js-scroll" href="#"> Internships</a></li>
                    </ul>
                </li> 
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="new.php">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="index.php#contact">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--/ Nav End /-->

  <!--/ Intro Skew Star /-->
  <div class="intro intro-single route bg-image" style="background-image: url(img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container">
          <h2 class="intro-title mb-4">Our Crew</h2>
          <ol class="breadcrumb d-flex justify-content-center">
            <li class="breadcrumb-item">
              <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item">
              <a href="new.php">New Member</a>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!--/ Intro Skew End /-->

  <!--/ Section Blog-Single Star /-->
  <section class="blog-wrapper sect-pt4" id="blog">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="post-box">
            <div class="post-thumb">
              <img src="<?php echo empty($row['photo']) ?"img/post-1.jpg" : "images/".$row['photo']?>" class="img-fluid" alt="">
            </div>
            <div class="post-meta">
                <?php if($notFound) { ?>
                    <h1 class="article-title"><?= $_GET["member"]?> Is Not a Member</h1>
                    <span class="title-s">To view our crew, please visit our<a href="index.php#crew"> Home page</a><br>
                        or see our recent members on the right</span>
                    </div>
                <?php } else { ?>
              <h1 class="article-title"><?= $row["name"]?></h1>
              <!-- <ul>
                <li>
                  <span class="ion-ios-person"></span>
                  <a href="#">Jason London</a>
                </li>
                <li>
                  <span class="ion-pricetag"></span>
                  <a href="#">Web Design</a>
                </li>
                <li>
                  <span class="ion-chatbox"></span>
                  <a href="#">14</a>
                </li>
              </ul> -->
            </div>
            <div class="article-content">
                <p><span class="title-s">Phone: </span> <span><?= $row["phone"]?></span></p>
                <p><span class="title-s">Email: </span> <span><?= $row["email"]?></span></p>
                <p><span class="title-s">Position: </span> <span><?= $row["position"]?></span></p>
                <p><span class="title-s">University: </span> <span><?= $row["uni"]?></span></p>
                <p><span class="title-s">Faculty: </span> <span><?= $row["faculty"]?></span></p>
                <p><span class="title-s">Eucational year: </span> <span><?= $row["year"]?></span></p>
                <p><span class="title-s">Date of Birth: </span> <span><?= $row["date"]?></span></p>
                <p><span class="title-s">Gender: </span> <span><?= $row["gender"]?></span></p>
              
              <blockquote class="blockquote">
                <p class="mb-0"><h1 class="title-s">Experience: </h1><div><?= $row["experience"]?></div></p>
              </blockquote>
              
            </div>
                <?php } ?>
          </div>
          <!-- <div class="box-comments">
            <div class="title-box-2">
              <h4 class="title-comments title-left">Comments (34)</h4>
            </div>
            <ul class="list-comments">
              <li>
                <div class="comment-avatar">
                  <img src="img/testimonial-2.jpg" alt="">
                </div>
                <div class="comment-details">
                  <h4 class="comment-author">Oliver Colmenares</h4>
                  <span>18 Sep 2017</span>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores reprehenderit, provident cumque
                    ipsam temporibus maiores
                    quae natus libero optio, at qui beatae ducimus placeat debitis voluptates amet corporis.
                  </p>
                  <a href="3">Reply</a>
                </div>
              </li>
              <li>
                <div class="comment-avatar">
                  <img src="img/testimonial-4.jpg" alt="">
                </div>
                <div class="comment-details">
                  <h4 class="comment-author">Carmen Vegas</h4>
                  <span>18 Sep 2017</span>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores reprehenderit, provident cumque
                    ipsam temporibus maiores
                    quae natus libero optio, at qui beatae ducimus placeat debitis voluptates amet corporis,
                    veritatis deserunt.
                  </p>
                  <a href="3">Reply</a>
                </div>
              </li>
              <li class="comment-children">
                <div class="comment-avatar">
                  <img src="img/testimonial-2.jpg" alt="">
                </div>
                <div class="comment-details">
                  <h4 class="comment-author">Oliver Colmenares</h4>
                  <span>18 Sep 2017</span>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores reprehenderit, provident cumque
                    ipsam temporibus maiores
                    quae.
                  </p>
                  <a href="3">Reply</a>
                </div>
              </li>
              <li>
                <div class="comment-avatar">
                  <img src="img/testimonial-2.jpg" alt="">
                </div>
                <div class="comment-details">
                  <h4 class="comment-author">Oliver Colmenares</h4>
                  <span>18 Sep 2017</span>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores reprehenderit, provident cumque
                    ipsam temporibus maiores
                    quae natus libero optio.
                  </p>
                  <a href="3">Reply</a>
                </div>
              </li>
            </ul>
          </div> -->
          <div class="form-comments">
            <div class="title-box-2">
              <h3 class="title-left">
                Leave a Feedback
              </h3>
            </div>
            <form class="form-mf">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <input type="text" class="form-control input-mf" id="inputName" placeholder="Name *" required>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <input type="email" class="form-control input-mf" id="inputEmail1" placeholder="Email *" required>
                  </div>
                </div>
                <div class="col-md-12 mb-3">
                  <div class="form-group">
                    <input type="url" class="form-control input-mf" id="inputUrl" placeholder="Website">
                  </div>
                </div>
                <div class="col-md-12 mb-3">
                  <div class="form-group">
                    <textarea id="textMessage" class="form-control input-mf" placeholder="Comment *" name="message"
                      cols="45" rows="8" required></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <button type="submit" class="button button-a button-big button-rouded">Send Message</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-4">
          <div class="widget-sidebar sidebar-search">
            <h5 class="sidebar-title">Search</h5>
            <div class="sidebar-content">
              <form>
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for Member..." aria-label="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-secondary btn-search" type="button">
                      <span class="ion-android-search"></span>
                    </button>
                  </span>
                </div>
              </form>
            </div>
          </div>
          <div class="widget-sidebar">
            <h5 class="sidebar-title">Recent Members</h5>
            <div class="sidebar-content">
              <ul class="list-sidebar">
              <?php while($row = $stmtAll->fetch(PDO::FETCH_ASSOC)) { ?>
                <li>
                <a href="members.php?member=<?=$row['name'] ?>"><?=$row['name'] ?></a>
                </li>
                <?php }?>
              </ul>
            </div>
          </div>
          <div class="widget-sidebar">
            <h5 class="sidebar-title">Archives</h5>
            <div class="sidebar-content">
              <ul class="list-sidebar">
                <li>
                    <a href="#">September, 2017.</a>
                </li>
                <li>
                    <a href="#">March, 2015.</a>
                </li>
                <li>
                    <a href="#">April, 2016.</a>
                </li>
                <li>
                    <a href="#">June, 2014.</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="widget-sidebar widget-tags">
            <h5 class="sidebar-title">Tags</h5>
            <div class="sidebar-content">
              <ul>
                <li>
                <a href="#">IDT</a>
                </li>
                <li>
                  <a href="#">IT</a>
                </li>
                <li>
                <a href="#">Web</a>
                </li>
                <li>
                <a href="#">CSS</a>
                </li>
                <li>
                  <a href="#">JavaScript</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Section Blog-Single End /-->

  <!--/ Section Contact-Footer Star /-->
  <section class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="copyright-box">
            <p class="copyright">&copy; Copyright <strong>IDT EGYPT</strong>.<br> You may not copy, reproduce, distribute, publish, display, perform, 
                modify, create derivative works, or in any way exploit any part of this service, except that you may 
                download material from this service for your own personal, non-commercial or educational use.<br>All Rights Reserved</p>
              <div class="credits">
                <!--
                  All the links in the footer should remain intact.
                  You can delete the links only if you purchased the pro version.
                  Licensing information: https://bootstrapmade.com/license/
                  Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=DevFolio
                -->
                <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </section>
  <!--/ Section Contact-footer End /-->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/popper/popper.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/counterup/jquery.waypoints.min.js"></script>
  <script src="lib/counterup/jquery.counterup.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/typed/typed.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
</body>
</html>
