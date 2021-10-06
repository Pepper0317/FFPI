<?php
// We need to use sessions, so you should always start sessions using the below code.
include '../dbcon.php';
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
header('Location: ../logout.php');
exit;
}
    if(isset($_SESSION["loggedin"])){
        if((time() - $_SESSION["last_login_time"]) > 300000){
            header('location: ../logout.php');
        }
else {
            $_SESSION['last_login_time'] = time();
}
    }
?>
<?php
//settng up variables
$yusername = $_SESSION['username'];
$getuser = mysqli_query($con,"select * from users where username = '$yusername'");
$user = mysqli_fetch_array($getuser);

// assigning variable to show
$authority = $user['user_type'];

/*<!-- ================= AUTHORIZED PERSONEL ONLY ================== -->*/
if ($authority == "admin" || $authority == "super_admin" || $authority == "user")
{
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Financial Freedom Plans Inc.</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="glyphicon glyphicon-grain"></i>
                </div>
                <div class="sidebar-brand-text mx-3">FFPI <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-heart"></i>
                    <span>Planholder</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>                        <a class="collapse-item" href="">Register</a>                  
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Collector</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
<a class="collapse-item" href="">Register</a>                         
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-handshake"></i>
                    <span>Agents</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Register</a>                       
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-credit-card"></i>
                    <span>Payment</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Payment</a>                        
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong></strong> </p>
                <a class="btn btn-success btn-sm" href=""></a>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800>MEMBERS INFORMATION</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                   
<form>

<section>

<h4><b>Members Information</b></h4>

<div class="form-row">
    <div class="form-group col-md-4">
      <label for="mID">Members ID</label>
         <label class="form-control" id="mID" name="ID">
        <?php
        $addzero = 4;
        $string = "0000";
        /*<!-- ================= GENERATE NEW ID ================== -->*/
        $id = str_pad($string + 1, $addzero, 0, STR_PAD_LEFT);
        $newID = "FFPI-M2".$id;
        $checkID = mysqli_query($con,"select * from members_information");
        $check = mysqli_fetch_array($checkID);
        $userID = $check['member_id'];
        
        if($userID != $newID)
        {
            echo $newID;
        }
        else if($userID == $newID)
        {
            /*<!-- ================= ID EXISTED ================== -->*/
            $id2 = str_pad($id + 1, $addzero, 0, STR_PAD_LEFT);
            echo $updateID = "FFPI-M2".$id2;
        }
        else
        if($existingID = $userID == $newID || $userID == $newID)
        foreach($existingID as $id)
        {
            /*<!-- ================= LIMIT EXISTED ================== -->*/
            $id3 = str_pad($id + 1, $addzero++, 0, STR_PAD_LEFT);
            echo $limitID = "FFPI-M22".$id3;
        }
        ?></label>
    </div>

   <div class="form-group col-md-4">
     <label for="doa">Date of Application</label>
        <input type="date" id="date" name="date" class="form-control">
   </div>
</div>

<div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputls">Last Name</label>
         <input type="text" name="lastname" class="form-control" id="inputls">
    </div>

    <div class="form-group col-md-3">
      <label for="inputfn">First Name</label>
         <input type="text" name="firstname" class="form-control" id="inputfn">
    </div>

    <div class="form-group col-md-3">
      <label for="inputmn">Middle Name</label>
         <input type="text" name="middlename" class="form-control" id="inputmn">
    </div>

    <div class="form-group col-md-2">
      <label for="inputmn">Suffix</label>
         <input type="text" name="suffix" class="form-control" id="inputmn">
    </div>
</div>

<div class="form-row">
    
    <div class="form-group col-md-3">   
        <label for="province">Address</label>
        <input type="text" class="form-control" name="housenumber" id="inputAddress" placeholder="House No./Street">
    </div>
    
    <div class="form-group col-md-2">                  
                    <label for="province">Province</label>
                    <select id="province" class="form-control">
                    <option>Choose...</option>
                    <option <? ($temp == $value) ? "SELECTED" : "" ?> ></opton>
                    </select>
    </div>
    
    <div class="form-group col-md-2">
                    <label for="city">City/Municipality</label>
                    <select id="city" class="form-control">
                    <option>Choose Province First</option>
                    </select>
    </div>
                   
    <div class="form-group col-md-3">
                    <label for="barangay">Barangay</label>
                    <select id="barangay" class="form-control">
                    <option>Choose Municipality First</option>
                    </select>
    </div>
    <div class="form-group col-md-2">
                    <label for="barangay">Postal/Zip Code</label>
         <input type="text" class="form-control" name="zipcode" id="inputls" placeholder="Postal/Zip Code">
    </div>

</div>

<div class="form-row">
  <div class="form-group col-md-3">
    <label for="hbd">Birthday</label>
      <input type="date" id="hbd" name="date" class="form-control">
  </div>

  <div class="form-group col-md-3">
    <label for="Age">Age</label>
      <input type="text" name="age" class="form-control" id="Age">
  </div>

  <div class="form-group col-md-3">
    <label for="bp">Birthplace</label>
      <input type="text" name="birthplace" class="form-control" id="bp">
  </div>

  <div class="form-group col-md-3">
    <label for="Gender">Gender</label>
      <select id="Gender" name="gender" class="form-control">
      <datalist id="gender">
          <?php
          $getgender = mysqli_query($con,"select * from gender_list");
          if($getgender) 
          {
                while($checkgender = mysqli_fetch_array($getgender))
                {
                  $showall = $checkgender['LIST'];
                  echo"<option>$showall</option>";
                }
          }
          ?>
      </select>
  </div> </div>

<div class="form-row">
  <div class="form-group col-md-3">
    <label for="cs">Civil Status</label>
      <select id="Gender" name="civilstatus" list="civilstatus"class="form-control">
      <datalist id="civilstatus">
          <?php
          $getstatus = mysqli_query($con,"select * from civil_status_list");
          if($getstatus) 
          {
                while($checkstatus = mysqli_fetch_array($getstatus))
                {
                  $showall = $checkstatus['LIST'];
                  echo"<option>$showall</option>";
                }
          }
          ?>
      </select>
  </div>

  <div class="form-group col-md-4">
    <label for="cn">Contact No.</label>
      <input type="text" name="contactnumber" class="form-control" id="cn">
  </div>

  <div class="form-group col-md-4">
    <label for="Email">Email</label>
      <input type="text" name="email" class="form-control" id="Email">
   </div>
</div>
</section>

<hr class="my-6">
<section> <br>
<h4><b>Beneficiaries</b></h4>
<div class="form">
    <label for="primary"><i>Primary</i></label>
  </div>

<div class="form-row">
  <div class="form-group col-md-5">
    <label for="nameP">Name</label>
      <input type="text" class="form-control"name="namebata" id="primary">
  </div>

  <div class="form-group col-md-3">
    <label for="rel1">Relationship</label>
      <input type="text" class="form-control"name="relationshipbata" id="rel1">
  </div>

  <div class="form-group col-md-1">
    <label for="Age1">Age</label>
      <input type="text" class="form-control"name="agebata" id="Age1">
  </div>

  <div class="form-group col-md-3">
    <label for="hbd1">Birthday</label>
      <input type="date" id="hbd1" name="bdaybata"
class="form-control">
  </div>
</div>

<div class="form">
    <label for="Contingent"><i>Contingent</i></label>
  </div>

<div class="form-row">
  <div class="form-group col-md-5">
    <label for="nameC">Name</label>
      <input type="text" class="form-control"name="name18" id="primary">
  </div>

  <div class="form-group col-md-3">
    <label for="rel2">Relationship</label>
      <input type="text" class="form-control"name="relationship18" id="rel2">
  </div>

  <div class="form-group col-md-1">
    <label for="Age2">Age</label>
      <input type="text" class="form-control"name="age18" id="Age2">
  </div>

  <div class="form-group col-md-3">
    <label for="hbd2">Birthday</label>
      <input type="date" id="hbd2" name="bday18"
class="form-control">
  </div>
</div>
</section>

<hr class="my-6">
<section> <br>
<h4><b>Sales Agent Information</b></h4>

<div class="form-row">
  <div class="form-group col-md-3" id="">
    <label for="agent">Agent ID</label>
      <select id="select" name="agentid" list="agentid_list" class="form-control">
      <datalist id="agentid_list">
                  <option>Choose...</option>
          <?php
          $getstatus = mysqli_query($con,"select * from agents");
          if($getstatus) 
          {
                while($checkstatus = mysqli_fetch_array($getstatus))
                {
                  $showall = $checkstatus["agent-id"];
                  echo"
                  <option>$showall</option>";
                }
          }
          ?>
      </select>
  </div>
  <div class="form-group col-md-4">
    <label for="afn">Agent Full Name</label>
      <div id="input"class="form-control">
          <?php
          if(isset($_GET['agentid']))
      $agentid = $_GET['agentid'];
$getuser = mysqli_query($con,"SELECT * FROM `agents` WHERE `agent-id` = '$agentid'");
$user = mysqli_fetch_array($getuser);
      echo $user['fullname'];
      ?>
      </div>
  </div>

  <div class="form-group col-md-4">
    <label for="position">Position</label>
      <div id="position"
class="form-control">
          <?php
      echo $user['position'];
      ?>
</div>
  </div>

</div>
</section>

<hr class="my-6">
<section> <br>
<h4><b>Plan Type</b></h4>

<div class="form-row">
  <div class="form-group col-md-3">
    <label for="pt">Plan Type</label>
      <select id="pt" name="plantype" list="plan_type_list" class="form-control">
      <datalist id="plan_type_list">
          <?php
          $getstatus = mysqli_query($con,"select * from plan_type_list");
          if($getstatus) 
          {
                while($checkstatus = mysqli_fetch_array($getstatus))
                {
                  $showall = $checkstatus['LIST'];
                  echo"<option>$showall</option>";
                }
          }
          ?>
      </select>
  </div>

  <div class="form-group col-md-3">
    <label for="mtp">Mode of Payment</label>
      <select id="mtp" name="monthstopay" list="months_to_pay_list" class="form-control">
      <datalist id="mode_of_payment_list">
          <?php
          $getstatus = mysqli_query($con,"select * from mode_of_payment_list");
          if($getstatus) 
          {
                while($checkstatus = mysqli_fetch_array($getstatus))
                {
                  $showall = $checkstatus['LIST'];
                  echo"<option>$showall</option>";
                }
          }
          ?>
      </select>
  </div>

  <div class="form-group col-md-3">
    <label for="ta">Amount to Pay/Month</label>
      <div type="number" id="ta" class="form-control">editmatik</div>
  </div>
  <div class="form-group col-md-3">
    <label for="ta">Total Amount</label>
      <div type="number" id="ta" class="form-control">editmatik</div>
  </div>
</div>
</section>

<hr class="my-6">
<section> <br>
<h4><b>Declaration of Health Status</b></h4>

<div> I hereby declare that I am free from any harmful and dreaded diseases like:</div>
<div> (<i> Answer with Yes or No </i>) </div><br>

<div class="row ">
    <div class="form-group col-lg-5">
      <div class="d-flex justify-content-between">
        <label class="Bold">1. Any Cardiovascular Problem</label>
        <div class="form-group">
          <input class="radio-inline" name="1" type="radio">Yes
          <input class="radio-inline" name="1" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-5">
      <div class="d-flex justify-content-between">
        <label class="Bold">2. Cancer/Tumor/Neoplasm</label>
        <div class="form-group">
          <input class="radio-inline" name="2" type="radio">Yes
          <input class="radio-inline" name="2" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-5">
      <div class="d-flex justify-content-between">
        <label class="Bold">3. Diabetes Mellitus <i>(all types)</i></label>
        <div class="form-group">
          <input class="radio-inline" name="3" type="radio">Yes
          <input class="radio-inline" name="3" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-5">
      <div class="d-flex justify-content-between">
        <label class="Bold">4. Kidney Problem</label>
        <div class="form-group">
          <input class="radio-inline" name="4" type="radio">Yes
          <input class="radio-inline" name="4" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-5">
      <div class="d-flex justify-content-between">
        <label class="Bold">5. Severe Respiratory Problem</label>
        <div class="form-group">
          <input class="radio-inline" name="5" type="radio">Yes
          <input class="radio-inline" name="5" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-5">
      <div class="d-flex justify-content-between">
        <label class="Bold">6. Hernias</label>
        <div class="form-group">
          <input class="radio-inline" name="6" type="radio">Yes
          <input class="radio-inline" name="6" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-5">
      <div class="d-flex justify-content-between">
        <label class="Bold">7. Endometriosis</label>
        <div class="form-group">
          <input class="radio-inline" name="7" type="radio">Yes
          <input class="radio-inline" name="7" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-5">
      <div class="d-flex justify-content-between">
        <label class="Bold">8. Hemorrhoids</label>
        <div class="form-group">
          <input class="radio-inline" name="8" type="radio">Yes
          <input class="radio-inline" name="8" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-5">
      <div class="d-flex justify-content-between">
        <label class="Bold">9. Ear-Nose-Throat Condition Requiring Surgery</label>
        <div class="form-group">
          <input class="radio-inline" name="9" type="radio">Yes
          <input class="radio-inline" name="9" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-5">
      <div class="d-flex justify-content-between">
        <label class="Bold">10. Cataracts/Glaucoma</label>
        <div class="form-group">
          <input class="radio-inline" name="10" type="radio">Yes
          <input class="radio-inline" name="10" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-5">
      <div class="d-flex justify-content-between">
        <label class="Bold">11. Epilepsy</label>
        <div class="form-group">
          <input class="radio-inline" name="11" type="radio">Yes
          <input class="radio-inline" name="11" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-5">
      <div class="d-flex justify-content-between">
        <label class="Bold">12. Cirrhosis of the Liver</label>
        <div class="form-group">
          <input class="radio-inline" name="12" type="radio">Yes
          <input class="radio-inline" name="12" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-5">
      <div class="d-flex justify-content-between">
        <label class="Bold">13. Anal Fistulae</label>
        <div class="form-group">
          <input class="radio-inline" name="13" type="radio">Yes
          <input class="radio-inline" name="13" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-5">
      <div class="d-flex justify-content-between">
        <label class="Bold">14. Calculi of the Urinary System</label>
        <div class="form-group">
          <input class="radio-inline" name="14" type="radio">Yes
          <input class="radio-inline" name="14" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-5">
      <div class="d-flex justify-content-between">
        <label class="Bold">15. Gastric/Duodenal Ulcer</label>
        <div class="form-group">
          <input class="radio-inline" name="15" type="radio">Yes
          <input class="radio-inline" name="15" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-5">
      <div class="d-flex justify-content-between">
        <label class="Bold">16. Hallux Valgus</label>
        <div class="form-group">
          <input class="radio-inline" name="16" type="radio">Yes
          <input class="radio-inline" name="16" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-5">
      <div class="d-flex justify-content-between">
        <label class="Bold">17. Collagen Diseases</label>
        <div class="form-group">
          <input class="radio-inline" name="17" type="radio">Yes
          <input class="radio-inline" name="17" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-5">
      <div class="d-flex justify-content-between">
        <label class="Bold">18. Hypertension</label>
        <div class="form-group">
          <input class="radio-inline" name="18" type="radio">Yes
          <input class="radio-inline" name="18" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-5">
      <div class="d-flex justify-content-between">
        <label class="Bold">19. Cholecystitis/Choielithiasis</label>
        <div class="form-group">
          <input class="radio-inline" name="19" type="radio">Yes
          <input class="radio-inline" name="19" type="radio" checked="true">No
        </div>
      </div>
    </div>
    <div class="form-group col-lg-8">
      <div class="d-flex justify-content-between">
        <label class="Bold">20. Others</label>&nbsp
        <div class="form-group">
          <input class="text"></input>
        </div>
      </div>
    </div>
  </div>
<div>&nbsp <i>The following, among others, when occurring during the first year of the coverage after the effective date, are considered Pre-Existing.</i></div>



</div>
</section>

<section class="text-center">
  <a class="btn btn-dark" href="../home/">Go Back</a>
  <button class="btn btn-dark"x type="Reset">Reset</button>
  <button class="btn btn-dark" type="Submit">Submit</button>
  <a class="btn btn-dark" href="#" role="button">Contribution Report</a>
</section>
</section>
</form>
            


                            

                            

                     
                            
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>

        <!-- script type="text/javascript" src="../../jquery.ph-locations.js"></script -->
        <script type="text/javascript" src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations.js"></script -->
        <script type="text/javascript">
            
            var my_handlers = {


                fill_cities: function(){

                    var province_code = $(this).val();
                    $('#city').ph_locations( 'fetch_list', [{"province_code": province_code}]);
                },


                fill_barangays: function(){

                    var city_code = $(this).val();
                    $('#barangay').ph_locations('fetch_list', [{"city_code": city_code}]);
                }
            };

            $(function(){
             
                $('#province').on('change', my_handlers.fill_cities);
                $('#city').on('change', my_handlers.fill_barangays);

               
                $('#province').ph_locations({'location_type': 'provinces'});
                $('#city').ph_locations({'location_type': 'cities'});
                $('#barangay').ph_locations({'location_type': 'barangays'});

                $('#province').ph_locations('fetch_list');
            });
        </script>
<script>
    $(document).ready(function(){
		 $("#select").click("#input");
    });
</script>
</body
</html>
<?php
}
?>
