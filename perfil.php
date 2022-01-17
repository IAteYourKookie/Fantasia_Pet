<!----------------------- Header ----------------------->
<?php
  include_once('templates/header.php');
  $user=$_SESSION['login'];
  $tel= mysqli_query($bdOpen,"SELECT phone FROM usuario WHERE email='$user'");
  $tel = mysqli_fetch_array($tel);

  $name= mysqli_query($bdOpen,"SELECT name FROM usuario WHERE email='$user'");
  $name = mysqli_fetch_array($name);

  $id= mysqli_query($bdOpen,"SELECT id FROM usuario WHERE email='$user'");
  $id = mysqli_fetch_array($id);
  $id=($id['id']);

  $pfp = mysqli_query($bdOpen,"SELECT dir_imagem FROM imagem WHERE id_usuario=$id");
  $pfp = mysqli_fetch_array($pfp);
  $pfp=($pfp['dir_imagem']);
  $pfp="templates/uploads/".$pfp;
 
  ?>
<!--------------------- Conteudo ---------------------->
  <div class="content">
      <center><div class="form-container" >
        <span id="avatar"></span>
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
  document.getElementById('nome_user').innerHTML="<?php print_r($name['name']) ?>";
  document.getElementById('email_user').innerHTML="<?php echo $_SESSION['login']; ?>";  
  document.getElementById('tel_user').innerHTML="<?php print_r($tel['phone']) ?>";
  document.getElementById('avatar').innerHTML="<?php echo "<img class='avatar' src='$pfp'>" ?>";
  
</script>