<!----------------------- Header ----------------------->
<?php
  include_once('templates/header.php');
  ?>
<!--------------------- Conteudo ---------------------->
  <div class="content">
      <center><div class="perfilbox" >
        <img class="avatar" src="imagens/dog-g4c0a16c89_1920.jpg">
        <div>
          <p class="user" id="nome_user" style="font-size:20px;"></p>
          <p class="user" id="email_user" style="font-size:20px;"></p>
        </div>
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
</script>