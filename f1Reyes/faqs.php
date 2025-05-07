<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Our Mission | AYUDA</title>
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
      box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
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
    }

    .dropdown-content a:hover {
      background-color: #f1f1f1;
      color: #2a2f6f;
    }


    .hero-image {
      position: relative;
      width: 100%;
      max-height: 800px;
      height: 100vh;
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

    .system-title {
      color: #ef1c26;
      margin: 0;
      font-size: 36px;
    }

    .about {
      margin-top: 20px;
      text-align: justify;
      color: #2a2f6f;
      font-size: 18px;
    }
  </style>
</head>

<body>

  <header>
    <div>
      <img src="images/dswd_removebg.png" alt="DSWD Logo">
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
        <h1 class="system-title">Frequently Asked Questions</h1>
        <div class="about">
            <p><b>Q: Who can register for AYUDA?</b><br>A: Any Filipino in need of government assistance may register, subject to validation.</p>
            <p><b>Q: Is the registration free?</b><br>A: Yes, registration and use of the AYUDA system are completely free of charge.</p>
            <p><b>Q: How can I track my aid status?</b><br>A: After logging in, users can track their aid status on their dashboard.</p>
            <p><b>Q: Who manages the distribution process?</b><br>A: The DSWD, in partnership with local government units, manages and monitors distribution using AYUDA.</p>
        </div>
    </div>
</div>

</body>
</html>