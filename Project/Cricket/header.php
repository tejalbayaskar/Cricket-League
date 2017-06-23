<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>The Cricket</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/dropdown.css">
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="footer.css">
  <link rel="stylesheet" href="css/carousal.css">
  <link rel="stylesheet" href="css/modal.css">
  <link rel="stylesheet" href="css/contact.css">
  <link rel="stylesheet" href="css/table.css">
  <link rel="stylesheet" href="css/image.css">
  

  <script src="js/jquery.js"></script>
 <script src="js/bootstrap.js"></script>
 <script src="js/contact.js"></script>
<script src="js/modal.js"></script>
 </head>
<body style=" padding-top: 50px; ">


<nav class="navbar navbar-default navbar-fixed-top" style="background-image: url(images/back.jpg);border:0px;height:60px;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><font size="6" face="Times New Roman" style="color:white;">THE CRICKET</font></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

     <ul class="nav navbar-nav navbar-right">
        <li>
           
      <?php
            if(isset($_SESSION['uname']))
            {
              echo ' Logged in as ' .$_SESSION['uname'];
            }
            else
            {
              ?>


        <a data-toggle="modal" href="#sign-up-modal" class="dropbtn" style="color:white;"> 
            <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Log In</a>

          <?php
          }

          ?>



        </li>
      </ul>


      
<form class="navbar-form navbar-right">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Player Search">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
      </form>

     
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



<!--second navigation bar-->
<nav class="navbar navbar-default" style="background-color: #081725;border:0px;margin-top:-1px;">
<div class="row">


  <div class="col-lg-2">
  </div>

<div class="col-lg-1"><a href="index.php" class="dropbtn">Home</a></div>

<div class="col-lg-1">
 <div class="dropdown">
 <a href="#" class="dropbtn">News</a>
    <div class="dropdown-content">
      <a href="news.php">Latest News</a>
        <a href="blogs.php">Blogs</a>
  </div>
</div>
</div>
  



<div class="col-lg-1">
   <div class="dropdown">
    <a href="#" class="dropbtn">Countries</a>
  <div class="dropdown-content">
  <a href="countrypage.php?countryname=INDIA">India</a>
  <a href="countrypage.php?countryname=AUSTRALIA">Australia</a>
  <a href="countrypage.php?countryname=ENGLAND">England</a>
  <a href="countrypage.php?countryname=ZIMBABWE">Zimbabwe</a>
  <a href="countrypage.php?countryname=SRI%20LANKA">Sri Lanka</a>
  <a href="countrypage.php?countryname=WEST%20INDIES">West Indies</a>
  </div>
  </div>
</div>

  <div class="col-lg-1"><a href="leaderboard.php" class="dropbtn">Leaderboard</a>
</div>
<div class="col-lg-1"><a href="schedule.php" class="dropbtn">Schedule</a>
  </a></div>

<div class="col-lg-2"><a href="contactus.php" class="dropbtn">Contact Us</a></div>


</div>
</div>
</nav>
<!--end of two navigations-->











<!--################# MODAL ########################-->
<div class="modal fade" id="sign-up-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
      <div class="modal-content">
       

        <div class="modal-header" align="center">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
          </button>
        </div>           
                 <!-- Begin # DIV Form -->
                <div id="div-forms"> 
               

               <!-- Begin | Register Form -->
                    <form id="register-form" style="display:none;"  action="signup.php" method="POST">
                    <div class="modal-body">
                    <h3 align="center"><span class="glyphicon glyphicon-user" aria-hidden="true" ></span> Sign Up</h3>
                <div id="div-register-msg">
                                <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-register-msg">Register an account.</span>
                            </div>
                            <br>
                                            <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input id="register_fullname" type="text" class="form-control" placeholder="Full Name" name="fname" required />
                        </div>

                    </div>
                     <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input id="register_username" type="text" class="form-control" placeholder="Username" name="uname"  required/>
                        </div>
                    </div>


                      <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                            </span>
                            <input id="register_email" type="text" class="form-control" placeholder="Email Address" name="email" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            <input id="register_password" type="password" class="form-control" placeholder="Password" name="pass" required/>
                        </div>
                    </div>
                     <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            <input id="register_repassword" type="password" class="form-control" placeholder="Confirm Password" name="cpass" required />
                        </div>
                    </div>
                    </div>
                <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block" name="btn-sign">Register</button>
                            </div>
                            <div>
                                <button id="register_login_btn" type="button" class="btn btn-link">Log In</button>
                                <button id="register_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
                            </div>
                </div>
                    </form>
                    <!-- End | Register Form -->
                   
                    <!-- Begin # Login Form -->
                    <form id="login-form"  action="login.php" method="POST">
                    <div class="modal-body">
                    <h3 align="center"><span class="glyphicon glyphicon-log-in" aria-hidden="true" ></span> Log In</h3>
                    
                <div id="div-login-msg">
                                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-login-msg">Type your username and password.</span>
                            </div>
                            <br>
                             <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                            </span>
                        
                <input id="login_username" class="form-control" type="text" placeholder="Username" name="uname" required/>
                </div></div>

                 <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span>
                            </span>
                        
                <input id="login_password" class="form-control" type="password" placeholder="Password" name="pass" required/>
                </div></div>


                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Remember me
                                </label>
                            </div>
                  </div>
                <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block" name="btn-login">Login</button>
                            </div>
                  <div>
                                <button id="login_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
                                <button id="login_register_btn" type="button" class="btn btn-link">Register</button>
                            </div>
                </div>
                    </form>
                    <!-- End # Login Form -->

                    <!-- Begin | Lost Password Form -->
                    <form id="lost-form" style="display:none;">
                  <div class="modal-body">
                  <h3 align="center"><span class="glyphicon glyphicon-lock" aria-hidden="true" ></span> Forgot your password?</h3>
                <div id="div-lost-msg">
                                <div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-lost-msg">Type your e-mail.</span>
                            </div>

                            <br>
                 <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                            </span>
                        
                <input id="lost_email" class="form-control" type="text" placeholder="Type Registered E-Mail" name="email" required/>
                  </div>
                  </div></div>
                <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
                            </div>
                            <div>
                                <button id="lost_login_btn" type="button" class="btn btn-link">Log In</button>
                                <button id="lost_register_btn" type="button" class="btn btn-link">Register</button>
                            </div>
                </div>
                    </form>
                    <!-- End | Lost Password Form -->
                    
    </div> <!-- End # DIV Form -->
                </div>
      </div>
    </div>  <!-- END # MODAL LOGIN -->