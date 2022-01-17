
<!----------------------- PHP ----------------------->
    <?php
    include_once('templates/header.php');
    include_once('templates/login.php');
    include_once('templates/conexao.php');
            if(isset($_REQUEST['psw'])){
                $psw=hash('md5',($_REQUEST['psw']));
                $pswCheck=hash('md5',($_REQUEST['pswCheck']));
                

                if ($pswCheck==$psw){
                    $name=($_REQUEST['name']);
                    $email=($_REQUEST['email']);
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $phone=($_REQUEST['tel']);
                        $email=filter_var($email,FILTER_SANITIZE_EMAIL);
                        $phone=filter_var($phone, FILTER_SANITIZE_NUMBER_INT);

                        //Verificaçao de usuario existente
                        $usuario_existe = mysqli_query($bdOpen, "SELECT email FROM usuario WHERE email='$email'");

                        if (mysqli_num_rows($usuario_existe) > 0) {
                            $response["success"] = 0;
                            $response["error"] = "usuario ja cadastrado";
                            echo "<script>alert('Email já cadastrado');</script>";
                        } else {
                            mysqli_query($bdOpen,"insert into usuario(name,email,phone,psw,pfp,id) values('$name','$email', '$phone', '$psw','',NULL)");
                            $response["success"] = 1;
                            echo "<script>alert('Cadastrado com sucesso');</script>";
                        }

                        mysqli_close($bdOpen);
                        echo "<script>
                        location.replace('cadastro.php');</script>";
                    } else {
                        echo("<script>alert('$email não é um email valido.');</script>");
                    }

                    
                } elseif($pswCheck!=$psw){
                    //header("Location: http://localhost/site_lorena/cadastro.php");
                    //exit();
                    echo "<script>
                    location.replace('cadastro.php');
                    alert('Senhas não coincidem');</script>";
                }
            }
    ?>

<!--------------------- Conteudo ---------------------->
        <!------------------ Form Cadastro ------------------>
            <div class="content">
            <center><div>
                <img class="boximgs" src="imagens/dog_PNG50375.png">
                <form action="" class="form-container" >
                <p class="logintext">Cadastro</p>
                <p style="float: left;">
                <label for="email" style="float: left;">Nome Completo</label>
                <input type="text" placeholder="Insira seu nome" name="name" required>
                <label for="email" style="float: left;">Email</label>
                <input type="text" placeholder="Insira seu email" name="email" required>
                <label for="tel" style="float: left;">Telefone</label>
                <input type="text" placeholder="Insira seu numero de celular" name="tel" required>
                <label for="psw" style="float: left;">Senha</label>
                <input type="password" placeholder="Insira sua senha" name="psw" required>
                <label for="psw" style="float: left;">Confirmação senha</label>
                <input type="password" placeholder="Confime sua senha" name="pswCheck" required>
                </p>
                    
                <button type="submit" class="btn">Cadastrar</button>
                </form>
            </div></div></center>

<!----------------------- Footer ----------------------->
    <?php
        include_once('templates/footer.php');
    ?>