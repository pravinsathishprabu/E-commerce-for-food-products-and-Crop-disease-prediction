<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Farmer | Home</title>
	<style type="text/css">
	.mySlides {display: none}
	img {vertical-align: middle;}
	.slideshow-container {
  	width: 100%;
  	position: relative;
 	overflow-x: hidden;
  	margin: auto;
    font-family: 'Ibarra Real Nova', serif;
	}
	@media only screen and (max-width: 600px) {
		 .prev, .next {
		 	display: none;
		 }
		 .img{
		    width: 380px;
		    height: 380px;
		  }

		}
	.prev, .next {
	  cursor: pointer;
	  position: absolute;
	  top: 45%;
	  width: auto;
	  padding: 16px;
	  margin-top: -22px;
	  font-weight: bold;
	  border: 1px solid black;
	  font-size: 18px;
	  border-radius: 80px;
	  transition: 0.6s ease;
	  user-select: none;
	  margin: 10px;
	}
	.prev{
		margin-left: 60px;
	}
	.next {
	  right: 0;
	  margin-right: 60px;
	}
	.prev:hover, .next:hover {
	  background-color: lightgreen;
	}

	</style>
</head>
<body>
	<center>
	<div style="border-bottom: 1px solid black;">
		@include('Farmer/navbar')
	</div>
</center>
<div class="slideshow-container mt-4">
  <div class="mySlides">
     <center><img src="/asset/image/1.jpg" class="img" width="80%" height="500px"></center>
  </div>

  <div class="mySlides">
    <center><img src="/asset/image/2.jpg" class="img" width="80%" height="500px"></center>
  </div>

  <div class="mySlides">
    <center><img src="/asset/image/3.jpg" class="img" width="80%" height="500px"></center>
  </div>

  <div class="mySlides">
    <center><img src="/asset/image/4.jpg" class="img" width="80%" height="500px"></center>
  </div>

  <div class="mySlides">
    <center><img src="/asset/image/5.jpg" class="img" width="80%" height="500px"></center>
  </div>

<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>

</div>
<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}
  x[myIndex-1].style.display = "block";
  setTimeout(carousel, 6000);
}	

let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
</body>
</html>