<?php
    include("header.php");
    $email=$_SESSION['login'];
    $id= mysqli_query($bdOpen,"SELECT id FROM usuario WHERE email='$email'");
    $id = mysqli_fetch_array($id);
    $id=($id['id']);
    mysqli_query($bdOpen,"DELETE FROM `usuario` WHERE `usuario`.`id` = $id");

    echo("<script>alert('Perfil excluido com sucesso');
        location.replace('../index.php')
        </script>");
?>
