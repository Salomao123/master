<?php
   ini_set("display_errors",1);
   ini_set("display_startup_erros",1);
   error_reporting(E_ALL);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

  <?php

    include 'config.php';

    if(!isset($_POST["atualizar"]))
    {

      $id=$_GET["id"];
      $nome=$_GET["nome"];
      $email=$_GET["email"];
      $senha=$_GET["senha"];
      $contato=$_GET["contato"];
      $endereco=$_GET["endereco"];
    }
    else
    {
      $id=$_POST["id"];
      $nome=$_POST["nome"];
      $email=$_POST["email"];
      $senha=$_POST["senha"];
      $contato=$_POST["contato"];
      $endereco=$_POST["endereco"];

        $sql="UPDATE devedor SET nome=:nome, email=:email, senha=:senha, contato=:contato, endereco=:endereco WHERE id=:myid";

        $resultado=$base->prepare($sql);

        $resultado->execute(array(":myid"=>$id,":nome"=>$nome,":email"=>$email,":senha"=>$senha,":contato"=>$contato,":endereco"=>$endereco));

        header("Location:index.php");
    }

  ?>

<form name="form1" method="post" action="<?php $_SERVER['PHP_SELF'];   ?>">

  <table width="45%" border="1" align="center">

    <tr>
      <td></td>
      <td><label for="id"></label>
      <input type="hidden" name="id" id="id" value="<?php echo $id ?>"></td>
    </tr>
    <tr>
      <td>Nome</td>
      <td><label for="nome"></label>
      <input type="text" name="nome" id="nome" value="<?php echo $nome ?>"></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="email"></label>
      <input type="text" name="email" id="email" value="<?php echo $email ?>"></td>
    </tr>
    <tr>
      <td>Senha</td>
      <td><label for="senha"></label>
      <input type="text" name="endereco" id="esenha" value="<?php echo $senha ?>"></td>
    </tr>
    <tr>
      <td>Contato</td>
      <td><label for="contato"></label>
      <input type="text" name="contato" id="contato" value="<?php echo $contato ?>"></td>
    </tr>
    <tr>
      <td>Endereço</td>
      <td><label for="endereco"></label>
      <input type="text" name="endereco" id="endereco" value="<?php echo $endereco ?>"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="atualizar" id="atualizar" value="Atualizar"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>


</body>
</html>
