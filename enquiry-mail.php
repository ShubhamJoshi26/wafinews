<?php
ini_set('display_errors', 0); // Disable error display in production
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt'); // Log errors to a file
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

ob_start();

// Database connection
$host = 'localhost';
$username = 'u406988610_atpacvisa';
$password = '3NdAseQTQy@';
$dbname = 'u406988610_atpac';
$link = mysqli_connect($host, $username, $password, $dbname);

if (!$link) {
    error_log('Database connection failed: ' . mysqli_connect_error());
    die('Database connection error.');
}

// Google reCAPTCHA keys
$recaptchaSecret = '6LdNyZcqAAAAAMq7Cv9ijhyNODkyX-q8wcy84OfY';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verify Google reCAPTCHA
    $recaptchaResponse = $_POST['g-recaptcha-response'];
    $recaptchaVerifyUrl = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptchaPayload = [
        'secret' => $recaptchaSecret,
        'response' => $recaptchaResponse,
        'remoteip' => $_SERVER['REMOTE_ADDR']
    ];

    $recaptchaVerify = file_get_contents($recaptchaVerifyUrl . '?' . http_build_query($recaptchaPayload));
    $recaptchaVerifyResponse = json_decode($recaptchaVerify, true);

    if (!$recaptchaVerifyResponse['success']) {
        die('reCAPTCHA verification failed. Please try again.');
    }

    // Sanitize inputs
    $form_id = mysqli_real_escape_string($link, $_POST['form_id']);
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(trim($_POST['phone']));
    $qualification = isset($_POST['qualification']) ? htmlspecialchars(trim($_POST['qualification'])) : '';
    $city = isset($_POST['city']) ? htmlspecialchars(trim($_POST['city'])) : '';

    // Additional fields for specific forms
    $message = "";
    $visatype = "";
    $countrytype = "";
    $countrymigrate = "";

    if ($form_id === 'form2') {
        $message = htmlspecialchars(trim($_POST['message']));
    } elseif ($form_id === 'form3') {
        $visatype = htmlspecialchars(trim($_POST['visatype']));
        $countrytype = htmlspecialchars(trim($_POST['country']));
        $countrymigrate = htmlspecialchars(trim($_POST['countrymigrate']));
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('Invalid email format.');
    }

    // Generate HTML content for the email
    $htmlContent = "
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; color: #333; }
            .container { max-width: 600px; margin: 0 auto; }
            table { width: 100%; border-collapse: collapse; margin-top: 20px; }
            th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
            th { background-color: #f2f2f2; }
        </style>
    </head>
    <body>
        <div class='container'>
            <table>
                    <tr>
                        <td colspan='3' style='text-align:center;'>
                            <img class='logo' src='https://atpacvisas.com/assets/images/logo.png' alt='Logo' style='width: 150px;'>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='3'><strong>Dear Admin,</strong><br>The following Inquiry was received:</td>
                    </tr>
                    <tr><td colspan='2'><strong>Name</strong></td><td>$name</td></tr>
                    <tr><td colspan='2'><strong>Email Address</strong></td><td>$email</td></tr>
                    <tr><td colspan='2'><strong>Phone No</strong></td><td>$phone</td></tr>";
                    
    if ($form_id === 'form2') {
        $htmlContent .= "<tr><td colspan='2'><strong>Message</strong></td><td>$message</td></tr>
                         <tr><td colspan='2'><strong>Qualification</strong></td><td>$qualification</td></tr>
                         <tr><td colspan='2'><strong>City</strong></td><td>$city</td></tr>";
    } elseif ($form_id === 'form3') {
        $htmlContent .= "<tr><td colspan='2'><strong>Visa Type</strong></td><td>$visatype</td></tr>
                         <tr><td colspan='2'><strong>Country Type</strong></td><td>$countrytype</td></tr>
                         <tr><td colspan='2'><strong>Country to Migrate</strong></td><td>$countrymigrate</td></tr>";
    } else {
        $htmlContent .= "<tr><td colspan='2'><strong>Qualification</strong></td><td>$qualification</td></tr>
                         <tr><td colspan='2'><strong>City</strong></td><td>$city</td></tr>";
    }

    $htmlContent .= "
                    <tr><td colspan='3' style='background-color:black; text-align:center; color: white;'>AtpacVisas</td></tr>
                </table>
        </div>
    </body>
    </html>";

    // Email configuration
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'info@atpacvisas.com';
        $mail->Password = 'Info@#876'; // App password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Admin email notification
        $mail->setFrom('info@atpacvisas.com', 'Atpac');
        $mail->addAddress('info@atpacvisas.com');
        $mail->addCC('abhinav@atpacvisas.com');
        $mail->Subject = 'Atpac Enquiry Notification';
        $mail->isHTML(true);
        $mail->Body = $htmlContent;
        $mail->send();

        // Thank you email to the user
        $mail->clearAddresses();
        $mail->clearCCs(); // Remove CC for thank-you email
        $mail->addAddress($email);
        $mail->Subject = 'Thank You for Your Inquiry';
        $mail->Body = " <p>Dear $name,</p>
        <p>Thank you for your submission. We have received your Inquiry and will get back to you shortly. Our team is reviewing your details to provide the best possible assistance.</p>
        <p>If your Inquiry is urgent, please feel free to email us at info@atpacvisas.com or call +91-9910509488 to speak with one of our experts.</p>
        <p>Thank you for choosing our services</p>
        <p><strong>Warm Regards</strong></p>
        <p><strong>Domain Support</strong></p>
        <p><strong>https://atpacvisas.com/</strong></p>";
        $mail->send();

        // Insert data into the database using prepared statements
        if ($form_id === 'form3') {
            $stmt = $link->prepare("INSERT INTO `booking_form` (`name`, `phone`, `email`, `visatype`, `country`, `countrymigrate`) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param('ssssss', $name, $phone, $email, $visatype, $countrytype, $countrymigrate);
        } elseif ($form_id === 'form2') {
            $stmt = $link->prepare("INSERT INTO `enquiry` (`name`, `email`, `phone`, `qualification`, `city`, `message`) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param('ssssss', $name, $email, $phone, $qualification, $city, $message);
        } else {
            $stmt = $link->prepare("INSERT INTO `enquiry` (`name`, `email`, `phone`, `qualification`, `city`) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param('sssss', $name, $email, $phone, $qualification, $city);
        }

        if (!$stmt->execute()) {
            error_log('Database insertion failed: ' . $stmt->error);
            die('Database insertion error.');
        }
        $stmt->close();
        mysqli_close($link);
        ob_end_clean();

        // Redirect after successful submission
        header('Location: https://atpacvisas.com/thankyou.html');
        exit();
    } catch (Exception $e) {
        error_log('Mailer Error: ' . $mail->ErrorInfo);
        echo 'There was an error processing your request. Please try again later.';
    }
}
?>
