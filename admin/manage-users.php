<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
    header('location:logout.php');
} else {
    
// for deleting user
if(isset($_GET['id'])) {
    $adminid=$_GET['id'];
    $msg=mysqli_query($con,"delete from users where id='$adminid'");
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
                <h3 class="mt-4">Manage Registered Users</h3>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Manage Registered Users</li>
                </ol>
                <div class="card my-5">
                    <div class="card-header mb-3">
                        <i class="fas fa-table me-1"></i>
                        Registered Users Details
                    </div>
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Sno.</th>
                                <th>Full Name</th>
                                <th>Email Id</th>
                                <th>Phone no.</th>
                                <th>Message</th>
                                <th>Reg. Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $ret=mysqli_query($con,"select * from users");
                                $cnt=1;
                                while($row=mysqli_fetch_array($ret))
                                {?>
                            <tr>
                                <td><?php echo $cnt;?></td>
                                <td><?php echo $row['name'];?></td>
                                <td><?php echo $row['email'];?></td>
                                <td><?php echo $row['contactno'];?></td>
                                <td><?php echo $row['message'];?></td>
                                <td><?php echo $row['posting_date'];?></td>
                                <td>
                                    <a href="profile-user.php?uid=<?php echo $row['id'];?>"><i class="fas fa-edit"></i></a>
                                    <a href="manage-users.php?id=<?php echo $row['id'];?>" onClick="return confirm('Do you really want to delete this user?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            <?php $cnt=$cnt+1; }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        <?php include('../includes/footer.php');?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="../js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="../js/datatables.js"></script>

</body>
</html>
<?php } ?>