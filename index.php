
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GREENLOOP | Student Sustainability Initiative</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="topbar">
    <a href="#" class="brand">
        <span class="brand-icon">✳</span>
        GREENLOOP
    </a>
    <span class="top-note">Small actions. Greener futures.</span>
</header>

<main class="container">

    <section class="mission">
        <div class="mission-content">
            <span class="eyebrow">STUDENT SUSTAINABILITY FELLOWSHIP</span>

            <h1>Make your campus a <span>greener place.</span></h1>

            <p class="mission-text">
                Real change starts with students like you. Join a community
                working together to create cleaner, greener and more
                sustainable campuses.
            </p>

            <div class="mission-points">
                <div><span>01</span> Take meaningful action</div>
                <div><span>02</span> Work with passionate students</div>
                <div><span>03</span> Create lasting impact</div>
            </div>
        </div>

        <div class="landscape">
            <div class="sun"></div>
            <div class="hill hill-back"></div>
            <div class="hill hill-front"></div>
            <div class="plant plant-one">♣</div>
            <div class="plant plant-two">♣</div>
        </div>

        <div class="mission-footer">
            <span>✳</span> One campus. One community. A better planet.
        </div>
    </section>

    <section class="form-panel">
        <div class="form-heading">
            <span class="form-tag">APPLICATION FORM</span>
            <h2>Join the movement.</h2>
            <p>Tell us a little about yourself and how you'd like to contribute.</p>
        </div>

        <form id="applicationForm" action="submit.php" method="POST" novalidate>

            <div class="section-heading">
                <span class="section-number">01</span>
                <div>
                    <h3>Your details</h3>
                    <p>How can we reach you?</p>
                </div>
            </div>

            <div class="field">
                <label for="name">Full name <span>*</span></label>
                <input type="text" id="name" name="name"
                       placeholder="Enter your full name" required>
            </div>

            <div class="field">
                <label for="email">Email address <span>*</span></label>
                <input type="email" id="email" name="email"
                       placeholder="you@example.com" required>
            </div>

            <div class="field">
                <label for="phone">Phone number <span>*</span></label>
                <input type="tel" id="phone" name="phone"
                       placeholder="10-digit mobile number" maxlength="10" required>
            </div>

            <div class="section-heading">
                <span class="section-number">02</span>
                <div>
                    <h3>Campus information</h3>
                    <p>Where are you studying?</p>
                </div>
            </div>

            <div class="field">
                <label for="college">College / University <span>*</span></label>
                <input type="text" id="college" name="college"
                       placeholder="Enter your institution name" required>
            </div>

            <div class="field-row">
                <div class="field">
                    <label for="course">Current course <span>*</span></label>
                    <select id="course" name="course" required>
                        <option value="">Select course</option>
                        <option>B.E. / B.Tech</option>
                        <option>BCA</option>
                        <option>B.Sc</option>
                        <option>BBA</option>
                        <option>BA</option>
                        <option>MCA / M.Tech</option>
                        <option>Other</option>
                    </select>
                </div>

                <div class="field">
                    <label for="year">Study year <span>*</span></label>
                    <select id="year" name="year" required>
                        <option value="">Select year</option>
                        <option>1st Year</option>
                        <option>2nd Year</option>
                        <option>3rd Year</option>
                        <option>4th Year</option>
                        <option>Postgraduate</option>
                    </select>
                </div>
            </div>

            <div class="section-heading">
                <span class="section-number">03</span>
                <div>
                    <h3>Your contribution</h3>
                    <p>What would you like to work on?</p>
                </div>
            </div>

            <div class="field">
                <label for="activity">Choose your interest <span>*</span></label>
                <select id="activity" name="activity" required>
                    <option value="">Select an initiative</option>
                    <option>Tree Plantation</option>
                    <option>Plastic-Free Campus</option>
                    <option>E-Waste Management</option>
                    <option>Environmental Awareness</option>
                    <option>Waste Segregation</option>
                    <option>Community Clean-up</option>
                </select>
            </div>

            <div class="field">
                <div class="label-row">
                    <label for="reason">Why do you want to join? <span>*</span></label>
                    <span class="counter" id="counter">0 / 400</span>
                </div>
                <textarea id="reason" name="reason" maxlength="400"
                          placeholder="Keep it short and meaningful." required></textarea>
            </div>

            <label class="consent">
                <input type="checkbox" name="consent" id="consent" value="yes">
                <span>I confirm that the information provided is accurate.</span>
            </label>

            <div id="errorBox" class="error-box" role="alert"></div>

            <button type="submit" id="submitBtn" class="submit-btn">
                Submit my application <span>↗</span>
            </button>

            <p class="bottom-note">✳ Your journey towards a greener campus begins here.</p>
        </form>
    </section>
</main>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="script.js"></script>
</body>
</html>
