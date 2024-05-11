<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("location: finallogin.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
  <head>
  <title>Online grocerry store</title>
  <link rel="stylesheet" href="home1.css">
  </head> 
<body>
        <header>
            <div>
                <div>
                    <div id="first">we are open up 24/7 | <i class="fa fa-phone"></i> <a href="contact.php" id="link">contact us</a></div>
                </div>
                    <div class="wrap">
                        <div class="search">
                           <input type="text" class="searchTerm" placeholder="What are you looking for?">
                           <button type="submit" class="searchButton">
                             <i class="fa fa-search"></i>
                           </button>
                          <span>
                          <nav class="head-list">
                            <table>
                           <th> <a href="logout.php"><i class="fa fa-sign-in" aria-hidden="true"></i> LOGOUT</a></th>
                           <th> <a href="checkout.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> CHECKOUT</a></th>
                            </table>
                          </nav>
                          </span>
                        </div>
                     </div>
                </span><br>
                <div class="topnav">

            <a class="active" href="home1.php">Home</a>
            <a href="beveragesuser.php">Beverages</a>
            <a href="dessertsuser.php ">desserts</a>
            <a href="snacksuser.php">Snacks</a>
            <a href="fruitsuser.php" >fruits</a>

                </div>

            </div>   
            <script>
              window.onscroll = function() {scrollFunction()};
              
              function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                  document.getElementById("topnav").style.top = "0";
                } else {
                  document.getElementById("topnav").style.top = "-50px";
                }
              }
              </script>  
              <div class="slideshow-container">

                <div class="mySlides fade">
                  <div class="numbertext">1 / 3</div>
                  <img src="images/backroundMain.jpg" style="width:100%">
                  <div class="text">Caption Text</div>
                </div>
                
                <div class="mySlides fade">
                  <div class="numbertext">2 / 3</div>
                  <img src="images/background1.jpg" style="width:100%">
                  <div class="text">Caption Two</div>
                </div>
                <div class="mySlides fade">
                  <div class="numbertext">3 / 3</div>
                  <img src="images/background2.jpg" style="width:100%">
                  <div class="text">Caption Two</div>
                </div>
                <div class="mySlides fade">
                  <div class="numbertext">4 / 3</div>
                  <img src="images/background8.jpg" style="width:100%">
                  <div class="text">Caption Two</div>
                </div>
                
                <div class="mySlides fade">
                  <div class="numbertext">5 / 3</div>
                  <img src="images/background5.jpg" style="width:100%">
                  <div class="text">Caption Three</div>
                </div>
                </div>
                <br>
                
                <div style="text-align:center">
                  <span class="dot"></span> 
                  <span class="dot"></span> 
                  <span class="dot"></span> 
                  <span class="dot"></span> 
                  <span class="dot"></span> 
                  <span class="dot"></span> 
                </div>
                
                <script>
                let slideIndex = 0;
                showSlides();
                
                function showSlides() {
                  let i;
                  let slides = document.getElementsByClassName("mySlides");
                  let dots = document.getElementsByClassName("dot");
                  for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";  
                  }
                  slideIndex++;
                  if (slideIndex > slides.length) {slideIndex = 1}    
                  for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                  }
                  slides[slideIndex-1].style.display = "block";  
                  dots[slideIndex-1].className += " active";
                  setTimeout(showSlides, 2000); // Change image every 2 seconds
                }
                </script>
                
  </body>
</html>              