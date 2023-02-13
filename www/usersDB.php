<?php
///login+password
function addUser(string $login, string $password){
    $file = 'password.txt';
     if  (file_exists($file)===false || file_exists($file)===null){
        createUser($file);    
   }
    $content = file_get_contents($file);    
    $current_string = $content.'###'.$login.'###'.md5($password);    
    file_put_contents($file,$current_string);
}

function createUser(string $file_name){
    $ADMIN = 'admin';
    $ADMIN_PASSWORD = md5('password');
    $current_string = $ADMIN.'###'.$ADMIN_PASSWORD;    
    file_put_contents($file_name,$current_string);
}

function getUsersList(){     
   $file = 'password.txt';  
   $user_array = [[]];     
    if  (file_exists($file)===false || file_exists($file)===null){
        createUser($file);    
   }
   $content_array = explode('###',file_get_contents($file));   
   for ($i=0; $i < count($content_array); $i++) { 
        if ($i%2==0){
             $user_array [$i] ['login']= $content_array [$i];
        }
         else {
            $user_array [$i-1] ['password']= $content_array [$i];
        }              
   } 
   return $user_array;
}

function existsUser(string $login){    
    $ussers_array = getUsersList();
    $check_user = false;
    for ($i=0; $i < count($ussers_array); $i++) {       
        if ($ussers_array [$i*2] ['login']=== $login){
            $check_user = true;   
           break;         
        }
         else {
            $check_user = false;            
        }       
   }
    return $check_user;
}

function checkPassword($login, $password){
    $ussers_array = getUsersList();   
    $check_password = false;
    for ($i=0; $i < count($ussers_array); $i++) {       
        if ($ussers_array [$i*2] ['login']=== $login && $ussers_array [$i*2] ['password']=== $password){
            $check_password = true;   
           break;         
        }
         else {
            $check_password = false;            
        }       
   }
    return $check_password;
}



///username + date of birth 
function createUserData(string $file_name){
    $birthday = 'no info 1';
    $username = 'no info 2';
    $login_name = 'admin';
    $current_string = $username.'###'.$birthday.'###'.$login_name;    
    file_put_contents($file_name,$current_string);
}

function addUsersData(string $username, string $birthday,string $login_name){
    $file = 'users.txt';
     if  (file_exists($file)===false || file_exists($file)===null){
        createUserData($file);    
   }   

    $content = file_get_contents($file);    
    $current_string = $content.'###'.$username.'###'.$birthday.'###'.$login_name;    
    file_put_contents($file,$current_string);
}

function getUsersLists(string $login_name){     
   $file = 'users.txt';  
   $user_array = [[]];     
    if  (file_exists($file)===false || file_exists($file)===null){
        createUserData($file);    
   }
   $content_array = explode('###',file_get_contents($file));   
   for ($i=0; $i < count($content_array); $i=$i+3) { 
            $user_array [$i] ['name']= $content_array [$i];     
            $user_array [$i] ['birthday']= $content_array [$i+1];
            $user_array [$i] ['login']= $content_array [$i+2];
                   
   } 
   return $user_array;
}


function getUsersName(string $login_name){
    $ussers_array = getUsersLists($login_name);  
 
    for ($i=0; $i < count($ussers_array); $i++) {       
        if ($ussers_array [$i*3] ['login']=== $login_name){
            return $ussers_array [$i*3] ['name'];               
        }             
   }
    return 'no info';
}

function getUserBirthData(string $login_name){
    $ussers_array = getUsersLists($login_name);  
 
    for ($i=0; $i < count($ussers_array); $i++) {       
        if ($ussers_array [$i*3] ['login']=== $login_name){
            return $ussers_array [$i*3] ['birthday'];               
        }             
   }
    return 'no info';
}

function updateUserData(string $username, string $birthday,string $login_name){
    $ussers_array = getUsersLists($login_name); 
    $content_str=null;  
    $file = 'users.txt';
  //  file_put_contents($file,'');
    for ($i=0; $i < count($ussers_array); $i++) {      
        if ($ussers_array [$i*3] ['login']=== $login_name){
            $ussers_array [$i*3] ['birthday'] = $birthday;
            $ussers_array [$i*3] ['name'] = $username;               
        } 
       // addUsersData($ussers_array [$i*3] ['name'], $ussers_array [$i*3] ['birthday'],$ussers_array [$i*3] ['login']);
       if ($i==0){
            $content_str = $ussers_array [$i*3] ['name'].'###'.$ussers_array [$i*3] ['birthday'].'###'.$ussers_array [$i*3] ['login'];  
       } else{
            $content_str = $content_str.'###'.$ussers_array [$i*3] ['name'].'###'.$ussers_array [$i*3] ['birthday'].'###'.$ussers_array [$i*3] ['login'];  
       }
    }  
   file_put_contents($file,$content_str);
}


///////////////////
?>