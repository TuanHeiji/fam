<?php
 session_start();

if(isset($_SESSION['mySession']) && isset($_SESSION['mySession_name']) ){
        unset($_SESSION['mySession']);
        unset($_SESSION['mySession_name']);
    }
elseif(isset($_SESSION['mySessionAdmin']) && isset($_SESSION['mySession_nameAdmin'])){
        unset($_SESSION['mySessionAdmin']);
        unset($_SESSION['mySession_nameAdmin']);
    }

    
    header("location:login.php");
    
?>