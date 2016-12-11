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
	$username=$_SESSION['username']; 
	destroy_session_and_data();
echo <<<_END
	<p style="background-color:yellow">Logout is successful $username</p>
_END;
	
	

	
}

function destroy_session_and_data(){
	$_SESSION = array();
	session_destroy();
}


?>
<footer>

<br>

<p>Copyright&#169 2015. The Pizza Review, All rights reserved.</p>


<h5><p><a href="1.php">back to Home</a></p></h5>
</footer>
</body>
</html>