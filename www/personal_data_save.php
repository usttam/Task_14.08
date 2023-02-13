<?php
include 'usersDB.php';
session_start();
$username = $_POST['username'] ?? null;
$birthday = $_POST['birthday'] ?? null;

if (isset($_SESSION['login'])){
    if (null !== $username || null !== $birthday){
        if (getUsersName($_SESSION['login'])==='no info'){     
            
            addUsersData($username,$birthday,$_SESSION['login']);
            $_SESSION['username'] = getUsersName($_SESSION['login']);
            $_SESSION['birthday'] = getUserBirthData($_SESSION['login']); 
            header("Location: cabinet.php");
            exit;
          //  print_r(getUsersLists($_SESSION['login']));

        } 
        else {
            updateUserData($username, $birthday,$_SESSION['login']);
            $_SESSION['username'] = getUsersName($_SESSION['login']);
            $_SESSION['birthday'] = getUserBirthData($_SESSION['login']);
            header("Location: cabinet.php");
            exit; 
            //print_r(getUsersLists($_SESSION['login']));
        }              
  
     
    }
    else {
        //echo 'data is missing';
        header("Location: cabinet.php");
        exit;
       
    }
    
} else {
    //echo 'session expired';
    header("Location: /../index.php");
    exit;
}
?>