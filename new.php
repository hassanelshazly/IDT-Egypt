<?php
    $required = ['name' => ' ', 'phone' => '','email' => '','date' => '','gender' => '','uni' => '',
                'faculty' => '','year' => '','experience' => '','position' => ''];
    // 0 -> no error 
    // 1 -> name error
    // 2 -> phone error
    // 3 -> email error
    // 4 -> missing element
    $flag = 0 ; 
    $successful = 0;
    $photo = "";
    $sql = new PDO('mysql:host=localhost;port=3306;dbname=members', 'root', '');
    // To not display errors
    $sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
    // Qureys
    $qureyView = "SELECT * FROM members";
    $qureyViewMember = "SELECT * FROM members Where name = ''";
    $qureyAdd  = "INSERT INTO members (name, phone, email, date, gender, uni, faculty, year, experience, position, photo) 
                           VALUES (:name, :phone, :email, :date, :gender, :uni, :faculty, :year, :experience, :position, :photo)";

    // validate
    if(isset($_POST["submit"])) {
        if(!preg_match("/^[a-zA-Z ]*$/", $_POST['name'])){
            $flag = 1; 
        }
        else if(!preg_match("/(01)[0125]\d{8}$/", $_POST['phone'])){
            $flag = 2; 
        }
        else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $flag = 3; 
        }
        foreach ($_POST as $key => &$value) {
            $value = trim($value);
            $value = stripcslashes($value);
            $value = htmlspecialchars($value);
            if (empty($value)) {
                $required[$key] = "*" ;
                $flag = 4;
            }
        }
        unset($value);
    }
    // image
    if(isset($_FILES["uploadedImg"])) {
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["uploadedImg"]["name"]) ;
        if(getimagesize($_FILES["uploadedImg"]["tmp_name"]) && !file_exists($target_file)) {
            if(move_uploaded_file($_FILES["uploadedImg"]["tmp_name"], $target_file))
                $photo = basename($_FILES["uploadedImg"]["name"]) ;
        }
    }
   
    // add to database
    if(isset($_POST["submit"]) && !$flag) {
        $statment = $sql->prepare($qureyAdd);
        if(!$statment->execute(array(':name' => $_POST['name'], ':phone' => $_POST['phone'], ':email' => $_POST['email'], 
                                    ':date' => $_POST['date'], ':gender' => $_POST['gender'], ':uni' => $_POST['uni'], 
                                    ':faculty' => $_POST['faculty'], ':year' => $_POST['year'], ':experience' => $_POST['experience'],
                                    ':position' => $_POST['position'], ':photo' => $photo))) {
            if($statment->errorInfo()[1] == 1062);
                $flag = 5;
            } else {
                $successful = 1;
                header('Location: members.php?member='.$_POST['name']);
                exit;
        }
   }
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<head>
  <title>New Member</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="css/new.css" rel="stylesheet">
</head>

<body>
   <!--/ Nav Star /-->
   <nav class="navbar navbar-default navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll" href="index.php"> IDT Egypt</a> 
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <div class="navbar-collapse collapse justify-content-end" id="navbarDefault" style="display:inherit!important; float:right !important">
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
            <a class="nav-link js-scroll dropdown-toggle" data-toggle="dropdown" href="##">Events</a>
                    <ul class="dropdown-menu">
                    <li><a class="nav-link js-scroll" href="#"> Consulting</a></li>
                    <li><a class="nav-link js-scroll" href="#"> Institute</a></li>
                    <li><a class="nav-link js-scroll" href="#"> Internships</a></li>
                    </ul>
                </li> 
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="inew.php">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="index.php#contact">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--/ Nav End /-->
  <form class="form" action="" method="post" id="registrationForm" enctype="multipart/form-data">
<div class="container bootstrap snippet">
    <div class="row">
  		<div class="col-sm-10"><h1>Add New Member</h1></div>	
    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
              
          
      <div class="text-center">
        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
        <h6>Upload a different photo...</h6>
        <input type="file" class="text-center center-block file-upload" name="uploadedImg">
      </div><br>
          <div class="panel panel-default">
            <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
            <div class="panel-body"><a href="http://localhost/finalproject/index.php">IDT EGYPT</a></div>
          </div>
          <ul class="list-group">
            <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
          </ul> 
          <br>
          
        </div><!--/col-3-->
    	<div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">New Member</a></li>
              </ul>

              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                  
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Full name <span class="error"><?php echo " ", $required['name'] ?></span></h4></label>
                              <input type="text" class="form-control" name="name" id="first_name" placeholder="Full name" 
                              value="<?php echo isset($_POST["name"]) ? htmlspecialchars($_POST["name"]) : "" ; ?>">
                               
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h4>Phone <span class="error"><?php echo " ", $required['phone'] ?></h4></label>
                              <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" 
                              value="<?php echo isset($_POST["phone"]) ? htmlspecialchars($_POST["phone"]) : "" ; ?>">
                          </div>
                      </div>
          
                    
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>E-mail <span class="error"><?php echo " ", $required['email'] ?></h4></label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" 
                              value="<?php echo isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : "" ; ?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="date"><h4>Date of Birth <span class="error"><?php echo " ", $required['date'] ?></h4></label>
                              <input type="date" class="form-control" id="date" name="date" placeholder="1/1/1999" 
                              value="<?php echo isset($_POST["date"]) ? htmlspecialchars($_POST["date"]) : "" ; ?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="uni"><h4>University <span class="error"><?php echo " ", $required['uni'] ?></h4></label>
                              <input type="text" class="form-control" name="uni" id="uni" placeholder="University" 
                              value="<?php echo isset($_POST["uni"]) ? htmlspecialchars($_POST["uni"]) : "" ; ?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="faculty"><h4>Faculty <span class="error"><?php echo " ", $required['faculty'] ?></h4></label>
                              <input type="text" class="form-control" name="faculty" id="faculty" placeholder="Faculty" 
                              value="<?php echo isset($_POST["faculty"]) ? htmlspecialchars($_POST["faculty"]) : "" ; ?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                        <div class="col-xs-6">
                          <label for="year"><h4>Educational year<span class="error"><?php echo " ", $required['year'] ?></h4></label>
                            <input type="text" class="form-control" name="year" id="year" placeholder="year" 
                              value="<?php echo isset($_POST["year"]) ? htmlspecialchars($_POST["year"]) : "" ; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                          
                        <div class="col-xs-6">
                          <label for="position"><h4>Activity Position<span class="error"><?php echo " ", $required['position'] ?></h4></label>
                            <input type="text" class="form-control" name="position" id="position" placeholder="position" 
                              value="<?php echo isset($_POST["position"]) ? htmlspecialchars($_POST["position"]) : "" ; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                          
                        <div class="col-xs-12">
                          <label for="experience"><h4>Past Experience<span class="error"><?php echo " ", $required['experience'] ?></h4></label>
                            <input type="text" class="form-control" name="experience" id="experience" placeholder="Experience" 
                              value="<?php echo isset($_POST["experience"]) ? htmlspecialchars($_POST["experience"]) : "" ; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                          
                        <div class="col-xs-6">
                            <label for="gender"><h4>Gender <span class="error"><?php echo " ", $required['gender'] ?></h4></label>
                            <span style="padding-right:20px"></span>
                            <input type="radio"  name="gender" value="Male" checked="checked" > Male
                            <span style="padding-right:10px"></span>
                            <input type="radio"  name="gender" value="Female"> Female
                        </div>
                        <div class="col-xs-12">
                        <?php 
                            if($flag == 4) {
                                echo '<h5 class="error">* Required Field</h5>' ;
                            } else if ($flag == 1) {
                                echo '<h5 class="error">Name must be characters only</h5>';
                            } else if ($flag == 2) {
                                echo '<h5 class="error">Please, Enter a vaild phone number</h5>';
                            } else if ($flag == 3) {
                                echo '<h5 class="error">Please, Enter a vaild email</h5>';
                            } else if ($flag == 5) {
                                echo '<h5 class="error">You\'re Already Registered before</h5>';
                            } ?>
                        </div>
                    </div>
                    
                      <div class="form-group">
                           <div class="col-xs-12">
                                <!-- <br> -->
                              	<button class="btn btn-lg btn-success" name="submit" value="1" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                               	<button class="btn btn-lg" id= "rest" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                      </div>
                      <br> <br>
              
              
              <hr>
              
             </div><!--/tab-pane-->
               
            
          </div><!--/tab-content-->

        </div><!--/col-9-->
       
    </div><!--/row-->
    </form>
    <footer style="text-align:center">
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
    <script>

    $(document).ready(function() {

        
        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.avatar').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }


        $(".file-upload").on('change', function(){
            readURL(this);
        });
    });

    $("#rest").click(function(){
        <?php
        if($flag or $successful )
            echo "location.href = location.href;"
        ?>
    });

    </script>
</body>
                                                      