<!DOCTYPE html>
<html lang="en">
<head>
<title>ELIOBAY | Coming Soon</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="We help homeowners install solar panels with minimal upfront costs by using investments from ELIO Energy tokens and saving your money on energy bills"/>
<meta name="author" content="" />

<link rel="icon" type="image/x-icon" href="images/favicon.ico">

<script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
<link href="css/styles.css" rel="stylesheet" />
<link href="css/custom.css" rel="stylesheet" />

<script>
window.addEventListener("load", function() {
    let url = window.location.href.split("?");
    let urlUser = "user=success";
    let urlBuyer = "buyer=success";

    if(url[1] === urlUser) {
        $("#userSuccess").addClass('slideup');
        setTimeout(function() {
            $("#userSuccess").removeClass('slideup');
            $("#userSuccess").addClass('slidedown');
        }, 8000);
        setTimeout(function() {
            $(".who-we-are").addClass('slideleft');
            $(".what-we-do").addClass('slideright');
        }, 8400);
    } else if(url[1] === urlBuyer) {
        $("#buyerSuccess").addClass('slideup');
        setTimeout(function() {
            $("#buyerSuccess").removeClass('slideup');
            $("#buyerSuccess").addClass('slidedown');
        }, 8000);
        setTimeout(function() {
            $(".who-we-are").addClass('slideleft');
            $(".what-we-do").addClass('slideright');
        }, 8400);
    }      
});
</script>

</head>
<body class="success-page">
<!-- Header Section -->
<div class="header bg-black text-white text-center">
    <a href="index.php"><img src="images/logo.svg" class="logo" loading="lazy" alt="ElioBay" /></a>
</div>

<!-- Welcome Banner -->
<div class="welcome-banner">
    <div class="who-we-are">
        <div>
            <h4>WHO WE ARE.</h4>
            <p><strong>ELIOBAY</strong> is a blockchain-powered platform for Real World Projects (RWP) that connects homeowners with investors to make solar energy accessible and affordable through tokenized funding.</p>
            <p><strong>ELIOBAY brings together two groups:</strong></p>
            <ul>
            <li><strong>Homeowners</strong> who want to install solar panels with tokenized funding to make solar installations accessible and affordable.</li>
            <li style="margin-top: 20px;"><strong>Investors</strong> who want to invest in clean energy and earn rewards through tokenized solar energy investments, making the process clear to everyone.</lip>
            </ul>
        </div>
    </div>
    <div class="what-we-do">
        <div>
            <h4>WHAT WE DO.</h4>
            <p>We help homeowners install solar panels with minimal upfront costs by using investments from Tokens - ELIO Energy and saving your money on energy bills.</p>
            <p class="mb-0">We offer token buyers the opportunity to invest in solar energy projects. By purchasing Tokens - ELIO Energy, you support solar installations and receive profits generated from clean energy</p>
        </div>
    </div>
</div>

<div id="userSuccess" class="success-popup">
    <div class="text-white">
        <p>Thank you for registering your interest!</p>
        <p>We appreciate your interest in clean energy.</p>
        <p>Stay tuned for more details, as our team will be reaching out soon to guide you through the next steps.</p>
    </div>
</div>

<div id="buyerSuccess" class="success-popup">
    <div class="text-white">
        <p>Thank you for signing up!</p>
        <p>You’re eligible for a 20% discount. </p>
        <p>Stay tuned for more details, as our team will be reaching out soon to guide you through the next steps.</p>
    </div>
</div>

<!-- Footer -->
<footer class="footer text-center bg-black">
  <div class="copyright">
      <h1 class="m-0 color-red">COMING SOON</h1>
  </div>
</footer>

</body>
</html>
