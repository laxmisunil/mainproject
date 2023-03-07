<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Vaccine Centre</title>
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.top-container {
  background-color: #f1f1f1;
  padding: 30px;
  text-align: center;
}

.header {
  padding: 10px 16px;
  background: silver;
  color: black;
}

.content {
  padding: 16px;
}

.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}

.sticky + .content {
  padding-top: 102px;
}
</style>
</head>
<body>

<div class="top-container">
  <h1>Vaccinations</h1>
  <p>Free vaccinations for dogs and cats at our community!</p>
</div>

<div class="header" id="myHeader">
  <h2>Book an appointment or Contact us +91 86064 65951 pawsownvetclinic@gmail.com</h2>
</div>

<div class="content">
  <h3>Vaccinating your pet is essential for protecting them against diseases,<br> some of which can be fatal.</h3>
  <p>The header will stick to the top when you reach its scroll position.</p>
  <p>Scroll back up to remove the sticky effect.</p>
 
</div>

<script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>

</body>
</html>
