<?php 
if (session_status() == 1) {
     session_start();
     session_unset();
     session_destroy();
     header("Location: /Ttov");
} else {
     echo 'false';
}


?>