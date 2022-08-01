
 <style>

.main{
    font-size: 12px;
    font-family: Comic Sans MS;
    padding: 50px 0;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
        -ms-flex-pack: center;
            justify-content: center;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
            gap:30px;
}

div#main-card {
    max-width: 300px;
    box-shadow: -5px 2px 18px 4px #ccc;
    

}

.cover-photo {
    background: #0ab581;
    width: 300px;
    height: 100px;
}

.photo {
    background: #f9f9f9;
    width: 300px;
    height: 100px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
}
img {
    position: relative;
    top: -50px;
    max-width: 100%;
    max-height: 100%;
    border-radius: 50%;
    box-shadow: -1px 1px 11px 6px rgba(189, 172, 172, 0.33);
}
.content {
    background: #f9f9f9;
    width: 300px;
    height: 100px;
    position: relative;
    top: -35px;
}

.contact {
    background: #30354d;
    width: 300px;
    height: 50px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
}

h2.name,
h3,
a {
    margin: 0;
    text-align: center;
}

h2.name {
    padding-bottom: 20px;
}

h3.fullstack {
    padding-bottom: 10px;
}

a {
    color: #0ab581;
    text-decoration: none;
}

a:hover {
    color: black;
}

ul {
    padding: 0;
}

.fa {
    font-size: 22px;
    padding: 10px;
    text-decoration: none;
    color: #0ab581;
}

.fa:hover {
    color: white;
}

a.certified {
  color: black;
  cursor: pointer;
}

a.certified:hover {
  color: #0ab581;
}

div#main-card:hover {
    -webkit-animation-name: pulse;  
    animation-name: pulse;
    -webkit-animation-duration: 2s;
    animation-duration: 2s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
}
    @-webkit-keyframes pulse {
    0% {
        -webkit-transform: scale3d(1, 1, 1);
        transform: scale3d(1, 1, 1);
    }
    50% {
        -webkit-transform: scale3d(1.05, 1.05, 1.05);
        transform: scale3d(1.05, 1.05, 1.05);
    }
    100% {
        -webkit-transform: scale3d(1, 1, 1);
        transform: scale3d(1, 1, 1);
    }
}
    @keyframes pulse {
    0% {
        -webkit-transform: scale3d(1, 1, 1);
        transform: scale3d(1, 1, 1);
    }
    50% {
        -webkit-transform: scale3d(1.05, 1.05, 1.05);
        transform: scale3d(1.05, 1.05, 1.05);
    }
    100% {
        -webkit-transform: scale3d(1, 1, 1);
        transform: scale3d(1, 1, 1);
    }
} 

 </style>
 <div class="main">
 <?php
			include_once("connect.php");
			$sql = "SELECT  doctorname, experience, education FROM doctor";
			$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));			
			while( $record = mysqli_fetch_assoc($resultset) ) {
			?>
<div id="main-card">

        <div class="cover-photo"></div>
        <div class="photo">
            <img src="user.png" alt="">
        </div>
        <div class="content">
            <h2 class="name"><a href="index1.php"><?php echo $record['doctorname']; ?></a></h2>
          <h3 class="fullstack">Experience: <?php echo  $record['experience']; ?> year<br />
<a href="https://www.youracclaim.com/badges/e678fb12-49ea-4609-8d97-622d7416880d" class="certified" target="_blank">Education: <?php echo $record['education']; ?></a></h3>
           
        </div>
        <div class="contact">
            <ul>
                <a href="https://www.facebook.com/in/jamuna.lamchanegrg/" target="_blank">
                    <i class="fa fa-facebook"></i>
                </a>
                <a href="https://github.com/jamuna1123" target="_blank">
                    <i class="fa fa-github"></i>
                </a>
                <a href="https://instagram/i_m_jamuna_grg/" target="_blank">
                    <i class="fa fa-instagram"></i>
                </a>
            </ul>
        </div>
       
    				
    </div>
    <?php } ?>

            </div>
    
           