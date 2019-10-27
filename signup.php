<!doctype html>
<html>
    <head>
	<title> Sign up to NerdLuv</title>
	<link href="./css/nerdieluv.css" rel="stylesheet" type="text/css">
    </head>

    <!-- Place logo here mate. !-->
    <img src="./images/logo.png">
    <br>
    


    <!--Sign up form here: !-->
    <form method="get" action="./signup-submit.php" autocomplete="on">
	<fieldset>
	    <legend>New User Signup </legend>
	    Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="name"> <br><br>
	    Gender:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span>
		<input type="radio" name="gender" value="M"> Male 
		<input type="radio" name="gender" value="F"> Female<br> 
	    </span>
	    <br>
	    Age:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="age" maxlength="3" size="3"> <br><br>
	    Personality Type: <input name="personality" maxlength="6" size="6"> <br><br>
	    Favorite OS:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	    <select name="os">
		<option value="Windows">Windows</option>
		<option value="macOS">macOS</option>
		<option value="Linux">Linux</option>
	    </select>
	    <br><br>
	    Seeking:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="seek_min" placeholder="Min" maxlength="3" size="3"> to
	    <input name="seek_max" placeholder="Max" maxlength="3" size="3"><br><br>

	    <button type="submit">Sign up!</button>
	</fieldset>


    </form>
   
	
	<?php
	include 'common.php';
	echo "<br><br>";
	copyright();
	?>

	<img src="./images/back.png" style="vertical-align:middle" width="50" height="50">
	<a href="./index.php">Back to main page</a>
	
</html>
