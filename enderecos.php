<!----------------------- Header ----------------------->
<?php
    include("templates/header.php");
    $email=$_SESSION['login'];
    if(isset($_REQUEST['endereco'])){
        $endereco=($_REQUEST['endereco']);
        $numero=($_REQUEST['numero']);
        $complemento=($_REQUEST['complemento']);
        $bairro=($_REQUEST['bairro']);
        $cep=($_REQUEST['cep']);
        $cidade=($_REQUEST['cidade']);
        $uf=($_REQUEST['uf']);

        $id= mysqli_query($bdOpen,"SELECT id FROM usuario WHERE email='$email'");
        $id = mysqli_fetch_array($id);
        $id=($id['id']);
        mysqli_query($bdOpen,"insert into enderecos(`id_usuario`, `bairro`, `endereco`, `numero`, `complemento`,`cep`, `cidade`, `estado`) values($id,'$bairro', '$endereco', '$numero','$complemento','$cep','$cidade','$uf')");
        echo "<script>location.replace('perfil.php');alert('Endereço cadastrado com sucesso!');</script>";
    }
?>
<!--------------------- Conteudo ---------------------->
    <!------------------ Form Cadastro ------------------>
    <div class="content">
                <center><div class="container">
                    <form action="enderecos.php" class="form-container" style="height:750px;" >
                    <p class="logintext">Cadastrar endereço</p>
                    <p style="float: left;">

                    <label for="endereco" style="float: left;">Endereço</label>
                    <input type="text" placeholder="Rua/Avenida" name="endereco" required>

                    <label for="numero" style="float: left;">Numero</label>
                    <input type="text" placeholder="Numero" name="numero" required>

                    <label for="complemento" style="float: left;">Complemento</label>
                    <input type="text" placeholder="Complemento" name="complemento" required>

                    <label for="bairro" style="float: left;">Bairro</label>
                    <input type="text" placeholder="Bairro" name="bairro" required>

                    <label for="cep" style="float: left;">CEP</label>
                    <input type="text" placeholder="CEP" name="cep" required>

                    <label for="cidade" style="float: left;">Cidade</label>
                    <input type="text" placeholder="Cidade" name="cidade" required>
                    
                    <label for="uf" style="float: left;">Estado</label>
                    <select id="uf" name="uf">
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select>
                    <button type="submit" class="btn">Cadastrar endereço</button>    
                </form>
                </div>
    </div></center>
<!----------------------- Footer ----------------------->
<?php
    include_once("templates/footer.php");
?>