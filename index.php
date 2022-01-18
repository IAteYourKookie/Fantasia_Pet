<!----------------------- Header ----------------------->
  <?php
  include('templates/header.php');
  ?>
<!--------------------- Conteudo ---------------------->
  <!--------------------- Banner ---------------------->
      <!--<img src="imagens/bg.png" style="float:center; height:60%;object-fit: cover;">-->
      <div class="content">
        <div class="banner">
          <p>
            <span class="titulo">Fantasias estilosas para<br>seus pets<br></span><span class="subtitulo"><br>De acessórios a roupinhas. Vem dar<br> uma olhadinha.<br>
            <button class="bigbtn" onclick="window.location.href='index.php#produtos'"><span>Veja mais</span></button></span>
          </p>
        <img class="itemimg" src="imagens/pngegg (11).png" style="width: 50%; float: right; padding-right: 100px; padding-top: 20px;"></div>
  <!--------------------- Fantasias --------------------->
      <div class="contentbody" id="produtos">
        <table><tr>
          <th><p class="box"><img class="boximgs" src="imagens/produtos/elfo.png"><br>Fantasia Elfo<br><button onclick="window.location.href='cart.php'" class="button" style="vertical-align:middle"><span>Comprar</span></button></p></th>
          <th><p class="box"><img class="boximgs" src="imagens/produtos/bombeiro.png"><br>Fantasia Bombeiro<br><button onclick="window.location.href='cart.php'" class="button" style="vertical-align:middle"><span>Comprar</span></button></p></th>
          <th><p class="box"><img class="boximgs" src="imagens/produtos/reisapo.png"><br>Fantasia Rei Sapo<br><button onclick="window.location.href='cart.php'" class="button" style="vertical-align:middle"><span>Comprar</span></button></p></th>
          <th><p class="box"><img class="boximgs" src="imagens/produtos/prisioneiro.png"><br>Fantasia Presidiario<br><button onclick="window.location.href='cart.php'" class="button" style="vertical-align:middle"><span>Comprar</span></button></p></th>
        </tr>
        <tr>
          <th><p class="box"><img class="boximgs" src="imagens/produtos/rebeldes.png"><br>Fantasia Escolar Rebeldes<br><button onclick="window.location.href='cart.php'" class="button" style="vertical-align:middle"><span>Comprar</span></button></p></th>
          <th><p class="box"><img class="boximgs" src="imagens/produtos/indianajones.png"><br>Fantasia Indiana Jones<br><button onclick="window.location.href='cart.php'" class="button" style="vertical-align:middle"><span>Comprar</span></button></p></th>
          <th><p class="box"><img class="boximgs" src="imagens/produtos/heroiamerica.png"><br>Fantasia Capitão America<br><button onclick="window.location.href='cart.php'" class="button" style="vertical-align:middle"><span>Comprar</span></button></p></th>
          <th><p class="box"><img class="boximgs" src="imagens/produtos/heroiaranha.png"><br>Fantasia Homem Aranha<br><button onclick="window.location.href='cart.php'" class="button" style="vertical-align:middle"><span>Comprar</span></button></p></th>
          </tr></table>
      </div>
      </div>
<!----------------------- Footer ----------------------->
  <?php
  include('templates/footer.php');
  ?>
