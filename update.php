<html>
<head>
<style>
body{
background-image:url("theme.jpg");
background-repeat: repeat-y;	
 background-size: 1200px ; 
 
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



<?php


session_start();
if(isset($_SESSION['username'])){

}
else{
	header("Location:login.php");
}

$customer_id=$_SESSION['customer_id'];

//echo $customer_id;  
if (isset($_POST['review_id']))
{

     $review_id=$_POST['review_id'];
      //echo $review_id;
}
if (isset($_POST['vendor_id']))
{

     $vendor_id=$_POST['vendor_id'];
      //echo $vendor_id;
}
$hn='localhost';
$db='group6_project';
$un='root';
$pw='';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

echo <<<_END
<form method="post" action="update.php">
                        
            <fieldset id="User Details" style="background-color:#ffff80;border: 3px solid red;padding-top: -40px;
    padding-left:0px;width:400">
                <legend><h2 style=";font-size:30px;color:red">User Details</h2></legend>
               
               
    <span style=";font-size:15px;color:red"> Date:</span><input type="text"  name="cd" > <br>
             
    <span style=";font-size:15px;color:red">Review:</span><input type="text" name="rev" cols="35" rows="5" > <br>
  <span style=";font-size:15px;color:red">Rating:</span><input type="text"  name="rating"><br> 
 
 <input type="hidden" name="review_id" value="$review_id">
           <input type="submit" name="update" value="update">

        </form>
		</fieldset>

_END;
//echo $review_id;
if(isset($_POST['update']) && isset($_POST['cd'])&& isset($_POST['rev'])&& isset($_POST['rating'])) 
{
	
	
	
	
	$cd=$_POST['cd'];
	$rev=$_POST['rev'];
	$rat=$_POST['rating'];
	$query="update review set comment='$rev',review_date ='$cd',rating='$rat' where review_id='$review_id' ;";
	$result=$conn->query($query);
	
	if(!$result) echo "update failed: $query <br>" .$conn->error . "<br><br>";
	
	echo <<<_END
	<pre>update review  was successful</pre>
	</br></br>
	<a href="2.php">View all Pizzeria</a>
_END;
}


$conn->close();

?>
<footer>

<br>

<p>Copyright&#169 2015. The Pizza Review, All rights reserved.</p>


<h5><p><a href="1.php">back to Home</a></p></h5>
<h5></p><a href="2.php">back to Pizzeria</a></p></h5>
</footer>

</body>
</html>