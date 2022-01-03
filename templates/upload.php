<?php
    include('conexao.php');
    if(!isset($_SESSION)) 
  { 
      session_start(); 
  }
  echo "kkkkkkkkkkkk";
  echo $_SESSION['login'];

  if (isset($_REQUEST['imagem'])){
    $imagem=($_POST['imagem']);
    
    if($imagem != "none"){
        $emaillogin = $_SESSION['login'];
        $imagem=$_FILES['imagem']['tmp_name'];
        $tipo=$_FILES['imagem']['type'];
        $tamanho=$_FILES['imagem']['size'];
        
        $fp = fopen($imagem, "rb");
        $conteudo = fread($fp, $tamanho);
        $conteudo = addslashes($conteudo);
        fclose($fp);

        echo $imagem;
        echo "<br>";
        echo $tamanho;
        echo "<br>";
        echo $tipo;
        echo "<br>";
        echo $emaillogin;

        $sql= mysqli_query($bdOpen,"SELECT id FROM usuario WHERE email='$emaillogin'");
        $row= mysqli_fetch_array($sql);
        $id_usuario=$row['id'];
        echo $id_usuario;

        mysqli_query($bdOpen,"INSERT INTO `imagem`(`nome_imagem`, `id_usuario`, `size`, `type`) VALUES('$imagem','$id_usuario','$tamanho','$tipo')");

        mysqli_close($bdOpen);
        //echo "<script>
        //        location.replace('../perfil.php');
        //        </script>";
    }
  }
?>