<?php
    
    function is_compatiable_gender($gender1, $gender2){
        return (strcmp($gender1, $gender2) == 0) ? false : true;
    }

    function search_file($file, $name, &$array){
        $found = false;
        while (!feof($file)){
            $temp_string = fgets($file);
            $temp_array = array_pad(explode(',', $temp_string, 7), 7, null);
            
            
            list($temp_name, $temp_gender, $temp_age, $temp_personality, $temp_os, $temp_min_age, $temp_max_age) = $temp_array;

            if (strcasecmp($name, $temp_name) != 0){
                continue;
            }
            else{
                $array = array($temp_name, $temp_gender, $temp_age, $temp_personality, $temp_os, $temp_min_age, $temp_max_age);
                $found = true;
                break;
            }
        }
        
        return $found;
    }


    function is_in_age_range($person_age, $min_age, $max_age){
        return ($min_age <= $person_age && $person_age <= $max_age) ? true : false;
    }

    function has_compatiable_personality($person1, $person2){
        // At least one letter in common:
        // So for example, istp and esfp -- s, and p are the same.
        $count = 0;

        for ($i = 0; $i < strlen($person1); $i++){
            if ($person1[$i] == $person2[$i]){
                $count = $count + 1;
            }
        }

        return ($count >= 2) ? true : false;
    }

    function has_compatiable_os($os1, $os2){
        return (strcmp($os1, $os2) == 0) ? true : false;
    }

    function print_list(&$list, $list_length){
        
        if ($list_length == 0){
            echo "<p> No results found.</p>";
            return;
        }
        else{
            echo "$list_length result(s) found.<br>";
        }

        for ($i = 0; $i < $list_length; $i++){

        
            echo "<div class='match'>";
            echo "<p>" . $list[$i][0];
            if (strcmp($list[$i][1], "M") == 0){
                echo "<img src='./images/man.png'>";
            }
            else{
                echo "<img src='./images/woman.png'>";
            }
            echo "<ul>";
            echo "<li>Gender: " . $list[$i][1] . "</li>";
            echo "<li>Age: " . $list[$i][2] . "</li>";
            echo "<li>Personality: " . $list[$i][3] . "</li>";
            echo "<li>Operating System: " . $list[$i][4] . "</li>";
            echo "</p>";
            echo "</div>";
        }
        
        

       
   }

    function filter_file($file, $name, $gender, $personality, $os, $min_age, $max_age){
        // First, get each line and store in an array.
        // Then split using ',' for each segement.
        // So string_ar = ["name", "gender", "age", "os", "personality"]
        // Then check 


        
        // Make sure list_length is 0:
        $list_length = 0;
        $list = array();

        while (!feof($file)){
            $temp_string = fgets($file);
            $temp_array = array_pad(explode(',', $temp_string, 7), 7, null);
            
            
            list($temp_name, $temp_gender, $temp_age, $temp_personality, $temp_os, $temp_min_age, $temp_max_age) = $temp_array;
        
            if (!is_compatiable_gender($gender, $temp_gender)){
                continue;
            }

            if (!is_in_age_range($temp_age, $min_age, $max_age)){
                continue;
            }
            if (!has_compatiable_personality($personality, $temp_personality)){
                continue;
            }
        
            if (!has_compatiable_os($os, $temp_os)){
                continue;
            }
            

            // Everything seems alright, now add to list.
            $list[] = array($temp_name, $temp_gender, $temp_age, $personality, $temp_os);
            
            $list_length = $list_length + 1;
                
        }
        
        print_list($list, $list_length);
    }


?>