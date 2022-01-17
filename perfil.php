<!----------------------- Header ----------------------->
<?php
  include_once('templates/header.php');
  $user=$_SESSION['login'];
  $tel= mysqli_query($bdOpen,"SELECT phone FROM usuario WHERE email='$user'");
  $row = mysqli_fetch_array($tel);
  ?>
<!--------------------- Conteudo ---------------------->
  <div class="content">
      <center><div class="form-container" >
        <img class="avatar" src="imagens/dog-g4c0a16c89_1920.jpg">
        <div>
          <p class="user" id="nome_user" style="font-size:20px;"></p>
          <p class="user" id="email_user" style="font-size:20px;"></p>
          <p class="user" id="tel_user" style="font-size:20px;"></p>
        </div>
        <button class="btn2" onclick="location.href='edicao_perfil.php'">Editar meu perfil</button>
      </div>
      </center>
  </div>
<!----------------------- Footer ----------------------->
  <?php
    include_once('templates/footer.php');
  ?>

<!----------------------- Script ----------------------->
<script>
  document.getElementById('nome_user').innerHTML="<?php echo $_SESSION['name']; ?>";
  document.getElementById('email_user').innerHTML="<?php echo $_SESSION['login']; ?>";  
  document.getElementById('tel_user').innerHTML="<?php print_r($row['phone']) ?>";
</script>