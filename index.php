<?php session_start();
require_once "includes/config.php";
require_once "vendor/autoload.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>ELIOBAY | Power Your Life with ELIO</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="We help homeowners install solar panels with minimal upfront costs by using investments from ELIO Energy tokens and saving your money on energy bills"/>
<meta name="author" content="" />

<link rel="icon" type="image/x-icon" href="images/favicon.ico">

<script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
<link href="css/styles.css" rel="stylesheet" />
<link href="css/custom.css" rel="stylesheet" />

<script type="text/javascript">
    function page_redirect(){  
        location.reload();
        $('.loader').show();
    }
</script>

</head>
<body>
<div class="loader"><div class="spinner"></div></div>
<?php
if(isset($_POST['user_submit'])) {

    $name=$_POST['name'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $message=$_POST['message'];
    $sql=mysqli_query($con,"select id from users where email='$email'");
    $row=mysqli_num_rows($sql);
    
    $to      = $email; 
    $subject = "Solar Energy: Register Your Interest";
    $mmessage = "
<html>
<head>
<title>Solar Energy: Register Your Interest</title>
</head>
<body>
<table style='width: 500px;margin: 20px auto;'>
    <tr>
        <th style='border-radius: 8px;background: #000;padding:15px 0;'><a href='https://eliobay.com/' target='_blank' style='height: 28px'><img align='center' src='https://eliobay.com/images/email-logo.jpg' style='width: 170px;' alt='ElioBay' /></a></th>
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

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: ElioBay no-reply@eliobay.com' . "\r\n";

    if($row > 0) {
        echo "<div class='overlay'>
    <div class='success-popup email-exist'>
        <div class='text-white'>
            <a href='#' class='btn-close close'></a>
            <p>Your email is already exist with ElioBay.</p>
            <p>Please try with another email.</p>
        </div>
    </div>
</div>";
    } else {
        $msg=mysqli_query($con,"insert into users(name,email,contactno,message) values('$name','$email','$contact','$message')");
        if(mail($to, $subject, $mmessage, $headers)) {
           echo "<script type='text/javascript'>document.location = 'welcome.php?user=success';</script>";
        } else {
            echo "Failed to send email ...";
        }
    }
}
?>

<?php 
if(isset($_POST['buyer_submit'])) {

    $name=$_POST['name'];
    $email=$_POST['email'];
    $amount=$_POST['amount'];
    $message=$_POST['message'];
    $sql=mysqli_query($con,"select id from buyers where email='$email'");
    $row=mysqli_num_rows($sql);
    
    $to      = $email;
    $subject = "Token - ELIO Energy: Secure Your 20% Discount!";
    $mmessage = "
<html>
<head>
<title>Token - ELIO Energy: Secure Your 20% Discount!</title>
</head>
<body>
<table style='width: 500px;margin: 20px auto;'>
    <tr>
        <th style='border-radius: 8px;background: #000;padding:15px 0;'><a href='https://eliobay.com/' target='_blank' style='height: 28px'><img align='center' src='https://eliobay.com/images/email-logo.jpg' style='width: 170px;' alt='ElioBay' /></a></th>
    </tr>
    <tr>
        <td style='padding: 30px;border-radius: 8px;border:2px solid #666;text-align: left;'>
            <p>Dear $name,</p>
            <h3 style='margin-top:30px;'>Thank you for signing up for the Tokens - ELIO Energy.</h3>
            <table style='width: auto;margin: 10px 0;'>
                <tr>
                    <td style='font-weight: bold;'>Tokens requested - ELIO Energy: <td>
                    <td style='font-weight: bold;padding-left: 10px;'>$amount<td>
                <tr>
                <tr>
                    <td style='font-weight: bold;'>Eligible Discount: <td>
                    <td style='font-weight: bold;padding-left: 10px;'>20%<td>
                <tr>
            </table>
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

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: ElioBay no-reply@eliobay.com' . "\r\n";

    if($row > 0) {
        echo "<div class='overlay'>
    <div class='success-popup email-exist'>
        <div class='text-white'>
            <a href='#' class='btn-close close'></a>
            <p>Your email is already exist with ElioBay.</p>
            <p>Please try with another email.</p>
        </div>
    </div>
</div>";
    } else {
        $msg=mysqli_query($con,"insert into buyers(name,email,amount,message) values('$name','$email','$amount','$message')");

        if(mail($to, $subject, $mmessage, $headers)) {
            echo "<script type='text/javascript'>document.location = 'welcome.php?buyer=success'; </script>";
        } else {
            echo "Failed to send email ...";
        }
    }
}
?>
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
    <!-- <img src="images/hero-banner.jpeg" loading="lazy" alt="ElioBay" /> -->
</div>

<!-- Footer -->
<footer class="footer text-center bg-black">
  <div class="copyright">
      <h1 class="m-0 text-white">Power Your Life with ELIO</h1>
  </div>
</footer>

<!-- Form Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button class="btn-close removebc" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
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
                        <div class="p-20 text-white">
                            <h2 class="text-center text-white m-0 py-10">Register Your Interest</h2>
                            <hr />
                            <p class="py-10">Sign up now to be the first to know when the ElioBay solar installation journey begins.</p>
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
                                    <input class="form-control" id="contact" name="contact" type="number" placeholder="1234567890" required pattern="[0-9]{10}" title="10 numeric characters only" maxlength="10" required />
                                    <label for="inputPhone">Phone Number</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="message" name="message" type="text" placeholder="Enter your message" title="at least 200 characters" required></textarea>
                                    <label for="inputMessage">Your Message</label>
                                </div>
                                <div class="form-floating form-check">
                                    <div class="py-10">
                                    <input type="checkbox" class="form-check-input" id="consentRegister" required>
                                    <p class="form-check-label small" for="consentRegister">Please agree our <a class="link" href="#" data-bs-toggle="modal" data-bs-target="#privacyModal">Privacy Policy</a> and accept our consent.</p>
                                    </div>
                                </div>
                                <div class="m-0 text-center">
                                    <button type="submit" class="btn btn-black green" onclick="page_redirect()" name="user_submit">Register Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane buyer" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
                        <div class="p-20 text-white">
                            <h2 class="text-center text-white m-0 py-10">Secure a 20% Discount on<br/>ELIO Energy Tokens!</h2>
                            <hr />
                            <p class="py-10">Sign up to receive early access to the ELIO Energy token sale and enjoy an exclusive 20% discount.</p>
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
                                    <input class="form-control" id="amount" name="amount" type="number" placeholder="1234567890" required pattern="[0-9]{10}" title="10 numeric characters only" maxlength="10" />
                                    <label for="inputEmail">Investment Amount - $</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="message" name="message" type="text"  placeholder="Enter your investment details" title="at least 200 characters" required></textarea>
                                    <label for="inputInvestment">Message</label>
                                </div>
                                <div class="form-floating form-check">
                                    <div class="py-10">
                                    <input type="checkbox" class="form-check-input" id="consentSignup"  required>
                                    <p class="form-check-label small" for="consentSignup">Please agree our <a class="link" href="#" data-bs-toggle="modal" data-bs-target="#privacyModal">Privacy Policy</a> to receive our offers.</p>
                                    </div>
                                </div>
                                <div class="m-0 text-center">
                                    <button type="submit" class="btn btn-black gold" onclick="page_redirect()" name="buyer_submit">Claim My 20% Discount</button>
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
    <div class="modal-dialog privacy modal-dialog-centered">
        <div class="modal-content text-white privacy-content">
            <div class="modal-header">
                <h2 class="modal-title">Privacy Policy for ELIOBAY</h2>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3>Scope of Application</h3>
                <p>This Privacy Policy explains how <strong>ELIOBAY</strong>, its affiliates, and subsidiaries (“Company”, “we”, or “us”) collect, use, and share personal data obtained through our website. This includes data provided by applicants, freelancers, employees, and other users (“you”). We collect personal data such as names, email addresses, IP addresses, and browsing behaviour when you interact with our website.</p>

                <h3>Data We Collect</h3>
                <p>We collect the following categories of personal data:</p>
                <ul>
                    <li><strong>Contact Information:</strong> Name, email address, and phone number.</li>
                    <li><strong>Technical Information:</strong> IP address, browser type, and cookie data.</li>
                    <li><strong>Usage Data:</strong> How you use our website and services.</li>
                </ul>

                <h3>Legal Basis for Processing</h3>
                <p>We process personal data based on:</p>
                <ul>
                    <li><strong>Consent:</strong> Where you provide explicit consent for marketing or other activities.</li>
                    <li><strong>Contractual Necessity:</strong> To fulfill a contract or prepare to enter into one.</li>
                    <li><strong>Legal Obligation:</strong> To comply with applicable laws.</li>
                    <li><strong>Legitimate Interests:</strong> For business purposes such as improving our services, protecting the security of our systems, and ensuring compliance with our legal obligations.</li>
                </ul>

                <h3>How We Share Your Personal Data</h3>
                <p>We may share your personal data with:</p>
                <ul>
                    <li><strong>Third-Party Service Providers:</strong> Including web hosting, analytics, and marketing providers. These third parties are bound by contracts to process your data according to our instructions and applicable laws.</li>
                    <li><strong>Affiliates:</strong> For purposes consistent with this Privacy Policy.</li>
                    <li><strong>Legal Authorities:</strong> When required by law or to protect our legal interests.</li>
                </ul>

                <h3>International Data Transfers</h3>
                <p>Where personal data is transferred outside of Switzerland or the European Economic Area (EEA), we ensure that appropriate safeguards, such as <strong>Standard Contractual Clauses</strong> (SCCs), are in place to protect your data in compliance with the GDPR.</p>

                <h3>Your Rights</h3>
                <p>You have the following rights under the GDPR and Swiss Data Protection Act:</p>
                <ul>
                    <li><strong>Right to Access:</strong> Obtain a copy of your personal data.</li>
                    <li><strong>Right to Correction:</strong> Correct inaccuracies in your personal data.</li>
                    <li><strong>Right to Deletion:</strong> Request deletion of your personal data.</li>
                    <li><strong>Right to Object:</strong> Object to processing based on legitimate interests.</li>
                    <li><strong>Right to Data Portability:</strong> Request your data in a structured, machine-readable format.</li>
                    <li><strong>Right to Withdraw Consent:</strong> Where processing is based on consent, you can withdraw consent at any time.</li>
                </ul>
                <p>To exercise these rights, please <a href="mailto:contact@eliobay.com">contact@eliobay.com</a>.</p>

                <h3>Data Security</h3>
                <p>We use appropriate technical and organizational measures to secure your personal data against unauthorized access, alteration, disclosure, or destruction.</p>

                <h3>Data Retention</h3>
                <p>We retain your personal data for as long as necessary to fulfill the purposes outlined in this policy or as required by law. Once your personal data is no longer needed, we will securely delete or anonymize it.</p>

                <h3>Contact Us</h3>
                <p>For any questions or to exercise your data protection rights, please contact our Data Protection Team at <a href="mailto:contact@eliobay.com">contact@eliobay.com</a>.</p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/script.js"></script>

</body>
</html>
