<?php 
      include("mail.php");
 ?>
<html>
<head>
  <title>Welcome to HotHomeINC!</title>
  <link rel="stylesheet" type="text/css" href="style/css/contactUs.css">

  <link rel="stylesheet" type="text/css" href="style/css/index.css">
</head>

<body>

  <div id="mainContainer">

    <div id="topContainer">



      <div id="navBarContainer">
        <nav class="navBar">

          <a href="index.php" class="navItem" class="logo" style="text-decoration: none; font-size: 25px; color: #07d159">
            HotHomeINC.
          </a>


          <div class="group">

            <div class="navItem">
              <a href="search.php" class="navItemLink">Search
                <img src="assets/images/icons/search.png" class="icon" alt="Search">
              </a>
            </div>

          </div>

          <div class="group">
            <div class="navItem">
              <a href="buy.php" class="navItemLink">Buy</a>
            </div>

            <div class="navItem">
              <a href="sell.php" class="navItemLink">Sell</a>
            </div>

            <div class="navItem">
              <a href="explore.php" class="navItemLink">Explore</a>
            </div>

            <div class="navItem">
              <a href="profile.php" class="navItemLink">Kunal Sharma</a>
            </div>

            <div class="navItem">
              <a href="register.php" class="navItemLink">Sign out</a>
            </div>
            <div class="navItem">
              <a href="ContactUs.php" class="navItemLink">Contact Us</a>
            </div>
          </div>




        </nav>

      
      

      </div>


    
         <div id="mainViewContainer">

              <div id="mainContent">
                   <h1>Contact us on our Email</h1>

                  <form id="loginForm"  method="POST">
                  
                    <p>
                      
                      <label for="name">Your Name</label>
                      <input id="name" name="name" type="text" placeholder="Your username" required>
                    </p>
                    <p>
                      <label for="email">Your Email</label>
                      <input id="email" name="email" type="email" placeholder="Your email" required>
                    </p>
                    <p>
                      <label for="email">Your Phone No</label>
                      <input id="phone" name="phone" type="text" placeholder="Your Number" required>
                    </p>
                    <p>
                      <label for="subject">Subject</label>
                      <input id="subject" name="subject" type="text" placeholder="email subject" required>
                    </p>
                    <p>
                      <label for="message">Message</label>
                      <input id="message" name="message" type="text" placeholder="your message" required>
                    </p>

                  <button type="submit"  value="send" name="submit" id="submit">Send message</button>
                  
                  
                </form>

               
              </div>

               
      
         
        </div>

      

    </div>

  </div>

  


</body>
