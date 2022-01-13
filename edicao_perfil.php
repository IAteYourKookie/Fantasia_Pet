<!----------------------- Header ----------------------->
<?php
  include_once('templates/header.php');
  ?>
<!--------------------- Conteudo ---------------------->
  <div class="content">
      <center><div style="padding-top: 20px;">
      <form enctype="multipart/form-data" action="templates/upload.php" method="post">
          <input type="hidden" name="MAX_FILE_SIZE" value="99999999"/>
          <div><input name="imagem" type="file"/></div>
          <div><input type="submit" value="Salvar"/></div>
      </form></div>
      </center>
  </div>
<!----------------------- Footer ----------------------->
  <?php
    include_once('templates/footer.php');
  ?>