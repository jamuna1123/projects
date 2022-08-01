
<?php include('head.php');?>
<?php include('connect.php');
//  $nameErr = "";
//  $patientname = "";

if(isset($_POST['btn_submit']))
{
    // if(empty($_POST['patientname'])){
    //     $nameErr="please enter your name";
    // }
   
    
    if(isset($_GET['editid']))
    {

       
        $sql ="UPDATE patient SET patientname='$_POST[patientname]',admissiondate='$_POST[admissiondate]',admissiontime='$_POST[admissiontime]',address='$_POST[address]',mobileno='$_POST[mobilenumber]',city='$_POST[city]',pincode='$_POST[pincode]',loginid='$_POST[loginid]',bloodgroup='$_POST[select2]',gender='$_POST[gender]',dob='$_POST[dateofbirth]' WHERE patientid='$_GET[editid]'";
        if($qsql = mysqli_query($conn,$sql))
        {
?>


<link href="files/assets/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">



<link rel="stylesheet" type="text/css" href="files/bower_components/bootstrap/css/bootstrap.min.css">


<link rel="stylesheet" type="text/css" href="files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="files/assets/pages/data-table/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="files/assets/css/default-css.css">
<link rel="stylesheet" type="text/css" href="files/assets/css/font-awesome.min.css">




<link rel="stylesheet" type="text/css" href="files/assets/icon/icofont/css/icofont.css">

<link rel="stylesheet" type="text/css" href="files/assets/icon/feather/css/feather.css">

<link rel="stylesheet" type="text/css" href="files/assets/css/style.css">


<link rel="stylesheet" type="text/css" href="files/assets/css/jquery.mCustomScrollbar.css">

<link rel="stylesheet" href="popup_style.css">
            <div class="popup popup--icon -success js_success-popup popup--visible">
              <div class="popup__background"></div>
              <div class="popup__content">
                <h3 class="popup__content__title">
                  Success 
                </h3>
                <p>Patient Record Updated Successfully</p>
                <p>
                 <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
                 <?php echo "<script>setTimeout(\"location.href = 'view-patient.php';\",1500);</script>"; ?>
                </p>
              </div>
            </div>
<?php
        }
        else
        {
            echo mysqli_error($conn);
        }   
    }
    else
    {
        $passw = hash('sha256', $_POST['password']);
        function createSalt()
        {
            return '2123293dsj2hu2nikhiljdsd';
        }
        $salt = createSalt();
        $pass = hash('sha256', $salt . $passw);
        $sql ="INSERT INTO patient(patientname,admissiondate,admissiontime,address,mobileno,city,pincode,loginid,password,bloodgroup,gender,dob,status) values('$_POST[patientname]','$_POST[admissiondate]','$_POST[admissiontime]','$_POST[address]','$_POST[mobilenumber]','$_POST[city]','$_POST[pincode]','$_POST[loginid]','$pass','$_POST[select2]','$_POST[gender]','$_POST[dateofbirth]','Active')";
        if($qsql = mysqli_query($conn,$sql))
        {
?>
            <div class="popup popup--icon -success js_success-popup popup--visible">
              <div class="popup__background"></div>
              <div class="popup__content">
                <h3 class="popup__content__title">
                  Success 
                </h3>
                <p>Registration Successfully Now you can logged In</p>
                <p>
                 <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
                 <?php echo "<script>setTimeout(\"location.href = 'view-patient.php';\",1500);</script>"; ?>
                </p>
              </div>
            </div>
<?php
        }
        else
        {
            echo mysqli_error($conn);
        }
    }
}
if(isset($_GET['editid']))
{
    $sql="SELECT * FROM patient WHERE patientid='$_GET[editid]' ";
    $qsql = mysqli_query($conn,$sql);
    $rsedit = mysqli_fetch_array($qsql);
    
}

?>
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>

<div class="pcoded-content">
<div class="pcoded-inner-content">

<div class="main-body">
<div class="page-wrapper">

<div class="page-header">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<div class="d-inline">
<h4>Patient</h4>
<!-- <span>Lorem ipsum dolor sit <code>amet</code>, consectetur adipisicing elit</span> -->
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">

</li>

</ul>
</div>
</div>
</div>
</div>


<div class="page-body">
<div class="row">
<div class="col-sm-12">

<div class="card">
<div class="card-header">
<!-- <h5>Basic Inputs Validation</h5>
<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
</div>
<div class="card-block">

<form  id="main" method="post" action=""   enctype="multipart/form-data"  name="frmpatapp" onSubmit="return validateform()" >

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Patient Name</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="patientname" id="patientname" placeholder="Enter name...." pattern="[a-zA-Z\s]+" required=""  value="<?php  if(isset($_GET['editid'])) { echo $rsedit['patientname']; }  ?>" >
           
            <span class="messages"></span>

		
        </div>

        <label class="col-sm-2 col-form-label">Mobile No</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="mobilenumber" id="mobilenumber" placeholder="Enter mobilenumber...."  minlength="10" maxlength="10" pattern="^[0][1-9]\d{9}$|^[1-9]\d{9}$"  required=""  value="<?php if(isset($_GET['editid'])) { echo $rsedit['mobilenumber']; } ?>" >
            <span class="messages"></span>
        </div>
        
    </div>
    

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Admission Date</label>
        <div class="col-sm-4">
            <input type="date" class="form-control" name="admissiondate" id="admissiondate" placeholder="Enter admissiondate...." required=""  value="<?php if(isset($_GET['editid'])) { echo $rsedit['admissiondate']; } ?>" >
            <span class="messages"></span>
        </div>

        <label class="col-sm-2 col-form-label">Admission Time</label>
        <div class="col-sm-4">
            <input type="time" class="form-control" name="admissiontime" id="admissiontime" placeholder="Enter admissiontime...." required="" value="<?php echo $rsedit['admissiontime']; ?>">
            <span class="messages"></span>
        </div>
    </div>

    <div class="form-group row">        
        <label class="col-sm-2 col-form-label">Login ID</label>
        <div class="col-sm-4">
            <input class="form-control" type="email" name="loginid" id="loginid"  required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                        value="<?php if(isset($_GET['editid'])) { echo $rsedit['loginid']; } ?>" />
                        
            <span class="messages"></span>
        </div>

        <label class="col-sm-2 col-form-label">Blood Group</label>
        <div class="col-sm-4">
            <select class="form-control show-tick" name="select2" id="select2">
                <option value="">Select</option>
                <?php
            $arr = array("A+","A-","B+","B-","O+","O-","AB+","AB-");
            foreach($arr as $val)
            {
                if($val == $rsedit['bloodgroup'])
                {
                    echo "<option value='$val' selected>$val</option>";
                }
                else
                {
                    echo "<option value='$val'>$val</option>";            
                }
            }
            ?>
            </select>
            <span class="messages"></span>
        </div>

    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">City</label>
        <div class="col-sm-4">
             <input class="form-control" type="text" name="city" id="city" required=""
                        value="<?php if(isset($_GET['editid'])) { echo $rsedit['city']; } ?>" />
            <span class="messages"></span>
        </div>

        <label class="col-sm-2 col-form-label">PIN Code</label>
        <div class="col-sm-4">
            <input class="form-control" type="text" name="pincode" id="pincode" required=""
                        value="<?php if(isset($_GET['editid'])){ echo $rsedit['pincode']; } ?>" />
            <span class="messages"></span>
        </div>
    </div>

<?php 
  if(!isset($_GET['editid']))
  {
?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-4">
            <input class="form-control" type="password" name="password" id="password" required=""/>
            <span class="messages"></span>
        </div>

        <label class="col-sm-2 col-form-label">Confirm Password</label>
        <div class="col-sm-4">
            <input class="form-control" type="password" name="cnfirmpassword" id="cnfirmpassword" required=""/>
            <span class="messages" id="confirm-pw" style="color: red;"></span>
        </div>
    </div>
<?php } ?>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Gender</label>
        <div class="col-sm-4">
            <select name="gender" id="gender" class="form-control" required="">
                <option value="">-- Select One -- </option>
                <option value="Male" <?php if(isset($_GET['editid']))
                    { if($rsedit['gender'] == 'Male') { echo 'selected'; } } ?>>Male</option>
                <option value="Female" <?php if(isset($_GET['editid']))
                    { if($rsedit['gender'] == 'Female') { echo 'selected'; } } ?>>Female</option>
            </select>
        </div>

        <label class="col-sm-2 col-form-label">Date of Birth</label>
        <div class="col-sm-4">
            <input class="form-control" type="date" name="dateofbirth" required="" max="<?php echo date("Y-m-d"); ?>"
                        id="dateofbirth" value="<?php echo $rsedit['dob']; ?>" />
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
            <textarea name="address" id="address" class="form-control" required=""><?php if(isset($_GET['editid'])) { echo $rsedit['address']; } ?></textarea>
        </div>

    </div>



    <div class="form-group row">
        <label class="col-sm-2"></label>
        <div class="col-sm-10">
            <button  type="submit" name="btn_submit" class="btn btn-primary m-b-0">Submit</button>
           
        </div>
    </div>
   

</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<?php include('footer.php');
?> 
<script type="application/javascript">
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function validateform() {
    if (document.frmpatapp.patientname.value == "") {
        alert("Patient name should not be empty..");
        document.frmpatapp.patientname.focus();
        return false;
    } else if (!document.frmpatapp.patientname.value.match(alphaspaceExp)) {
        alert("Patient name not valid..");
        document.frmpatapp.patientname.focus();
        return false;
    }else {
        return true;
    }
}
</script>

<script type="text/javascript">


    $('#main').keyup(function(){
        $('#confirm-pw').html('');
    });

    $('#cnfirmpassword').change(function(){
        if($('#cnfirmpassword').val() != $('#password').val()){
            $('#confirm-pw').html('Password Not Match');
        }
    });

    $('#password').change(function(){
        if($('#cnfirmpassword').val() != $('#password').val()){
            $('#confirm-pw').html('Password Not Match');
        }
    });
</script>