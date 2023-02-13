<?php
function existsUser(string $login){    
    if (null !== $login){
        $usser_arrey = getUsersList();       
           print_r($usser_arrey);        
    }
    else {    
        echo 'login can not be null, pls check login field!';
    }
}

?>