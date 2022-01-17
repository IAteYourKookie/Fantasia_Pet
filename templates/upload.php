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
    $msg = false;

    $arquivo = strtolower(substr($_FILES['arquivo']['name'], -4));
    $newarquivo = md5(time()) . $arquivo;
    $dir = "uploads/";

    move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir . $newarquivo);


    $sql = "INSERT INTO arquivo(id, arquivo, data) VALUES(null, '$newarquivo', NOW());";
    if (mysqli_query($dbOpen, $sql)) {
        $msg = "Arquivo enviado com sucesso!!";
    } else {
        $msg = "Falha ao enviar arquivo.";
    }

    //erro
    if ($msg != false) {
        echo "<p>$msg</p>";
    }
}else{
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

  /*if (isset($_FILES['imagem'])){
    $imagem=($_FILES['imagem']);
    
    if($imagem != "none"){
        $emaillogin = $_SESSION['login'];
        $imagem = filter_var($_FILES['imagem']['tmp_name'],FILTER_SANITIZE_URL);
        $tipo=$_FILES['imagem']['type'];
        $tamanho=$_FILES['imagem']['size'];
        
        $fp = fopen($imagem, "rb");
        $conteudo = fread($fp, $tamanho);
        $conteudo = addslashes($conteudo);
        fclose($fp);

        $sql= mysqli_query($bdOpen,"SELECT id FROM usuario WHERE email='$emaillogin'");
        $row= mysqli_fetch_array($sql);
        $id_usuario=$row['id'];

        $pfp_existe = mysqli_query($bdOpen, "SELECT id_usuario FROM imagem WHERE id_usuario='$id_usuario'");
        if (mysqli_num_rows($pfp_existe) > 0) {
          mysqli_query($bdOpen,"UPDATE `imagem` SET `nome_imagem`='$imagem',`size`='$tamanho', `type`='$tipo' WHERE id_usuario=$id_usuario");
        }else{
          mysqli_query($bdOpen,"INSERT INTO `imagem`(`nome_imagem`, `id_usuario`, `size`, `type`) VALUES('$imagem','$id_usuario','$tamanho','$tipo')");
        }

        mysqli_close($bdOpen);

        //echo "<script>
        //        location.replace('../perfil.php');
        //        </script>";
    }
  }*/
?>