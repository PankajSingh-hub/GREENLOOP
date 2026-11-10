
<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

function clean($value) {
    return htmlspecialchars(trim($value ?? ""), ENT_QUOTES, "UTF-8");
}

function showError($message) {
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Application Error | GREENLOOP</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div style="max-width:650px;margin:100px auto;background:white;padding:40px;border-radius:18px;">
            <h2 style="color:#a6382f;margin-bottom:15px;">Application could not be submitted</h2>
            <p style="font-size:17px;margin-bottom:25px;">' . htmlspecialchars($message, ENT_QUOTES, "UTF-8") . '</p>
            <a href="index.php" style="color:#174d38;font-weight:bold;">← Go back to application</a>
        </div>
    </body>
    </html>';
    exit;
}

// Collect form data
$name = clean($_POST["name"] ?? "");
$email = clean($_POST["email"] ?? "");
$phone = clean($_POST["phone"] ?? "");
$college = clean($_POST["college"] ?? "");
$course = clean($_POST["course"] ?? "");
$year = clean($_POST["year"] ?? "");
$activity = clean($_POST["activity"] ?? "");
$reason = clean($_POST["reason"] ?? "");
$consent = $_POST["consent"] ?? "";

// Required field validation
if (
    !$name || !$email || !$phone || !$college ||
    !$course || !$year || !$activity || !$reason
) {
    showError("Please complete all required fields.");
}

if (strlen($name) < 3) {
    showError("Please enter a valid name.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    showError("Please enter a valid email address.");
}

if (!preg_match('/^[6-9][0-9]{9}$/', $phone)) {
    showError("Please enter a valid 10-digit Indian mobile number.");
}

if (strlen($college) < 3) {
    showError("Please enter a valid college name.");
}

$allowedCourses = [
    "B.E. / B.Tech",
    "BCA",
    "B.Sc",
    "BBA",
    "BA",
    "MCA / M.Tech",
    "Other"
];

$allowedYears = [
    "1st Year",
    "2nd Year",
    "3rd Year",
    "4th Year",
    "Postgraduate"
];

$allowedActivities = [
    "Tree Plantation",
    "Plastic-Free Campus",
    "E-Waste Management",
    "Environmental Awareness",
    "Waste Segregation",
    "Community Clean-up"
];

if (!in_array($course, $allowedCourses, true)) {
    showError("Please select a valid course.");
}

if (!in_array($year, $allowedYears, true)) {
    showError("Please select a valid study year.");
}

if (!in_array($activity, $allowedActivities, true)) {
    showError("Please select a valid initiative.");
}

if (strlen($reason) < 10 || strlen($reason) > 400) {
    showError("Your motivation must be between 10 and 400 characters.");
}

if ($consent !== "yes") {
    showError("Please confirm your information is accurate.");
}

// Generate registration details
$registrationId = "GL-" . date("Y") . "-" . strtoupper(bin2hex(random_bytes(3)));
$applicationDate = date("d M Y");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Application Successful | GREENLOOP</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 16px;
        }

        .receipt {
            width: 100%;
            max-width: 720px;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(36, 64, 42, 0.13);
        }

        .receipt-header {
            background: #174d38;
            color: white;
            padding: 38px;
            text-align: center;
        }

        .success-icon {
            width: 65px;
            height: 65px;
            margin: 0 auto 17px;
            background: #d9e9c8;
            color: #174d38;
            display: grid;
            place-items: center;
            border-radius: 50%;
            font-size: 32px;
        }

        .receipt-header h1 {
            font-family: Manrope, sans-serif;
            font-size: 30px;
            margin-bottom: 9px;
        }

        .receipt-header p {
            font-size: 16px;
            color: #d6e3d7;
        }

        .receipt-body {
            padding: 35px 40px;
        }

        .receipt-id {
            background: #edf4e9;
            border: 1px dashed #8cae8a;
            padding: 16px;
            text-align: center;
            border-radius: 10px;
            margin-bottom: 28px;
        }

        .receipt-id small {
            display: block;
            color: #617365;
            font-size: 13px;
            margin-bottom: 6px;
        }

        .receipt-id strong {
            font-size: 23px;
            color: #174d38;
            letter-spacing: 1px;
        }

        .receipt-body h2 {
            font-family: Manrope, sans-serif;
            font-size: 20px;
            margin-bottom: 18px;
        }

        .details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .detail {
            border-bottom: 1px solid #e6ebe3;
            padding-bottom: 12px;
        }

        .detail small {
            display: block;
            color: #788479;
            font-size: 13px;
            margin-bottom: 5px;
        }

        .detail strong {
            font-size: 16px;
            overflow-wrap: anywhere;
        }

        .reason-detail {
            grid-column: 1 / -1;
        }

        .receipt-actions {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }

        .receipt-actions button,
        .receipt-actions a {
            flex: 1;
            text-align: center;
            border: 0;
            border-radius: 8px;
            padding: 15px;
            font: 700 15px 'DM Sans', sans-serif;
            text-decoration: none;
            cursor: pointer;
        }

        .print-btn {
            background: #174d38;
            color: white;
        }

        .home-btn {
            background: #edf4e9;
            color: #174d38;
        }

        @media(max-width: 550px) {
            .receipt-body {
                padding: 25px 20px;
            }

            .details {
                grid-template-columns: 1fr;
            }

            .reason-detail {
                grid-column: auto;
            }

            .receipt-actions {
                flex-direction: column;
            }
        }

        /* PRINT STYLING */
        @media print {

            @page {
                size: A4;
                margin: 12mm;
            }

            * {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            html, body {
                background: #f6f5ed !important;
                padding: 0 !important;
                margin: 0 !important;
            }

            body {
                display: block !important;
            }

            .receipt {
                width: 100%;
                max-width: 100%;
                box-shadow: none !important;
                border-radius: 12px;
                overflow: hidden;
            }

            .receipt-header {
                background: #174d38 !important;
                color: #ffffff !important;
                padding: 30px !important;
            }

            .receipt-header h1 {
                color: #ffffff !important;
            }

            .receipt-header p {
                color: #d6e3d7 !important;
            }

            .success-icon {
                background: #d9e9c8 !important;
                color: #174d38 !important;
            }

            .receipt-id {
                background: #edf4e9 !important;
                border: 1px dashed #8cae8a !important;
            }

            .receipt-id strong {
                color: #174d38 !important;
            }

            .detail {
                border-bottom: 1px solid #e6ebe3 !important;
            }

            .receipt-actions {
                display: none !important;
            }
        }
    </style>
</head>

<body>

<div class="receipt">

    <div class="receipt-header">
        <div class="success-icon">✓</div>
        <h1>You're officially in!</h1>
        <p>Your GREENLOOP application has been submitted successfully.</p>
    </div>

    <div class="receipt-body">

        <div class="receipt-id">
            <small>YOUR REGISTRATION ID</small>
            <strong><?php echo $registrationId; ?></strong>
        </div>

        <h2>Application summary</h2>

        <div class="details">

            <div class="detail">
                <small>Full name</small>
                <strong><?php echo $name; ?></strong>
            </div>

            <div class="detail">
                <small>Application date</small>
                <strong><?php echo $applicationDate; ?></strong>
            </div>

            <div class="detail">
                <small>Email address</small>
                <strong><?php echo $email; ?></strong>
            </div>

            <div class="detail">
                <small>Phone number</small>
                <strong><?php echo $phone; ?></strong>
            </div>

            <div class="detail">
                <small>College / University</small>
                <strong><?php echo $college; ?></strong>
            </div>

            <div class="detail">
                <small>Course</small>
                <strong><?php echo $course; ?></strong>
            </div>

            <div class="detail">
                <small>Study year</small>
                <strong><?php echo $year; ?></strong>
            </div>

            <div class="detail">
                <small>Chosen initiative</small>
                <strong><?php echo $activity; ?></strong>
            </div>

            <div class="detail reason-detail">
                <small>Why you want to join</small>
                <strong><?php echo $reason; ?></strong>
            </div>

        </div>

        <div class="receipt-actions">
            <button class="print-btn" onclick="window.print()">
                Print application ↗
            </button>

            <a href="index.php" class="home-btn">
                Back to home
            </a>
        </div>

    </div>
</div>

</body>
</html>
