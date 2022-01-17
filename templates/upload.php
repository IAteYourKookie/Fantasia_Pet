<?php
    include('header.php');
    include('conexao.php');
    if(!isset($_SESSION)) 
  { 
      session_start(); 
  }
  $emaillogin = $_SESSION['login'];
  $sql = mysqli_query($bdOpen,"SELECT id FROM usuario WHERE email='$emaillogin'");
  $id= mysqli_fetch_array($sql);
  $id=$id['id'];

  if (isset($_FILES['arquivo'])) {
    print_r($_FILES['arquivo']);
    $tipo=$_FILES['arquivo']['type'];
    $tamanho=$_FILES['arquivo']['size'];
    $name=$_FILES['arquivo']['name'];
    $msg = false;

    $arquivo = strtolower(substr($name, -4));
    $newarquivo = md5(time()) . $arquivo;
    $dir = "uploads/";

    move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir . $newarquivo);
    $sql= mysqli_query($bdOpen,"SELECT id FROM usuario WHERE email='$emaillogin'");
    $row= mysqli_fetch_array($sql);
    $id_usuario=$row['id'];

    $pfp_existe = mysqli_query($bdOpen, "SELECT id_usuario FROM imagem WHERE id_usuario='$id_usuario'");
    if (mysqli_num_rows($pfp_existe) > 0) {
      mysqli_query($bdOpen,"UPDATE `imagem` SET `dir_imagem`='$newarquivo',`size`='$tamanho', `type`='$tipo' WHERE id_usuario=$id_usuario");
    }else{
      mysqli_query($bdOpen,"INSERT INTO `imagem`(`dir_imagem`, `id_usuario`, `size`, `type`) VALUES('$newarquivo','$id_usuario','$tamanho','$tipo')");
    }

    //erro
    if ($msg != false) {
        echo "<p>$msg</p>";
    }
    if(isset($_REQUEST['email'])){
      $email=$_REQUEST['email'];
      $email=filter_var($email,FILTER_SANITIZE_EMAIL);
      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        mysqli_query($bdOpen,"UPDATE usuario SET `email` = '$email' WHERE `usuario`.`id` = $id;");
  
        $phone=($_REQUEST['tel']);
        $phone=filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
        mysqli_query($bdOpen,"UPDATE usuario SET `phone` = '$phone' WHERE `usuario`.`id` = $id;");
  
        $name=($_REQUEST['name']);
        mysqli_query($bdOpen,"UPDATE usuario SET `name` = '$name' WHERE `usuario`.`id` = $id;");
        echo("<script>alert('Perfil atualizado com sucesso');
        location.replace('../perfil.php')
        </script>");
        
      }else {
        echo("<script>
        location.replace('../edicao_perfil.php')
        alert('$email não é um email valido.');</script>");
      }
    }
}
mysqli_close($bdOpen);
?>