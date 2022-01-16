<?php
    include('header.php');
    include('conexao.php');
    if(!isset($_SESSION)) 
  { 
      session_start(); 
  }
  
  echo "</br> <div>";
  print_r($_SESSION);
  echo "</div>" ;

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
}

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