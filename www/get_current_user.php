<?php
function getCurrentUser(){
   session_start();  
   if (isset($_SESSION['login'])){    
        if ($_SESSION['login']!==null){
            return $_SESSION['login'];
        } 
        else{
            return 'Guest';
        }  
    }    
    else {
    return 'Guest';
    }  
  
}

function getCurrentLogTime(){
   session_start();  
   if (isset($_SESSION['logtime'])){    
        if ($_SESSION['logtime']!==null){
            return $_SESSION['logtime'];
        } 
        else {
            return null;
        }  
    }    
   else {
    return null;
    }  
  
}

function getTimeLeft(array $array_current_date){
    session_start();   
    $hours_left=0;
    $minets_left=0;
    $seconds_left=0;
    $session_array = $_SESSION['logsec'];
    if (isset($_SESSION['logsec'])){    
        if ($_SESSION['logsec']!==null){
            $hours_left= 23 - intval($array_current_date['hours']);
            $minets_left=59 - intval($array_current_date['minutes']);
            $seconds_left= 59 - intval($array_current_date['seconds']);
            if ($session_array['yday']===$array_current_date['yday'] && $session_array['year']===$array_current_date['year']){
                return $hours_left.':'. $minets_left.':'.$seconds_left;
            } else{
                return 'TIME IS OUT';
            }   
        
        } 
        else{
         return 'TIME IS OUT';
        }  
    }     
    else{
     return 'TIME IS OUT';
    }  
   
 }


?>