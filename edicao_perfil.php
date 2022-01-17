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
          <input name="imagem" class="btn" style="margin-top:5px;" type="file"/>
          <input type="submit" class="btn cancel" value="Salvar"/>
          <p>
            <label for="email" style="float: left;">Email</label>
          </p>
        </div>
        </form>

      </center>
  </div>
<!----------------------- Footer ----------------------->
  <?php
    include_once('templates/footer.php');
  ?>