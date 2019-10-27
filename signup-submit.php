<?php
    session_start();
?>

<!doctype html>
<html>
    <head>
	<title>Signup Confirmation</title>
	<link href="./css/nerdieluv.css" rel="stylesheet" type="text/css">
    </head>
    <body>

    <?php
        include 'submit_functions.php';

        $name = $_GET['name'];
        $gender = strtoupper($_GET['gender']);
        $age = $_GET['age'];
        $personality = strtoupper($_GET['personality']);
        $os = $_GET['os'];
        $seek_min = $_GET['seek_min'];
        $seek_max = $_GET["seek_max"];
        
        $error = array();

        $is_valid = true;
        // Now test:
        
        if (!(is_valid_age($age))){
            $error[] = "$age is an invalid age.";
            $is_valid = false;
        }

        if (!(is_valid_personality($personality))){
            $error[] = "$personality is an invalid personality type.";
            $is_valid = false;
        }

        if (!(is_valid_age($seek_min))){
            $error[] = "Age $seek_min is lower than the minimum age (18)";
            $is_valid = false;
        }

        if (!(is_valid_age($seek_max))){
            $error[] = "Age $seek_max is higher than the maximum age (60)";
            $is_valid = false;
        }


        if (!$is_valid){
            // List the invalid items, and allow a return.
            echo "<img src='./images/error.png' width='200px' height='200px' /><br><br>";
            echo "<p>Some issues came up while you were trying to sign up. These include:<br>";
            for ($i = 0; $i < count($error); $i++){
                echo "Error: $error[$i]<br>";
            }
            echo "<input type='button' class='button' value='Return to Signup page' onClick='history.back()'><br>";
            echo "</p><br>";
        }
        else{
            $handle = fopen("singles.txt", "a");
            if (!$handle){
                echo "An error occurred while trying to sign up. Please try again.<br>";
                echo "<input type='button' class='button' value='Return to Signup page' onClick='history.back()'><br>";   
            }
            else{
                fseek($handle, SEEK_END);
                fwrite($handle, "$name,$gender,$age,$personality,$os,$seek_min,$seek_max\n");
                $_SESSION["name"] = $name;
                $_SESSION["gender"] = $gender;
                $_SESSION["age"] = $age;
                $_SESSION["personality"] = $personality;
                $_SESSION["os"] = $os;
                $_SESSION["min_age"] = $seek_min;
                $_SESSION["max_age"] = $seek_max;



                echo "<p>\n";
                echo "<b>Thank you!</b><br>";
                echo "Welcome to Nerdluv, $name!<br>\n";
                echo "Max age: " . $_SESSION["max_age"];
                echo "<a href='./matches.php'>Now log in to see your matches!</a>";
                echo "</p>\n";
            }

            fclose($handle);

            
            
        }
        
    ?>
	
    </body>
    
</html>
    
