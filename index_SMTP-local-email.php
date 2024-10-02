<?php session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "includes/config.php";
require_once "vendor/autoload.php";

$mail = new PHPMailer(true);
?>
<?php
//Code for Registration 
if(isset($_POST['user_submit'])) {

    $name=$_POST['name'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $message=$_POST['message'];
    $sql=mysqli_query($con,"select id from users where email='$email'");
    $row=mysqli_num_rows($sql);
    
    //mailer
    $subject = "Solar Energy: Register Your Interest";
    $mmessage = "
<html>
<head>
<title>Solar Energy: Register Your Interest</title>
</head>
<body>
<table style='width: 500px;margin: 20px auto;'>
    <tr>
        <th style='border-radius: 8px;background: #000;padding:10px 0;font-size: 28px;font-weight: bold; text-align: center;color: #fff;'>ElioBay</th>
    </tr>
    <tr>
        <td style='padding: 30px;border-radius: 8px;border:2px solid #666;text-align: left;'>
            <p>Dear $name,</p>
            <h3 style='margin-top:30px;'>Thank you for expressing your interest in adopting solar energy with ELIOBAY.</h3>
            <p>We appreciate your interest in clean energy. We are excited to help you take the first step toward a sustainable and cost-efficient energy future. Our team will be in touch shortly with more information on how we can make solar energy accessible for your home.</p>
            <p>Stay tuned for updates, and feel free to reach out with any questions in the meantime.</p>
            <p style='margin-top:30px;'>Best regards,<br/>The ELIOBAY Team</p>
        </td>
    </tr>
    <tr>
        <th style='border-radius: 8px;background: #000;padding:10px 0;font-size: 22px;font-weight: bold; text-align: center;color: #fff;'>Power Your Life with ELIO</th>
    </tr>
</table>
</body>
</html>
";

    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "peerashaik786@gmail.com";
    $mail->Password = "idcwymmiddkoyiki";
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
    $mail->setFrom('info@eliobay.com','ElioBay');
    $mail->addAddress($email, $name);   // Add a recipient
    $mail->isHTML(true);  // Set email format to HTML
    $mail->Subject =$subject;
    $bodyContent=$mmessage;
    $mail->Body = $bodyContent;

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: info@eliobay.com' . "\r\n";

    if($row > 0) {
        echo "<script>alert('Email id already exist with another account. Please try with another email.');</script>";
    } else {
        $msg=mysqli_query($con,"insert into users(name,email,contactno,message) values('$name','$email','$contact','$message')");
        if($mail->send($to,$subject,$mmessage,$headers)) {
           echo "<script type='text/javascript'>document.location = 'welcome.php?user=success';</script>";
        } else {
            echo "Email sending failed ...";
        }
    }
}
?>
<?php 
//Code for Registration 
if(isset($_POST['buyer_submit'])) {

    $name=$_POST['name'];
    $email=$_POST['email'];
    $amount=$_POST['amount'];
    $message=$_POST['message'];
    $sql=mysqli_query($con,"select id from buyers where email='$email'");
    $row=mysqli_num_rows($sql);
    
    //mailer 
    $subject = "ELIO Energy: Secure Your 20% Discount!";
    $mmessage = "
<html>
<head>
<title>ELIO Energy: Secure Your 20% Discount!</title>
</head>
<body>
<table style='width: 500px;margin: 20px auto;'>
    <tr>
        <th style='border-radius: 8px;background: #000;padding:10px 0;font-size: 28px;font-weight: bold; text-align: center;color: #fff;'>ElioBay</th>
    </tr>
    <tr>
        <td style='padding: 30px;border-radius: 8px;border:2px solid #666;text-align: left;'>
            <p>Dear $name,</p>
            <h3 style='margin-top:30px;'>Thank you for signing up for the Tokens - ELIO Energy.</h3>
            <p>Tokens requested - ELIO Energy: $amount</p>
            <p>Eligible Discount: 20%</p>
            <p>We appreciate your interest in clean energy. Stay tuned for more details, as our team will be reaching out soon to guide you through the next steps.</p>
            <p>Thank you for joining us on this exciting journey toward sustainable energy.</p>
            <p style='margin-top:30px;'>Best regards,<br/>The ELIOBAY Team</p>
        </td>
    </tr>
    <tr>
        <th style='border-radius: 8px;background: #000;padding:10px 0;font-size: 22px;font-weight: bold; text-align: center;color: #fff;'>Power Your Life with ELIO</th>
    </tr>
</table>
</body>
</html>
";

    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "peerashaik786@gmail.com";
    $mail->Password = "idcwymmiddkoyiki";
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
    $mail->setFrom('info@eliobay.com','ElioBay');
    $mail->addAddress($email, $name);   // Add a recipient
    $mail->isHTML(true);  // Set email format to HTML
    $mail->Subject =$subject;
    $bodyContent=$mmessage;
    $mail->Body = $bodyContent;

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: info@eliobay.com' . "\r\n";

    if($row > 0) {
        echo "<script>alert('Email id already exist with another account. Please try with another email.');</script>";
    } else {
        $msg=mysqli_query($con,"insert into buyers(name,email,amount,message) values('$name','$email','$amount','$message')");

        if($mail->send($to,$subject,$mmessage,$headers)) {
            echo "<script type='text/javascript'>document.location = 'welcome.php?buyer=success'; </script>";
        } else {
            echo "Email sending failed ...";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>ELIOBAY is a blockchain-powered platform that connects homeowners with investors to make solar energy accessible and affordable through tokenized funding.</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="We help homeowners install solar panels with minimal upfront costs by using investments from ELIO Energy tokens and saving your money on energy bills"/>
<meta name="author" content="" />

<script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
<link href="css/styles.css" rel="stylesheet" />
<link href="css/custom.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

</head>
<body>
<!-- Header Section -->
<div class="header bg-black text-white text-center">
    <a href="index.php"><img src="images/logo.svg" class="logo" loading="lazy" alt="ElioBay" /></a>
</div>

<!-- Hero Banner -->
<div class="hero-banner">
    <div class="user text-center">
        <a  class="action" href="#" data-bs-toggle="modal" data-bs-target="#formModal"><span>Register Your Interest</span><h4>SOLAR</h4></a>
    </div>
    <div class="buyer text-center">
        <a class="action" href="#" data-bs-toggle="modal" data-bs-target="#formModal"><span>Sign up for early<br/>20% Discount</span><h4>ELIO</h4></a>
    </div>
    <div class="container">
        <img src="images/hero-banner.jpeg" loading="lazy" alt="ElioBay" />
    </div>
</div>

<!-- Footer -->
<footer class="footer text-center bg-black">
  <div class="copyright">
      <p class="m-0 text-white">Power Your Life with ELIO</p>
  </div>
</footer>

<!-- Form Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="btn-close removebc" data-bs-dismiss="modal" aria-label="Close">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="white" class="bi bi-x-lg" viewBox="0 0 16 16">
                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                </svg>
            </button>
            <div class="modal-body">
                <ul class="nav nav-tabs justify-content-center mt-4" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link user" id="simple-tab-0" data-bs-toggle="tab" href="#simple-tabpanel-0" role="tab" aria-controls="simple-tabpanel-0" aria-selected="true">Register Your Interest</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link buyer" id="simple-tab-1" data-bs-toggle="tab" href="#simple-tabpanel-1" role="tab" aria-controls="simple-tabpanel-1" aria-selected="false">Sign Up for 20% Discount</a>
                    </li>
                </ul>
                <div class="tab-content" id="tab-content">
                    <div class="tab-pane user" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
                        <div class="p-30 text-white">
                            <h2 class="text-center text-white mt-0">Register Your Interest</h2>
                            <hr />
                            <p>Interested in Solar? Register Your Interest Now!</p>
                            <p>Sign up now to be among the first to know when ElioBay is live. Start saving on your energy bills with clean solar power!</p>
                            <form method="post" id="userForm" name="userForm">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" name="name" type="text" placeholder="Enter your full name" required />
                                    <label for="inputFullname">Full Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="email" name="email" type="email" placeholder="info@eliobay.com" required />
                                    <label for="inputEmail">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="contact" name="contact" type="number" placeholder="1234567890" required pattern="[0-9]{10}" title="10 numeric characters only"  maxlength="10" required />
                                    <label for="inputPhone">Phone Number</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="message" name="message" type="text" placeholder="Enter your message" title="at least 200 characters" required></textarea>
                                    <label for="inputMessage">Your Message</label>
                                </div>
                                <div class="form-floating mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="consentRegister" required>
                                    <p class="form-check-label" for="consentRegister">Please agree our <a class="link" href="#" data-bs-toggle="modal" data-bs-target="#privacyModal">Privacy Policy</a> and accept our consent.</p>
                                </div>
                                <div class="mt-4 mb-0 text-center">
                                    <button type="submit" class="btn btn-black" name="user_submit">Register Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane buyer" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
                        <div class="p-30 text-white">
                            <h2 class="text-center text-white mt-0">Secure a 20% Discount on<br/>ELIO Energy Tokens!</h2>
                            <hr />
                            <p>Sign up to receive early access to the ELIO Energy token sale and enjoy an exclusive 20% discount.</p>
                            <form method="post" id="buyerForm" name="buyerForm">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" name="name" type="text" placeholder="Enter your full name" required />
                                    <label for="inputFullname">Full Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="email" name="email" type="email" placeholder="info@eliobay.com" required />
                                    <label for="inputEmail">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="amount" name="amount" type="number" />
                                    <label for="inputEmail">Investment Amount</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="message" name="message" type="text"  placeholder="Enter your investment details" title="at least 200 characters" required></textarea>
                                    <label for="inputInvestment">Message</label>
                                </div>
                                <div class="form-floating mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="consentSignup"  required>
                                    <p class="form-check-label" for="consentSignup">Please agree our <a class="link" href="#" data-bs-toggle="modal" data-bs-target="#privacyModal">Privacy Policy</a> to receive our offers.</p>
                                </div>
                                <div class="mt-4 mb-0 text-center">
                                    <button type="submit" class="btn btn-black" name="buyer_submit">Claim My 20% Discount</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="privacyModal" tabindex="-1" aria-labelledby="privacyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content text-white">
            <div class="modal-header">
                <h2 class="modal-title">Privacy Policy</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="white" class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-end"><small>This policy was updated on 28th Sep’24.</small></p>
                <h3>Scope of Application</h3>
                <p>This Privacy Notice applies to processing of personal data that is collected, which means information about an identifiable individual (“you”), that ELIOBAY, its affiliates and subsidiaries (“Company”, “we” or “us”) collect through our website (“Tool” or “website”) about applicants or freelancers like you, current or former employees, contractors (collectively “Applicants”). It also describes your data protection rights, including your right to object to some of the processing that Eliobay may carry out.</p>
                <h3>How we share your personal data</h3>
                <p>We will share your personal data with other ELIOBAY Group or third-party companies, to the extent required for the work or work opportunity, you are applying for or employment or assignments.</p>
                <p>In the event that a Eliobay business is sold or integrate with another business in total or in part, your details may be disclosed to our advisers and prospective purchaser’s advisers and will be passed on to the new owners of the business.</p>
                <h3>Your Choices and Rights</h3>
                <p>You have the right to ask Eliobay for copy of your per sonal data; to correct, delete or restrict processing of your persona data; and to obtain the personal data you provide in a structured and machine-readable format. If you are a United States resident or are an authorized agent of a United States resident and want to exercise one of the above-rights in connection with your personal data, please contact our Privacy Officer at <a href="mailto:info@eliobay.com">info@eliobay.com</a>.</p>
                <h3>How long we retain your personal data</h3>
                <p>We will retain your personal data only for as long as we need it for Eliobay’s legitimate business interest in accordance with applicable laws, to fulfil your registration and application process and to perform services as you have opted for or to meet legal requirements, after which we will take steps to delete your personal data or hold it in a form that no longer identifies you. <br/>Please contact us at : <a href="mailto:info@eliobay.com">info@eliobay.com</a></p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/script.js"></script>

</body>
</html>
