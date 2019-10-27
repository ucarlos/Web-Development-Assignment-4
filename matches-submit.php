<?php
    session_start();
?>
<!doctype html>
<html>
    <head>
	<title>Nerdluv Matches</title>
	<link href="./css/nerdieluv.css" rel="stylesheet" type="text/css">
    </head>

        <!-- Place logo here mate. !-->
        <img src="./images/logo.png">
        <br>

    <body>
	<?php
        include 'match_functions.php';

        $file = fopen("./singles.txt", 'r');
        if (!$file){
            echo "Cannot open file. Aborting.";
            exit(1);
        } 
        // Now make sure if name inputted is the same as the session, if not, rewrite the session:
        
        $test_name = $_GET['name'];

        
            // Now search the list for the person -- find index
        
        if (!($test_name == $_SESSION['name'])){    
            $user = array();
            $test = search_file($file, $test_name, $user);
        if (!$test){
            echo $test_name . " is not a registered user. Please sign up ";
            echo "<a href='./signup.php'>here.</a>\n";
            exit(-1);
        }
        else{    
           // Erase the session:
            //session_unset();
           
            $_SESSION["name"] = $test_name;
            $_SESSION["gender"] = $user[1];
            $_SESSION["age"] = $user[2];
            $_SESSION["personality"] = $user[3];
            $_SESSION["os"] = $user[4];
            $_SESSION["min_age"] = $user[5];
            $_SESSION["max_age"] = $user[6];
            

            
        }
    }

        echo "<strong>Results for " . $_SESSION['name'] . " (Age {$_SESSION['age']})" . ":</strong><br>";
        echo "<b>You may have to refresh the page in order to see matches.</b><br><br>";      
        //print_r($_SESSION);
        filter_file($file, $_SESSION['name'], $_SESSION['gender'], $_SESSION['personality'], $_SESSION['os'], $_SESSION['min_age'], $_SESSION["max_age"]);

        
	?>
	    
    
    
    <?php
	include 'common.php';
	echo "<br><br>";
	copyright();
    ?>

    <img src="./images/back.png" style="vertical-align:middle" width="50" height="50">
    <a href="./index.php">Back to main page</a>
    </body>

    
</html>
