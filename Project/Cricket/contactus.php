<?php  
  include("header.php");
?>
<!--################################# ABOUT THE TEAM #######################################-->



<div class="container">
    <div class="row team" style="padding: 25px; margin: 25px;background-color:#00004C;">

    <h2><center> About the Team </center></h2>
        <div class="col-md-4" style="background-color: #9999FF;">
        <center>
            <img class="img-responsive img-circle" alt="pic" src="images/221.png">
            <h4>

                Tejal Bayaskar

            </h4>
            <p>

                Lorem ipsum dolor sit amet, consectetur adipiscing…

                <br>

                 quisque tempus ac eget diam et laoreet phasellus …

            </p>
        </center>
        </div>

        <div class="col-md-4" style="background-color:#9999FF;">
        <center>
            <img class="img-responsive img-circle" alt="pic" src="images/221.png" >
            <h4>

                Amruta Tapadiya

            </h4>
            <p>

                Lorem ipsum dolor sit amet, consectetur adipiscing…

                <br>

                 quisque tempus ac eget diam et laoreet phasellus …

            </p>
        </center>
        </div>

        <div class="col-md-4" style="background-color:#9999FF;">
        <center>
            <img class="img-responsive img-circle" alt="pic" src="images/221.png">
            <h4>

                Sushmita Kumari

            </h4>
            <p>

                Lorem ipsum dolor sit amet, consectetur adipiscing…

                <br>

                 quisque tempus ac eget diam et laoreet phasellus …

            </p>
          </center>
        </div>
    </div>
</div>




<hr>







<!--################################# CONTACT US FORM #######################################-->
<div style="padding: 50px; margin: 50px;">
<form id="contact-form">
  <p><h2>Contact Us</h2></p>
    <p><input type="text" name="your-name" id="us" minlength="3" placeholder="(your name here)" required> </p>
    <p><input type="email" name="your-email" id="us" placeholder="(your email address)" required></p>
  <p>
    <textarea name="your-message" id="us" placeholder="(your msg here)" class="expanding" required></textarea>
  </p>
  <p>
    <button type="submit">
      <svg version="1.1" class="send-icn" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100px" height="36px" viewBox="0 0 100 36" enable-background="new 0 0 100 36" xml:space="preserve">
        <path d="M100,0L100,0 M23.8,7.1L100,0L40.9,36l-4.7-7.5L22,34.8l-4-11L0,30.5L16.4,8.7l5.4,15L23,7L23.8,7.1z M16.8,20.4l-1.5-4.3
	l-5.1,6.7L16.8,20.4z M34.4,25.4l-8.1-13.1L25,29.6L34.4,25.4z M35.2,13.2l8.1,13.1L70,9.9L35.2,13.2z" />
      </svg>
      <small>send</small>
    </button>
  </p>
</form>
</div>



<?php
  include("footer.php");
?>