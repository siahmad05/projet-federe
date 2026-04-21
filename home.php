<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoneyKids</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<!-- ================= HEADER ================= -->
<header>
    <nav class="navbar">
        <h1 class="logo">MoneyKids</h1>

        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#features">Features</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>

        <div class="auth-buttons">
            <a href="signin.php"><button class="login">Login</button></a>
            <a href="signup.php"><button class="register">Register</button></a>
        </div>
    </nav>
</header>

<!-- ================= HERO ================= -->
<section class="hero">
    <div class="hero-text">
        <h2>Teach Kids Smart Money Habits</h2>
        <p>
            MoneyKids helps children learn how to save, spend, and manage money
            while parents stay in control.
        </p>
        <a href="signup.php"><button class="cta">Get Started</button></a>
    </div>

    <div class="hero-image">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="kids">
    </div>
</section>

<!-- ================= FEATURES ================= -->
<section id="features" class="section">
    <h2>Core Features</h2>

    <div class="grid">

        <div class="card">
            <h3>Pocket Money Management</h3>
            <p>Parents can assign weekly or monthly allowance.</p>
        </div>

        <div class="card">
            <h3>Expense Tracking</h3>
            <p>Kids track spending in real time.</p>
        </div>

        <div class="card">
            <h3>Saving Goals</h3>
            <p>Set goals and track progress.</p>
        </div>

        <div class="card">
            <h3>Reward System</h3>
            <p>Parents reward good habits.</p>
        </div>

    </div>
</section>

<!-- ================= INFO SECTION ================= -->
<section class="section split">

    <div class="card">
        <h3>Secure Accounts</h3>
        <p>Safe and protected access for parents and kids.</p>
    </div>

    <div class="card">
        <h3>Accessible Anywhere</h3>
        <p>Works on mobile, tablet, and desktop.</p>
    </div>

</section>

<!-- ================= ABOUT ================= -->
<section id="about" class="section">
    <h2>About MoneyKids</h2>

    <div class="grid">

        <div class="card">
            <h3>Our Mission</h3>
            <p>Teach kids financial habits early.</p>
        </div>

        <div class="card">
            <h3>What We Do</h3>
            <p>Tools for saving, tracking, and learning money.</p>
        </div>

        <div class="card">
            <h3>For Families</h3>
            <p>Parents guide and monitor progress.</p>
        </div>

    </div>
</section>

<!-- ================= AUDIENCE ================= -->
<section class="section split">

    <div class="card">
        <h3>For Parents</h3>
        <p>Monitor spending and assign tasks.</p>
    </div>

    <div class="card">
        <h3>For Kids</h3>
        <p>Learn money management in a fun way.</p>
    </div>

</section>

<!-- ================= CONTACT ================= -->
<section id="contact" class="section">
    <h2>Contact Us</h2>
    <p>Have questions or suggestions?</p>

    <div class="card">
        <form action="contact.php" method="POST">

            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <input type="text" name="subject" placeholder="Subject" required>
            <textarea name="message" placeholder="Your Message" rows="5" required></textarea>

            <button type="submit">Send Message</button>

        </form>
    </div>
</section>

<!-- ================= FOOTER ================= -->
<footer>
    <p>© MoneyKids</p>
</footer>

</body>
</html>