<script>
  // REDEFINICAO DE TAMANHO DA NAVBAR
  window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("logo").style.fontSize = "30px";
    document.getElementById("menu").style.visibility = "hidden";
    document.getElementById("menu2").style.visibility = "hidden";
    document.getElementById("menu3").style.visibility = "hidden";
    document.getElementById("img").style.width = "50%";
    document.getElementById("loginbtn").style.width = "100%";
    document.getElementById("fontola").style.fontSize="20px";
    document.getElementById("fontcadastro").style.fontSize="15px";
  } else {
    document.getElementById("logo").style.fontSize = "60px";
    document.getElementById("menu").style.visibility = "visible";
    document.getElementById("menu2").style.visibility = "visible";
    document.getElementById("menu3").style.visibility = "visible";
    document.getElementById("img").style.width = "100%";
    document.getElementById("loginbtn").style.width = "110%";
    document.getElementById("fontola").style.fontSize="22px";
    document.getElementById("fontcadastro").style.fontSize="17px";
  }
  if (document.body.scrollTop > 90 || document.documentElement.scrollTop > 90) {
    document.getElementById("topBtn").style.display = "block";
  }
  else {
    document.getElementById("topBtn").style.display = "none";
  }
}
</script>
</body>

<footer>© Todos os direitos reservados<br>Lorena Teixeira de Almeida, 2021</footer>
</html>