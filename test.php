<?php
$file = fopen("Test.txt", 'r+');
echo "IS OPEN? : $file";
if (!$file){
    echo "Nope.\n";
}

?>
