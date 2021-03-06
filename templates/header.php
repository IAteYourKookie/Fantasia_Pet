<!DOCTYPE html>
<html lang="en">
<head>
<!----------------------- PHP ----------------------->
  <?php
    include_once("login.php");
    if(!empty($_SESSION['login'])){
      $user=$_SESSION['login'];
      $name= mysqli_query($bdOpen,"SELECT name FROM usuario WHERE email='$user'");
      $name = mysqli_fetch_array($name);
    }
    
    ?>

  <!--------------------- HEAD ---------------------->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="templates/style.css">
    <link rel="icon" href="imagens/paw.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.pkgd.js"></script>
    <title>Fantasia Pet</title>
  <!----------------------- Script ----------------------->
    <script>
      // FORM LOGIN
      function openForm() {
        document.getElementById("myForm").style.display = "block";
      }

      function closeForm() {
        document.getElementById("myForm").style.display = "none";
      }
      
      // VOLTAR AO TOPO
      function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
    </script>
    <script>
      function gotoProfile(){
        location.replace('perfil.php');
      }

      function bemvindo(){
        var login = "<?php print_r($name['name']) ?>";
        document.getElementById('ini').innerHTML='Olá, '+login;
        document.getElementById('fontcadastro').innerHTML='';
        document.getElementById('loginbtn').setAttribute('onclick','gotoProfile()');
      }
      function deslogado(){
        document.getElementById('ini').innerHTML='Olá, Entre aqui';
        document.getElementById('fontcadastro').innerHTML=' ou faça seu cadastro';
      }
      
  </script>
      
</head>
<header style="top:0px;">
  <!------------------Top Navigation Bar------------------>
      <div id="home"><h1 class="logo" id="logo"><img id="img" src="imagens/header.png" class="imgheader">Fantasia Pet</h1>

      <nav id="nav">
        <ul>
          <li><a id="menu" class="opc" href="index.php">Home</a></li>
          <li><a id="menu2" class="opc" href="sobre.php">Sobre</a></li>
          <li><a id="menu3" class="opc" href="cart.php">Produtos</a></li>
        </ul>
      </nav>
      </div>
      <div class="align-right"><button id="loginbtn" style="position:static;" class="buttonlogin" onclick="openForm()"><span id="ini">Olá, Entre aqui</span><br><span id="fontcadastro"> ou faça seu cadastro</span> </button>
  <!-------------------- Form Login -------------------->
      <div class="form-popup" id="myForm">
        <form action="templates/login.php" class="form-container" style="padding:30px; margin-bottom:30px;">
          <p class="logintext">Login</p>
          <p style="float: left;">
          <label for="email" style="float: left;">Email</label>
          <input type="text" placeholder="Insira seu email" name="emaillogin" required>
          <label for="psw" style="float: left;">Senha</label>
          <input type="password" placeholder="Insira sua senha" name="pswlogin" required>
          <a href="cadastro.php" class="registro">Não é cadastrado ainda? Faça seu registro aqui.</a>  
          </p>
            
          <button type="submit" class="btn">Login</button>
          <button type="button" class="btn cancel" onclick="closeForm()">Fechar</button>
        </form>
      </div></div>
</header>
<!----------------------- PHP ----------------------->
<?php 
  //print_r($_SESSION);
  if($_SESSION['login'] != 0)
  {
    $logado = $_SESSION['login'];
    echo "<script>bemvindo();</script>";
  }
  else{
    echo "<script>deslogado();</script>";
  }
?>
<body>
<button onclick="topFunction()" id="topBtn">Voltar ao topo</button>