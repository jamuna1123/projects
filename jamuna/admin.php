
<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include("connect.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		$sql ="UPDATE admin SET username='$_POST[username]',loginid='$_POST[loginid]',password='$pass',status='Active',WHERE adminid='$_GET[editid]'";
		if($qsql = mysqli_query($conn,$sql))
		{
			echo "<div class='alert alert-success'>
			Admin Record updated successfully
			</div>";
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
		$sql ="INSERT INTO admin(username,loginid,password,status) values('$_POST[username]','$_POST[loginid]','$pass','Active')";
		if($qsql = mysqli_query($conn,$sql))
		{
			echo "<div class='alert alert-success'>
			Admin Record Inserted successfully
			</div>";
		}
		else
		{
			echo mysqli_error($conn);
		}
	}
}
if(isset($_GET['editid']))
{
	$sql="SELECT * FROM admin WHERE adminid='$_GET[editid]' ";
	$qsql = mysqli_query($conn,$sql);
	$rsedit = mysqli_fetch_array($qsql);
	
}
?>

<div class="container-fluid">
	<div class="block-header">
		<h2 class="text-center"> Add New Admin </h2>
	</div>
	<div class="row clearfix">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">

				<form method="post" action="" name="frmadminprofile" onSubmit="return validateform()">


					<div class="body">
						<div class="row clearfix">
							<div class="col-sm-12">   
								<div class="form-group">
									<label> Admin Name</label>
									<div class="form-line">
										<input type="text" class="form-control"  name="username" id="username" value="<?php if(isset($_GET['editid'])) {  echo $rsedit['username']; }?>"/>
									</div>
								</div>

							</div>	

						</div>
						<div class="row clearfix"> 
							<div class="col-sm-12">                           
								<div class="form-group">
									<label>Admin Log in Id</label>
									<div class="form-line">
										<input type="text" class="form-control" name="loginid" id="loginid" value="<?php if(isset($_GET['editid'])) { echo $rsedit['loginid'];} ?>" />
									</div>
								</div>    
							</div>                      
						</div>  
						<div class="row clearfix"> 
							<div class="col-sm-12">                              
								<div class="form-group">
									<label> Admin Password</label>
									<div class="form-line">
										<input type="password" class="form-control"  name="password" id="password" />
									</div>
								</div>
							</div>                          
						</div> 
						<div class="row clearfix"> 
							<div class="col-sm-12">                              
								<div class="form-group">
									<label>Confirm Admin Password</label>
									<div class="form-line">
										<input type="password" class="form-control"  name="cnfirmpassword" id="cnfirmpassword" />
									</div>
								</div>
							</div>                          
						</div> 
						<div class="row clearfix">                            
							<div class="col-sm-3 col-xs-12">
								<div class="form-group drop-custum">
									<label>Status</label>

									<select class="form-control show-tick" name="select">
										<option value="" selected>Select One</option>
										<?php
										$arr = array("Active","Inactive");
										foreach($arr as $val)
										{
											if($val == $rsedit['status'])
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
								</div>
							</div>                            
						</div>                    

						<div class="col-sm-12">
							<input type="submit" class="btn btn-raised g-bg-cyan" name="submit" id="submit" value="Submit" />

						</div>
					</div>


				</form>
			</div>
		</div>
	</div>
</div>

				<?php
				include("footer.php");
				?>
				<script type="application/javascript">
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function validateform()
{
	if(document.frmadmin.username.value == "")
	{
		alert("Admin name should not be empty..");
		document.frmadmin.username.focus();
		return false;
	}
	else if(!document.frmadmin.username.value.match(alphaspaceExp))
	{
		alert("Admin name not valid..");
		document.frmadmin.username.focus();
		return false;
	}
	else if(document.frmadmin.loginid.value == "")
	{
		alert("Login ID should not be empty..");
		document.frmadmin.loginid.focus();
		return false;
	}
	else if(!document.frmadmin.loginid.value.match(emailExp))
	{
		alert("Login ID not valid..");
		document.frmadmin.loginid.focus();
		return false;
	}
	else if(document.frmadmin.password.value == "")
	{
		alert("Password should not be empty..");
		document.frmadmin.password.focus();
		return false;
	}
	else if(document.frmadmin.password.value.length < 8)
	{
		alert("Password length should be more than 8 characters...");
		document.frmadmin.password.focus();
		return false;
	}
	else if(document.frmadmin.password.value != document.frmadmin.cnfirmpassword.value )
	{
		alert("Password and confirm password should be equal..");
		document.frmadmin.password.focus();
		return false;
	}
	else if(document.frmadmin.select.value == "" )
	{
		alert("Kindly select the status..");
		document.frmadmin.select.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>