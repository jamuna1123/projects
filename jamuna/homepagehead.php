<!DOCTYPE html>
<html>
  <head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

<title> Online Eye Doctor apoointment System</title>
<style>
	* {
		margin: 0;
		padding: 0;
	}

	.navbar {
		display: flex;
		align-items: center;
		justify-content: center;
		position: sticky;
		top: 0;
		cursor: pointer;
	}

	.background {
		background: white;
		background-blend-mode: darken;
		background-size: cover;
	}

	.nav-list {
		width: 70%;
		display: flex;
	}

	

	.nav-list li {
		list-style: none;
		padding: 26px 1px;
    margin-left: 150px;
	}

	.nav-list li a {
		text-decoration: none;
		color: darkblue;
    float: right;
	font-size: 25px;
	}

	.nav-list li a:hover {
		color: grey;
	}

	.rightnav {
		width: 30%;
		text-align: right;
  color: darkblue;
	}

	#search {
		padding: 5px;
		font-size: 17px;
		border: 2px solid grey;
		border-radius: 9px;
    color: darkblue;
	}
  .firstsection{
    background-image: url(home.jpg);
   background-color: skyblue;
   background-size: cover;
   width: 100%;
    height: 800px;
    background-position: center center;
    text-align: center;
    position: relative;


}
.box-main h1{
  color: darkblue;
  text-align: center;
    text-transform: uppercase;
    font-size: 35px;
    padding: 200px;
  
}
.box-main a{
    text-decoration: none;
    text-transform: uppercase;
    font-size: 20px;
    display: inline-block;
color: #fff;
text-align: center;

  }
  .book a{
    font-size:30px;
    background-color: darkblue;
    border: 1px solid #fff;
    padding: 10px 25px;
margin-top:50px;

  }
button{
  border: none;
    outline: 0;
    display: inline-block;
    padding: 8px;
    color: white;
    background-color: #000;
    text-align: center;
    cursor: pointer;
    width: 50%;
    font-size: 18px;
}
.image1{
	font-size: 100px;
}


	
</style>

</head>
<body>
  
<nav class="navbar background">
        <ul class="nav-list">
            <!-- <div class="logo1"> -->

            <li><a href="#">Home</a></li>
            <li><a href="registration.php">Registration</a></li>
            <li><a href="about.php">About </a></li>

            <li><a href="login.php">Login</a></li>

        </ul>
        </nav>
