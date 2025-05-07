<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AYUDA</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
	<style>
		body {
      font-family: 'Roboto', sans-serif;
      background-color: #2a2f6f;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      color: #333;
  }
  
  header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background-color: #ffffff;
      padding: 20px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  }
  
  header img {
      width: 80px;
      height: auto;
  }
  
  .title h2 {
      font-size: 36px;
      color: #2a2f6f;
      margin: 0;
      text-align: center;
  }
  
  nav {
      display: flex;
      gap: 20px;
      align-items: center;
  }
  
  nav a {
      color: #2a2f6f;
      text-decoration: none;
      padding: 5px 10px;
      transition: background-color 0.3s ease;
      font-size: 20px;
      display: inline-block;
  }
  
  nav a:hover {
      background-color: #ef1c26;
      color: white;
      border-radius: 5px;
  }
  
  /* Dropdown styles */
  .dropdown {
      position: relative;
      display: flex;
      align-items: center;
  }
  
  .dropdown-content {
      visibility: hidden;
      opacity: 0;
      position: absolute;
      background-color: #ffffff;
      min-width: 200px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
      border-radius: 5px;
      top: 100%;
      left: 0;
      transition: opacity 0.3s;
  }
  
  .dropdown:hover .dropdown-content {
      visibility: visible;
      opacity: 1;
  }
  
  .dropdown-content a {
      color: #2a2f6f;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      transition: background-color 0.3s ease;
  }
  
  .dropdown-content a:hover {
      background-color: #f1f1f1;
      color: #2a2f6f;
      border-radius: 0;
  }
  
  .dropdown-content a:first-child {
      border-radius: 5px 5px 0 0;
  }
  
  .dropdown-content a:last-child {
      border-radius: 0 0 5px 5px;
  }
  
  footer {
      background-color: #FFFFFF;
      color: #2a2f6f;
      text-align: center;
      padding: 5px;
      font-size: 24px;
      position: fixed;
      bottom: 0;
      width: 100%;
  }
  
  /* Optional: Full-width image class */
  .full-width-image {
      width: 100%;
      height: auto;
      display: block;
  }

  .hero-wrapper {
    margin-top: 80px; adjust based on your header height
  }

.hero-image {
    position: relative;
    width: 100%;
    max-height: 800px;
    overflow: hidden;
}

.hero-image img {
    width: 100%;
    height: auto;
    display: block;
    object-fit: cover;
}

.logo_about_container {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(255, 255, 255, 0.95);
    padding: 40px;
    border-radius: 10px;
    width: 90%;
    max-width: 900px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    text-align: center;
}

.logo_section {
    text-align: center; /* Center contents horizontally */
}

.logo_section img {
    width: 80px;
    margin-bottom: 10px;
    display: block;
    margin-left: auto;
    margin-right: auto;
}

.system-title {
    color: #ef1c26;
    margin: 0;
}

.about {
    margin-top: 20px;
    text-align: justify;
    color: #2a2f6f;
}

.cta-buttons {
    margin-top: 20px;
    display: flex;
    gap: 15px;
    justify-content: center;
    flex-wrap: wrap;
}

.cta-buttons a {
    text-decoration: none;
    padding: 10px 20px;
    background-color: #ef1c26;
    color: white;
    border-radius: 5px;
    font-weight: bold;
    transition: background-color 0.3s;
}

.cta-buttons a:hover {
    background-color: #c3151e;
}
  
	</style>

</head>

<body>
	<header>
		<div>
			<img src="images\dswd_removebg.png" alt="DSWD Logo">
		</div>
		<div class="title">
			<h2>AIDS</h2>
			<h2 style="font-size: 24px; margin-top: 0;">(Ayuda Integrated Distribution System)</h2>
		</div>
		<div>
			<nav>
                <a href="index.php">Home</a>
				<a href="login.php">Login</a>
				<div class="dropdown">
					<a href="#">About Us</a>
					<div class="dropdown-content">
						<a href="our_mission.php">Our Mission</a>
						<a href="our_team.php">Our Team</a>
						<a href="history.php">History</a>
						<a href="faqs.php">FAQs</a>
					</div>
				</div>
				<a href="contact_us.php">Contact Us</a>
			</nav>
		</div>
	</header>

    <div class="hero-image">
        <img src="images/img_bg.png" alt="Background" />
        <div class="logo_about_container">
            <div class="logo_section">
                <img src="images/dswd_removebg.png" alt="DSWD Logo">
                <h1 class="system-title">AYUDA INTEGRATED DISTRIBUTION SYSTEM</h1>
            </div>

            <div class="about">
                <p style="align: justify">
				AIDS or Ayuda Integrated Distribution System</b> is dedicated to revolutionizing the country's aid distribution. Our mission is to ensure that every community in need receives timely and efficient support. By harnessing cutting-edge technology, we streamline the distribution process to eliminate delays and reduce waste. We collaborate with local governments and NGOs to guarantee that resources reach those who need them most. Join us in building a stronger, more resilient infrastructure that can respond to both emergencies and long-term needs. Together, we can make a real difference. Get involved today and help us bring aid where it's needed most!<br><br><br>#BawatBuhatMayHalagaSaDSWD
                </p>

                <div class="cta-buttons">
                    <a href="learn.php">Learn More</a>
                    <a href="register.php">Get Started</a>
                    <a href="contact_us.php">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
<!-- </div> -->


	<!-- <footer>
		<p>Harley S. Reyes | BSCS - 2</p>
	</footer> -->
</body>
</html>