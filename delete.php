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

session_start();
if(isset($_SESSION['username'])){

}
else{
	header("Location:login.php");
}


$hn='localhost';
$db='group6_project';
$un='root';
$pw='';


$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if(isset($_POST['delete']) && isset($_POST['review_id'])) {
	$review_id=get_post($conn, 'review_id');
	$query="DELETE FROM review WHERE review_id='$review_id'";
	$result=$conn->query($query);
	if(!$result) echo "DELETE failed: $query <br>" .
	$conn->error . "<br><br>";
	
	echo <<<_END
	<pre>Delete movie with Review: $review_id was successful</pre>
	</br></br>
	<a href="2.php">View all Pizzeria</a>
_END;
}

//$result->close();
$conn->close();

function get_post($conn, $var) {
	return $conn->real_escape_string($_POST[$var]);
}


?>
<footer>

<br>

<p>Copyright&#169 2015. The Pizza Review, All rights reserved.</p>


<h5><p><a href="1.php">back to Home</a></p></h5>
<h5><p><a href="2.php">back to Pizzeria</a></p></h5>
</footer>

</body>
</html>