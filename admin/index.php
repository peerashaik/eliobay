<?php session_start(); 
include_once('../includes/config.php');
// Code for login 
if(isset($_POST['login'])) {
    $adminusername=$_POST['username'];
    $pass=md5($_POST['password']);
    $ret=mysqli_query($con,"SELECT * FROM admin WHERE username='$adminusername' and password='$pass'");
    $num=mysqli_fetch_array($ret);
    
    if($num > 0) {
        $extra="dashboard.php";
        $_SESSION['login']=$_POST['username'];
        $_SESSION['adminid']=$num['id'];
        echo "<script>window.location.href='".$extra."'</script>";
        exit();
    } else {
        echo "<script>alert('Invalid username or password');</script>";
        $extra="index.php";
        echo "<script>window.location.href='".$extra."'</script>";
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>ELIOBAY | Admin</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="We help homeowners install solar panels with minimal upfront costs by using investments from ELIO Energy tokens and saving your money on energy bills"/>
<meta name="author" content="" />

<link rel="icon" type="image/x-icon" href="../images/favicon.ico">

<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
<link href="../css/styles.css" rel="stylesheet" />
<link href="../css/custom.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body>
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <div class="container vh-100">
            <div class="row vh-100 justify-content-center align-items-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header bg-black text-center">
                            <h2 class="text-white"><img src="../../images/logo.svg" class="admin-logo" loading="lazy" alt="ElioBay" /></h2>
                            <h5 class="text-white my-4">Welcome, please sign in</h5>
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="username" type="text" placeholder="Username"  required/>
                                    <label for="inputEmail">Username</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="password" type="password" placeholder="Password" required />
                                    <label for="inputPassword">Password</label>
                                </div>
                                <div class="text-center my-5">
                                    <!-- <a class="small" href="password-recovery.php">Forgot Password?</a> -->
                                    <button class="btn btn-black" name="login" type="submit">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <?php include('../includes/footer.php');?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="../js/script.js"></script>

</body>
</html>