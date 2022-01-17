<?php
    if(!isset($_SESSION)) 
    { 
        session_start();
    } 
    
    include('conexao.php');
    
    if (isset($_REQUEST['emaillogin'])){
        $emaillogin=($_REQUEST['emaillogin']);
        $pswlogin=hash('md5',($_REQUEST['pswlogin']));
        $response=[];

        $query = mysqli_query($bdOpen,"SELECT psw FROM usuario WHERE email='$emaillogin'");

        if(mysqli_num_rows($query) > 0){
            $row = mysqli_fetch_array($query);
            if($pswlogin == $row['psw']){

                $response["success"] = 1;
                $_SESSION['login'] = $emaillogin;
                $sql = mysqli_query($bdOpen,"SELECT id FROM usuario WHERE email='$emaillogin'");
                $id= mysqli_fetch_array($sql);
                $id=$id['id'];
                $_SESSION['id'] = $id;
                $sql = mysqli_query($bdOpen,"SELECT name FROM usuario WHERE email='$emaillogin'");
                $id= mysqli_fetch_array($sql);
                $name=$id['name'];
                $_SESSION['name'] = $name;
                echo "<script>location.replace('perfil.php');</script>";
            }
            else {
                // senha ou usuario nao confere
                $response["success"] = 0;
                $response["error"] = "senha não confere";
                $_SESSION['login']= 0;
                $_SESSION['id']=0;
                $_SESSION['senha']=0;
                $_SESSION['name']=0;
                echo "<script>alert('senha não confere'); location.replace(history.back()); </script>";
            }
        }else {
                //usuario nao existe
                $response["success"] = 0;
                $response["error"] = "usuario não confere";
                $_SESSION['login']= 0;
                $_SESSION['id']=0;
                $_SESSION['senha']=0;
                $_SESSION['name']=0;
                echo "<script> alert('usuario não confere'); location.replace(history.back()); </script>";
            }
        mysqli_close($bdOpen);

    }
?>