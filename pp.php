<html>
<head>
<style>
body{
background-image:url("theme.jpg");
background-repeat: repeat-y;	
 background-size: 1200px ; 
 
}

input[type=text] {
    padding:5px; 
    border:2px solid #ccc; 
    -webkit-border-radius: 5px;
    border-radius: 5px;
}

input[type=text]:focus {
    border-color:#333;
}

input[type=submit] {
    padding:10px 15px; 
    background:#ffff80; 
    border:0 none;
    cursor:pointer;
    -webkit-border-radius: 5px;
    border-radius: 5px;
margin-left:30px;
border: 3px solid red

}
footer p{
	background:yellow;
	font-family:Garamond;
	color:#6633FF;
	font-size:20px;
}
h1{
	font-size:60px;
	font-family:Cursive;
	 animation: mymove 2s infinite;
}
h2
{
	font-size:25px;
	font-family:Cursive;
}

em{
  font-size:15px;
	font-family:Cursive;
	}
@-webkit-keyframes mymove {
    from {background-color: red;}
    to {background-color: yellow;}
 a{
	 align:right;
	 padding-left:40px;
 }
 fieldset {
  border: 1px solid red;
    
    padding-top: 20px;
    padding-right: 30px;
    padding-bottom: 50px;
    padding-left: 80px;
	}
	.stick {
    position:fixed;
    top:0px;
}
 

</style>

</head>




<body>
<h1 style="text-align:center"><img src="http://images.clipartpanda.com/pizza-box-clip-art-as5580.gif"width="50px" height="50px" /><em style="font-size:35px">THE<span style="padding-left:10px;padding-right:10px">PIZZA</span>REVIEW<em><img src="http://images.clipartpanda.com/pizza-box-clip-art-as5386.gif"width="50px" height="50px"/></h1>
<img src="pp.jpg" height="100px" width="200px" style="margin-left:400px;padding-bottom:15px" /><br>
<iframe width="450" height="300" src="https://www.youtube.com/embed/ZXKEJawMDBE" frameborder="0"  style="margin-left:40px;margin-right:20px;border: 2px solid red"allowfullscreen></iframe>
<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d773081.3672050536!2d-112.40705272669345!3d40.80930987498837!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sThe+Pie+Pizzeria+!5e0!3m2!1sen!2sus!4v1449630276213" width="450" height="300" frameborder="0" style="border: 2px solid yellow" allowfullscreen></iframe> 
<p>
<a href="http://www.thepie.com/"><h2 style="text-align:center;margin-left:30px;background-color:white;color:blue"> The Pie Pizzeria WEBSITE</h1></a>

</p>
<?php
$conn = mysqli_connect("localhost","root","") or die("could not connect to server");
$select_db=mysqli_select_db($conn,'group6_project') or die("could not connect to server");
$query="SELECT offer ,vendor_id from offers where vendor_id='5' ;";
$result=$conn->query($query);
if(!$result) die ($conn->error);

$rows=$result->num_rows;
for($j=0; $j<$rows; $j++) {
	$result->data_seek($j);
	$row=$result->fetch_array(MYSQLI_NUM);
	echo <<<_END
	<div id="sticker">
	<pre><fieldset style="background-color:#ffff80;border: 3px solid red;padding-top: -40px;
    padding-left:0px;width:400">
		<legend><h2 style="text-align:center;margin-left:30px;color:red"><img src="c.jpg"width="50px" height="50px" />SMOKING HOT DEALS<img src="c.jpg"width="50px" height="50px" /></h1></legend>
		<em style="margin-left:-100;padding-top:-20px">$row[0]</em>
		
		</fieldset>
		</div>
_END;
}
?>
<script>
$(document).ready(function() {
    var s = $("#sticker");
    var pos = s.position();                    
    $(window).scroll(function() {
        var windowpos = $(window).scrollTop();
        s.html("Distance from top:" + pos.top + "<br />Scroll position: " + windowpos);
        if (windowpos >= pos.top) {
            s.addClass("stick");
        } else {
            s.removeClass("stick"); 
        }
    });
});

</script>

<?php

$conn = mysqli_connect("localhost","root","") or die("could not connect to server");
$select_db=mysqli_select_db($conn,'group6_project') or die("could not connect to server");



$query="SELECT customer.customer_name,review.review_date,review.comment,review.rating,review.vendor_id,review.review_id from customer join review
on customer.customer_id=review.customer_id where review.vendor_id='5' ;";
$result=$conn->query($query);
if(!$result) die ($conn->error);

$rows=$result->num_rows;
for($j=0; $j<$rows; $j++) {
	$result->data_seek($j);
	$row=$result->fetch_array(MYSQLI_NUM);
	
	echo <<<_END
	<pre><fieldset style="background-color:#ffff80;border: 3px solid red;padding-top: -40px;
    padding-left: 0px;width:400">
		<legend><h2>$row[0]</h2></legend>
		<em style="margin-left:-100;padding-top:-20px">Comment: $row[2]</em>
		<em style="margin-left:-100">Date: $row[1]</em>
		<em style="margin-left:-100">Rating:$row[3]</em>
		</fieldset>
	</pre>
	
	<form action="delete.php" method="post" >
	<input type="hidden" name="delete" value="yes" >
	<input type="hidden" name="review_id" value="$row[5]">
	<input type="submit" value="Delete"  style="margin-left:450px;margin-top:-200px">
    </form>
	<form action="addreview.php" method="post">
	<input type="hidden" name="add" value="yes">
	<input type="hidden" name="vendor_id" value="$row[4]">
	<input type="submit" value="Add review" style="margin-left:450px;margin-top:-170px">
	</form>
	<form action="update.php" method="post">
	<input type="hidden" name="update" value="yes">
	<input type="hidden" name="vendor_id" value="5">
	<input type="hidden" name="review_id" value="$row[5]">
	<input type="submit" value="Update" style="margin-left:450px;margin-top:-140px">
    </form>

	
_END;

	
}	






//$result->close();
//$conn->close();





?>

<footer>

<br>

<p>Copyright&#169 2015. The Pizza Review, All rights reserved.</p>


<h5><p><a href="1.php">back to Home</a></p></h5>
<h5><p><a href="2.php">back to Pizzeria</a></p></h5>
</footer>





</body>
</html>