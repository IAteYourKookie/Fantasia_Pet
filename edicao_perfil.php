<!----------------------- Header ----------------------->
<?php
  include_once('templates/header.php');
  ?>
<!--------------------- Conteudo ---------------------->
  <div class="content">
      <center><div>
        <form class="form-container" enctype="multipart/form-data" action="templates/upload.php" method="post">
          <p><label for="email" style="float: left;">Nova foto de perfil</label></p>    
          <input type="hidden" name="MAX_FILE_SIZE" value="99999999"/>
          <input name="imagem" class="btn" type="file"/>
          <p style="margin-top: 0px;">
            <label for="email" style="float: left;">Nome Completo</label>
            <input type="text" placeholder="Insira seu nome completo" name="name" required>
            <label for="email" style="float: left;">Email</label>
            <input type="text" placeholder="Insira seu email" name="email" required>
            <label for="tel" style="float: left;">Telefone</label>
            <input type="text" placeholder="Insira seu numero de celular" name="tel" required>
          </p>
          <input type="submit" class="btn cancel" value="Salvar Alterações"/>
        </form></div>

      </center>
  </div>
<!----------------------- Footer ----------------------->
  <?php
    include_once('templates/footer.php');
  ?>