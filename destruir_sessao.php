 <?php
        // put your code here
        if(!isset($_SESSION)){
    session_start();
    
    session_destroy();
    
    header('Location:login.php');
}