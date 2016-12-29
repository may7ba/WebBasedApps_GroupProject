<html>
<head>
<style>
body{
background-image:url("theme.jpg");
background-repeat: repeat-y;	
 background-size: 1200px ; 
 
}

}
footer p{
	background:yellow;
	font-family:Garamond;
	color:#6633FF;
	font-size:20px;
}
input[type=submit] {
    padding:10px 15px; 
    background:#ffff80; 
    border:0 none;
    cursor:pointer;
    -webkit-border-radius: 5px;
    border-radius: 5px;
margin-left:30px;
border: 3px solid red;
}
h1{
	font-size:35px;
	font-family:Cursive;
	 animation: mymove 2s infinite;
}
@-webkit-keyframes mymove {
    from {background-color: red;}
    to {background-color: yellow;}
 a{
	 align:right;
	 padding-left:40px;
 }

</style>

</head>




<body>
<h1 style="text-align:center"><img src="http://images.clipartpanda.com/pizza-box-clip-art-as5580.gif"width="50px" height="50px" /><em>THE<span style="padding-left:10px;padding-right:10px">PIZZA</span>REVIEW<em><img src="http://images.clipartpanda.com/pizza-box-clip-art-as5386.gif"width="50px" height="50px"/></h1>
<?php

$hn='localhost';
$db='group6_project';
$un='root';
$pw='';//this is same as login.php
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

echo <<<_END

	<form action = 'login.php' method = 'post' >
	<fieldset style="background-color:#ffff80;border: 3px solid red;padding-top: -40px;
    padding-left:50px;margin-left:18em;width:400"><legend><h2 style=";font-size:30px;color:red">Log In</h2></legend>
		<span style=";font-size:15px;color:red">Username: </span><input type = 'text' name = 'username' style="border-color:red"><br>
	<span style=";font-size:15px;color:red">	Password:</span> <input type = 'password' name = 'password' style="border-color:red"><br>
		<input type = 'submit' value = 'Submit'>
		<input type = 'hidden' value = 'login'>
		</fieldset>
	</form>




_END;



if (isset($_POST['username']) && isset($_POST['password'])) {
	
	$un_temp = mysql_entities_fix_string($conn, $_POST['username']);
	$pw_temp = mysql_entities_fix_string($conn, $_POST['password']);
	
	echo $un_temp.'<br>';
	
	$query = "SELECT * from customer where username='$un_temp' ";
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	elseif($result->num_rows){
		$row = $result->fetch_array(MYSQLI_NUM);
		$customer_id= $row[0];
		$username = $row[2];
		$password = $row[3];
		$customer_name=$row[1];
		$result->close();
		
            
			

		/*$salt1 = 'afdfad';
		$salt2 = 'ftette';
		$token = hash('ripemd128', "$salt1$pw_temp$salt2" );
		*/
		
		if($pw_temp == $password){
			//echo "Hi $customer_name you are now logged in as $username";
			session_start();
			$_SESSION['username'] = $un_temp;
			$_SESSION['password'] = $pw_temp;
			$_SESSION['customer_id'] = $customer_id;
			//echo $Profile_id;
			//echo '<br /><a href="ar.php">add review</a>';
           // echo <<<_END
			//<form action='ar.php' method='post'>
			//<input type="hidden" name="profile_id" value="yes">
	         //<input type="hidden" name="profile_id" value="$row[0]">
	          //</form>
	
	
 //_END;     
	
			header("Location:1.php");//this will make sure that on login the user is moved to 1.php page.
			
		}else{
			exit();
			
		}		
	}else{
		exit();
	}
}else{
	exit();
}

$conn->close();


function mysql_entities_fix_string($conn, $string){
	return htmlentities(mysql_fix_string($conn, $string));
}

function mysql_fix_string($conn, $string){
	if(get_magic_quotes_gpc()) $string = stripslashes($string);
	return $conn->real_escape_string($string);
}


?>
<footer>

<br>

<p>Copyright&#169 2015. The Pizza Review, All rights reserved.</p>


<h5><p><a href="1.php">back to Home</a></p></h5>
</footer>
</body>
</html>
