<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
    header('location:logout.php');
} else {
     // for  password change   
    if(isset($_POST['update'])) {
        $oldpassword=md5($_POST['currentpassword']); 
        $newpassword=md5($_POST['newpassword']);
        $sql=mysqli_query($con,"SELECT password FROM admin where password='$oldpassword'");
        $num=mysqli_fetch_array($sql);
    if($num > 0) {
        $adminid=$_SESSION['adminid'];
        $ret=mysqli_query($con,"update admin set password='$newpassword' where id='$adminid'");
        echo "<script>alert('Password Changed Successfully !!');</script>";
        echo "<script type='text/javascript'> document.location = 'change-password.php'; </script>";
    } else {
        echo "<script>alert('Old Password not match !!');</script>";
        echo "<script type='text/javascript'> document.location = 'change-password.php'; </script>";
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

<script language="javascript" type="text/javascript">
function valid() {
    if(document.changepassword.newpassword.value!= document.changepassword.confirmpassword.value) {
        alert("Password and Confirm Password Field do not match  !!");
        document.changepassword.confirmpassword.focus();
        return false;
    }
    return true;
}
</script>

</head>
<body class="sb-nav-fixed">
<?php include_once('includes/navbar.php');?>
<div id="layoutSidenav">
    <?php include_once('includes/sidebar.php');?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h3 class="mt-4">Change Password</h3>
                <div class="card mb-4">
                    <form method="post" name="changepassword" onSubmit="return valid();">
                        <table class="table table-bordered">
                            <tr>
                                <th>Current Password</th>
                                <td><input class="form-control" id="currentpassword" name="currentpassword" type="password" value="" required /></td>
                            </tr>
                            <tr>
                                <th>New Password</th>
                                <td><input class="form-control" id="newpassword" name="newpassword" type="password" value=""  required /></td>
                            </tr>
                            <tr>
                                <th>Confirm Password</th>
                                <td><input class="form-control" id="confirmpassword" name="confirmpassword" type="password"    required /></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:center ;"><button type="submit" class="btn btn-black" name="update">Change</button></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </main>
        <?php include('../includes/footer.php');?>
    </div>
</div>
        
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="../js/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="../js/datatables.js"></script>

</body>
</html>
<?php } ?>
