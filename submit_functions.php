<?php

//Use for user_age, age_min, and age_max.
function is_valid_age($age){
    $min_age = 18;
    $max_age = 60;

    if ($age < $min_age){
        return false;
    }

    if ($age <= $max_age){
        return true;
    }
    else 
        return false;
 

}


function is_valid_personality($personality){
    $valid_type = array("INTJ", "INTP", "ENTJ", "ENTP", "INFP", "INFJ", "ENFP", "ENFJ",
                        "ISTJ", "ISFJ", "ESTJ", "ESFJ", "ISTP", "ISFP", "ESTP", "ESFP");

    $personality = trim(strtoupper($personality));

    // Now check if value exists in array:
    return in_array($personality, $valid_type);


}

















                      ?>
