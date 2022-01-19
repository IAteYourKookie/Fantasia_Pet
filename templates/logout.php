
<?php
include_once("header.php");
print_r($_SESSION);
if(!empty($_SESSION['login'])){
    $_SESSION['login']= 0;
    $_SESSION['id']=0;
    $_SESSION['name']=0;
    print_r($_SESSION);
    echo "<script>location.replace('../index.php');</script>";
    
}else{
    session_start(); 
}
?>