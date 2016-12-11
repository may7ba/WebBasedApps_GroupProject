<html>
<head>

<script type='text/javascript' src="validate.js"> </script>
<script type="text/javascript">
function validate(form){
	fail=validateFname(form.fname.value);
	
	if(fail ==''){
		return true;
	}
	else{
		alert(fail);
		return false;
	}
	
}

</script>
<style>
body{
background-image:url("theme.jpg");
background-repeat: repeat-y;	
 background-size: 1200px ; 
 
}
input[type=text]:focus {
    border-color:#333;
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
border: 3px solid red;}

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
echo<<<_END
<form method="post" action="register.php" onsubmit='return validate(this)'>

                <legend><h2 style="font-size:30px;color:red"Register</legend>
               <label for ="fname">  Full Name:</label>
			   <input type="text" id="fname" name="fname" style="margin-left:10px"  size="30" placeholder="Enter your name"><br> 
               <label for="uname" >User Name:</label>
                <input type="text" id="uname" name="uname" style="margin-left:10px"  size="30" placeholder="Enter your user name"><br> 
 
                <label for="username">Password:</label>
				<input type="password" size="30" id="pass" name="pass"style="margin-left:30px" placeholder="Enter your password"><br>
				<button>Submit</button> <br>
  
      </form>
_END;
	
if (isset($_POST['fname']) &&
isset($_POST['uname']) &&
isset($_POST['pass']))
{
		$fname=$_POST['fname'];
        $uname=$_POST['uname'];
        $pass=$_POST['pass'];
        
		$conn = mysqli_connect("localhost","root","") or die("could not connect to server");
        $select_db=mysqli_select_db($conn,'group6_project') or die("could not connect to server");
         
        $sql = "insert into customer(customer_name,username,password) values"."('$fname','$uname','$pass')";
       $result = $conn->query($sql);
    if (!$result) echo "INSERT failed: $sql<br>" .
     $conn->error . "<br><br>";
	else
	{
		echo "Registerd Succesfully";
		echo "<a href=1.php>Home Page</a>";
	}		
}
		
		
		
		
		


?>
<footer>

<br>

<p>Copyright&#169 2015. The Pizza Review, All rights reserved.</p>


<h5><p><a href="1.php">back to Home</a></p></h5>
</footer>

</body>
</html>
