<head>
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Raleway" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/styles.css">
<style>
    * {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

html {
	font-size: 16px;
	font-family: "Raleway", sans-serif;
	color: #555;
}

ul,
nav {
	list-style: none;
}

a {
	text-decoration: none;
	opacity: 0.75;
	color: #fff;
}

a:hover {
	opacity: 1;
}

a.btn {
	border-radius: 4px;
	text-transform: uppercase;
	font-weight: bold;
	text-align: center;
	background-color: rgb(248, 238, 223);
	opacity: 1;
	transition: all 400ms;
}

a.btn:hover {
	background-color: rgb(197, 110, 3);
}

section {
	display: flex;
	flex-direction: column;
	align-items: center;
	padding: 100px 80px;
}

section:not(.hero):nth-child(even) {
	background-color: #f5f5f5;
}

.grid {
	width: 100%;
	display: flex;
	flex-wrap: wrap;
	justify-content: center;
}

hr {
	width: 250px;
	height: 3px;
	background-color: #e07e7b;
	border: 0;
	margin-bottom: 50px;
}

.image-1 {
	background-image: url("https://images6.alphacoders.com/375/375292.jpg");
}

.image-2 {
	background-image: url("https://www.petbasics.com/sites/g/files/adhwdz411/files/2020-08/dog-and-cat-laying-on-ground.jpg");
}

.image-3 {
	background-image: url("https://d1yxio7e17x1c5.cloudfront.net/app/uploads/20191006105514/iStock-529121920.jpg");
}

.image-4 {
	background-image: url("https://www.medivet.co.uk/globalassets/assets/medivet-stock-photography/dog-720x405.jpg?width=585");
}

section h3.title {
	text-transform: capitalize;
	font: bold 48px "Amatic SC", sans-serif;
	margin-bottom: 30px;
	text-align: center;
}

section p {
	max-width: 775px;
	line-height: 2;
	padding: 0 20px;
	margin-bottom: 30px;
	text-align: center;
}

@media (max-width: 800px) {
	section {
		padding: 50px 20px;
	}
}

/*Header Styles*/

header {
	position: absolute;
	width: 100%;
	display: flex;
	justify-content: space-between;
	align-items: center;
	padding: 35px 100px 0;
	animation: 1s fadein 0.5s forwards;
	opacity: 0;
	color: #fff;
	z-index: 2;
}

@keyframes fadein {
	100% {
		opacity: 1;
	}
}

header h2 {
	font-family: "Amatic SC", sans-serif;
}

header nav {
	display: flex;
	margin-right: -15px;
}

header nav li {
	margin: 0 15px;
}

@media (max-width: 800px) {
	header {
		padding: 20px 50px;
		flex-direction: column;
	}

	header h2 {
		margin-bottom: 15px;
	}
}

/*Hero Styles*/

.hero {
	position: relative;
	justify-content: center;
	text-align: center;
	min-height: 100vh;
	color: #fff;
}

.hero .background-image {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background-image: url("https://d.newsweek.com/en/full/1795389/golden-retriever-cat-lying-grass.jpg?w=1600&h=900&q=88&f=16bfa434e7bc9fdf50649fb475fc4e31");
	background-size: cover;
	z-index: -1;
	background-color: #80a3db;
}

.hero h1 {
	font: 72px "Amatic SC", sans-serif;
	text-shadow: 2px 2px rgba(0, 0, 0, 0.3);
	margin-bottom: 15px;
}

.hero h3 {
	font: 28px "Raleway", sans-serif;
	font-weight: 300;
	text-shadow: 2px 2px rgba(0, 0, 0, 0.3);
	margin-bottom: 40px;
}

.hero a.btn {
	padding: 20px 46px;
}

.hero-content-area {
	opacity: 0;
	margin-top: 100px;
	animation: 1s slidefade 1s forwards;
}

@keyframes slidefade {
	100% {
		opacity: 1;
		margin: 0;
	}
}

@media (max-width: 800px) {
	.hero {
		min-height: 600px;
	}

	.hero h1 {
		font-size: 48px;
	}

	.hero h3 {
		font-size: 24px;
	}

	.hero a.btn {
		padding: 15px 40px;
	}
}

/*Destinations Section*/

.destinations .grid li {
	height: 350px;
	padding: 20px;
	background-clip: content-box;
	background-size: cover;
	background-position: center;
}

.destinations .grid li.small {
	flex-basis: 30%;
}

.destinations .grid li.large {
	flex-basis: 70%;
}

@media (max-width: 1100px) {
	.destinations .grid li.small,
	.destinations .grid li.large {
		flex-basis: 50%;
	}
}

@media (max-width: 800px) {
	.destinations .grid li.small,
	.destinations .grid li.large {
		flex-basis: 100%;
	}
}

/*Packages Section*/

.packages .grid li {
	padding: 50px;
	flex-basis: 50%;
	text-align: center;
}

.packages .grid li i {
	color: #e07e7b;
}

.packages .grid li h4 {
	font-size: 30px;
	margin: 25px 0;
}

@media (max-width: 800px) {
	.packages .grid li {
		flex-basis: 100%;
		padding: 20px;
	}
}

/*Testimonials Section*/

.testimonials .quote {
	font-size: 22px;
	font-weight: 300;
	line-height: 1.5;
	margin: 40px 0 25px;
}

@media (max-width: 800px) {
	.testimonials .quote {
		font-size: 18px;
		margin: 15px 0;
	}

	.testimonials .author {
		font-size: 14px;
	}
}

/*Contact Section*/

.contact form {
	display: flex;
	align-items: center;
	justify-content: center;
	flex-wrap: wrap;
	width: 60%;
}

.contact form .btn {
	padding: 18px 42px;
}

.contact form input {
	padding: 15px;
	margin-right: 30px;
	font-size: 18px;
	color: #555;
	flex: 1;
}

@media (max-width: 1000px) {
	.contact form input {
		flex-basis: 100%;
		margin: 0 0 20px 0;
	}
}

/*Footer Section*/

footer {
	display: flex;
	align-items: center;
	justify-content: space-around;
	background-color: #555;
	color: #fff;
	padding: 20px 0;
}

footer ul {
	display: flex;
}

footer ul li {
	margin-left: 16px;
}

footer p {
	text-transform: uppercase;
	font-size: 14px;
	opacity: 0.6;
	align-self: center;
}

@media (max-width: 1100px) {
	footer {
		flex-direction: column;
	}

	footer p {
		text-align: center;
		margin-bottom: 20px;
	}

	footer ul li {
		margin: 0 8px;
	}
}


</style>

</head>
<body>
  <!-- Forked from a template on Tutorialzine: https://tutorialzine.com/2016/06/freebie-landing-page-template-with-flexbox -->
  <header>
    <h2><a href="">Paws' Own</a></h2>
    <nav>
      <!--<li><a style="color:black" href="about.php">About</a></li>
      <li><a style="color:black" href="contact.php">Contact</a></li>-->
      <li><a style="color:black" href="register.php">Register</a></li>
    </nav>
  </header>

  <section class="hero">
    <div class="background-image"></div>
    <div class="hero-content-area">
      <h1>Every Pet is Unique. Let's Celebrate it! </h1>
      <h3>Care them with Love</h3>
      <a href="login.php" class="btn" style="color:black">Explore More</a>
    </div>
  </section>

  <section class="destinations">
    <h3 class="title">Our Services</h3>
    <p>Your pet deserves a day full of pampering! Paws' own offers your fur buddy a wide range of products & services.
		We provide free consultation for your pets delivered by our certified veterinarian Dr. Sidharth Sharma who adore your pets with all his heart.</p>
    <hr>

    <ul class="grid">
      <li class="small image-1"></li>
      <li class="large image-2"></li>
      <li class="large image-3"></li>
      <li class="small image-4"></li>
    </ul>
  </section>

  <section class="packages">
    <h3 class="title">Simply The Best For Your Pet</h3>
    <p>We offer a variety of foods and accessories for your pets.Explore more on our website.We've got the perfect products and services for you.</p>
    <hr>

    <ul class="grid">
      <li>
        <!--<i class="fa fa-compass fa-4x"></i>-->
        <h4>Genuine Products</h4>
        <p>Looking for the the best products? Take a tour on our webpage. We'll show you the perfect products for pampering your pet.</p>
      </li>
      <li>
        <!--<i class="fa fa-camera-retro fa-4x"></i>-->
        <h4>Vertified Vet Consultation</h4>
        <p>Need expert care at the comfort of your home? 80% of a pet's health can be solved online.Get a health check up for your pet.</p>
      </li>
     
    </ul>
  </section>
  <center>
    <br><p style="font-size:12.8px">© Copyright 2022  |  All rights reserved | www.pawsown.in</p><br>

  <!--<section class="testimonials">
    <h3 class="title">Testimonials from our adventurers:</h3>
    <hr>
    <p class="quote">Wow! This tour made me realize how much I love being outside with my friends. After going on one of these tours, I can safely say that beer pong is my favorite game all time, also the cultural programs were really interesting!</p>
    <p class="author">- Albert Herter</p>
    <p class="quote">Wow, this really blew my mind. We had so much fun at the beach, and also some hidden secrets revealed. Come on, I'm living in this city for 5 years. Amazing!</p>
    <p class="author">- Sharon Rosenberg</p>
    <p class="quote">If you want to understand your friends better, head to the mountains. I mean, seriously. It's like sitting next to a campfire and just talk in the sunset, woah. You know? It's like that.</p>
    <p class="author">- Luis Mendoza</p>
  </section>-->

  <!--<section class="contact">
    <h3 class="title">Learn more</h3>
    <p>Want to know about our upcoming events, or come to one of our mixers? Just sign up for our mailing list. No spam from us, we promise! Except for the spam we give you to keep up your energy while you're having fun with your friends. Have a blast! We have tons of that.</p>
    <hr>
    <form>
      <input type="email" placeholder="Email">
      <a href="#" class="btn">Subscribe now</a>
    </form>
  </section>

  <footer>
    <p>Images courtesy of <a href="http://unsplash.com/">unsplash</a>.</p>
    <p>Why are you even reading this?! There's never anything interesting in the footer!</p>
    <ul>
      <li><a href="#"><i class="fa fa-twitter-square fa-2x"></i></a></li>
      <li><a href="#"><i class="fa fa-facebook-square fa-2x"></i></a></li>
      <li><a href="#"><i class="fa fa-snapchat-square fa-2x"></i></a></li>
    </ul>
  </footer>-->
