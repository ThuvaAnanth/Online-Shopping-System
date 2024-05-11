<!DOCTYPE html>
<html lang="en">
<head>
     <title>Home</title>
     <link rel="stylesheet" href="home.css">
</head>
<body onload="slider1()">   
     <div class="body">
          <div class="banner">
               <div class="slider">
                    <img src="images/background.jpg" id="slideImg">
               </div>
          </div>
          <div class="overLay">
           <div>
           <header class="fix">
              <div class="nav-rea">
                         <div class="logo">
                              <div class="name">
                                   <span class="green">MA</span>MA'S STORE
                              </div>

                              <div>
                                   <ul class="menu-area">
                                        <li><a href="Home1.php" class="header">Home</a></li>
                                        <li><a href="Aboutus.php" class="header">About Us</a></li>
                                        <li><a href="feedback.php" class="header">Feedback</a></li>
                                        <li><a href="contact.php" class="header">Contact</a></li>
                                   </ul>
                              </div>
                         </div>
                         
              </div>
              <div class="banner-text">
                <h2>We are <span class="blue" >Creative</span></h2>
                <p>We bulid Explore Your Choice</p>
                <div class="btn">
    <a href="finalregister.php" class="header">Register</a>
    <a href="finallogin.php" class="header">Login</a>
</div>
              </div>
		</header>
          </div>
     </div>

     <script>
                    var slideImg = document.getElementById("slideImg");
          var images1 = new Array(
               "images/images.jpeg",
               "images/images2.png",
               "images/images3.webp"
          );

          var len=images1.length;
          var i=0;
          function slider1(){
               if(i>len-1){
                    i=0
               }
               slideImg.src=images1[i];
               i++;
               setTimeout('slider1()',10000);
          }
     </script>
     <style>
        /* Footer styles */
        footer {
            background-color: rosybrown;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .footer-text {
            font-size: 24px;
            margin: 0;
        }
    </style>
</head>
<body>
    <!-- Your HTML content -->
    
    <footer>
        <p class="footer-text">&copy; 2023 Our Company. All rights reserved.</p>
    </footer>
</body>
</html>
