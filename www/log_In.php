<?php
include 'usersDB.php';


date_default_timezone_set('UTC');
$username = $_POST['login'] ?? null;
$password = $_POST['password'] ?? null;
$submit_type =  $_POST['submit'] ?? null;


$current_date = date('l jS \of F Y h:i:s A');
$current_date_array = getdate();

if (null !== $username || null !== $password) {

    if ($submit_type=='CREATE'){
        if (existsUser($username)){
           // echo 'user exist';
            setcookie('user_exist','true');
            header("Location: create_accaunt.php");
            exit;
        
        }
        else {
           // echo 'user not exist';
            addUser($username, $password);           
            session_start(); 
            $_SESSION['auth'] = true; 
            $_SESSION['login'] = $username;
            $_SESSION['logtime'] = $current_date;
            $_SESSION['logsec'] = $current_date_array;
            header("Location: cabinet.php");
            exit;
        }
    }
    elseif ($submit_type=='LOGIN'){       
        if (checkPassword($username, md5($password))) {  
            session_start(); 
            setcookie('password','true'); 
            if (isset ($_SESSION['auth'])){               
                header("Location: auth.php");
                exit;
            } 
            else {
                $_SESSION['auth'] = true; 
                $_SESSION['login'] = $username;
                $_SESSION['logtime'] = $current_date; 
                $_SESSION['logsec'] = $current_date_array;

                $_SESSION['username'] = getUsersName($username);
                $_SESSION['birthday'] = getUserBirthData($username);   


                header("Location: cabinet.php");
                exit;
            }       
            
        } 
        else {
           // echo 'user login or password is not correct';
            setcookie('password','false');
            header("Location: auth.php");
            exit;
        }     
    }
    else {
        //echo 'submit type missmatch';
        setcookie('password','false');
        setcookie('user_exist','false');
        header("Location: auth.php");
        exit;
    }
}
  
?>
