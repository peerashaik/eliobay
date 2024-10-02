<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
    header('location:logout.php');
} else {
//Code for Updation 
if(isset($_POST['update'])) {
    $name=$_POST['name'];
    $contact=$_POST['contact'];
    $userid=$_GET['uid'];
    $msg=mysqli_query($con,"update users set name='$name',contactno='$contact' where id='$userid'");

    if($msg) {
        echo "<script>alert('Profile updated successfully');</script>";
        echo "<script type='text/javascript'> document.location = 'manage-users.php'; </script>";
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
<body class="sb-nav-fixed">
<?php include_once('includes/navbar.php');?>
<div id="layoutSidenav">
    <?php include_once('includes/sidebar.php');?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <?php 
                    $userid=$_GET['uid'];
                    $query=mysqli_query($con,"select * from users where id='$userid'");
                    while($result=mysqli_fetch_array($query))
                    {?>
                <h1 class="mt-4"><?php echo $result['name'];?>'s Profile</h1>
                <div class="card mb-4">
                    <form method="post">
                        <table class="table table-bordered">
                            <tr>
                                <th>Full Name</th>
                                <td><input class="form-control" id="name" name="name" type="text" value="<?php echo $result['name'];?>" required /></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td ><?php echo $result['email'];?></td>
                            </tr>
                            <tr>
                                <th>Phone No.</th>
                                <td><input class="form-control" id="contact" name="contact" type="text" value="<?php echo $result['contactno'];?>"  pattern="[0-9]{10}" title="10 numeric characters only"  maxlength="10" required /></td>
                            </tr>
                            <tr>
                                <th>Message</th>
                                <td><?php echo $result['message'];?></td>
                            </tr>
                            <tr>
                                <th>Reg. Date</th>
                                <td><?php echo $result['posting_date'];?></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:center ;"><button type="submit" class="btn btn-black" name="update">Update</button></td>
                            </tr>
                        </table>
                    </form>
                </div>
                <?php } ?>
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
