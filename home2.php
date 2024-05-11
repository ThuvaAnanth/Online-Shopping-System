<!DOCTYPE html>
<html lang="en">
<head>
     <title>Home</title>
     <link rel="stylesheet" href="home2.css">
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
                <button class="btn"><h3>Sign in / Sign Up</h3></button>
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
</body>
</html>
