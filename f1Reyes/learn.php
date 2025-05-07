<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Learn More - AYUDA</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
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

        .content-container {
            padding: 20px;
            margin-top: 80px;
        }

        .section-title {
            font-size: 28px;
            color: #2a2f6f;
            margin-bottom: 20px;
        }

        .section-content {
            font-size: 18px;
            color: #2a2f6f;
            line-height: 1.6;
            margin-bottom: 40px;
        }

        .cta-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-top: 40px;
        }

        .cta-buttons a {
            text-decoration: none;
            padding: 12px 30px;
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
            <img src="images/dswd_removebg.png" alt="DSWD Logo">
        </div>
        <div class="title">
            <h2>AYUDA INTEGRATED DISTRIBUTION SYSTEM</h2>
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

    <div class="content-container">
        <section>
            <h2 class="section-title">About AYUDA</h2>
            <div class="section-content">
                <p>AYUDA is committed to improving the efficiency and equity of aid distribution systems throughout the Philippines. Through the use of innovative digital technologies, we are transforming the way aid is delivered to those in need. Our system ensures that resources are distributed fairly and without delay, making sure that vulnerable communities receive the support they need, when they need it.</p>
            </div>
        </section>

        <section>
            <h2 class="section-title">Key Features</h2>
            <div class="section-content">
                <ul>
                    <li><b>Real-time Tracking:</b> Monitor the progress of aid distribution in real-time to ensure that resources are being allocated efficiently.</li>
                    <li><b>Transparent Processes:</b> Every step of the distribution process is made visible to ensure accountability and trust in the system.</li>
                    <li><b>Efficient Coordination:</b> Collaborates with local governments, NGOs, and volunteers to ensure no community is left behind.</li>
                    <li><b>Scalable & Flexible:</b> The system is designed to scale and adapt to both emergency relief efforts and long-term aid needs.</li>
                </ul>
            </div>
        </section>

        <section>
            <h2 class="section-title">Our Impact</h2>
            <div class="section-content">
                <p>Since its inception, AYUDA has helped streamline the distribution of aid during critical events such as natural disasters, health crises, and other national emergencies. The system has been instrumental in ensuring that aid is delivered quickly and efficiently, fostering stronger community resilience. By eliminating inefficiencies, we have contributed to rebuilding communities faster and supporting families in their time of need.</p>
            </div>
        </section>

        <div class="cta-buttons">
            <a href="register.php">Join Us</a>
            <a href="contact_us.php">Get in Touch</a>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 AYUDA Integrated Distribution System. All Rights Reserved.</p>
    </footer>
</body>
</html>
