<?php
ini_set("display_errors",1);
ini_set("display_startup_erros",1);
error_reporting(E_ALL);

include 'config.php';

//$registro=$coneccao->fetchAll(PDO::FETCH_OBG);

$registro=$base->query("SELECT * FROM devedor")->fetchAll(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html>
<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="../Public/Css/materialize.min.css"  media="screen,projection"/>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>CRUD</title>
</head>
<body>

  <!-- Modal Trigger -->
  <div class="fixed-action-btn horizontal">
    <a class="btn-floating btn-large red modal-trigger" href="#modal1">
      <i class="large material-icons">mode_edit</i>
    </a>
  </div>

  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4 class="center">Adicionar Devedor</h4>
      <form action="insert.php" method="POST">
        <div class="col s12">
          <div class="col s12">
            <label>Nome:</label>
            <input type="text" name="nome" placeholder="Nome">
            <label>Email:</label>
            <input type="text" name="email" placeholder="Email">
            <label>Senha:</label>
            <input type="text" name="senha" placeholder="Senha">
            <label>Contato:</label>
            <input type="text" name="contato" placeholder="Contato">
            <label>Rua:</label>
            <input type="text" name="rua" placeholder="Rua">
            <label>Bairro:</label>
            <input type="text" name="bairro" placeholder="Bairro">
            <label>Numeração:</label>
            <input type="text" name="numeracao" placeholder="Numeração">
            <label>CEP:</label>
            <input type="text" name="cep" placeholder="CEP">
          </div>
        </div>
    </div>
    <div class="modal-footer">
      <input class="btn-flat" type="submit" name="cr" id="cr" value="Inserir">
    </form>
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancelar</a>
    </div>
  </div>


  <!-- Detalhes -->
  <div id="modal2" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4 class="center">Detalhes</h4>
      <table class="responsive-table">
        <thead>
          <tr>
            <th>Rua</th>
            <th>Bairro</th>
            <th>Numeração</th>
            <th>CEP</th>
          </tr>
        </thead>

        <tbody>
          <?php
          foreach ($registro as $valores) :
            echo
            "
            <tr>
            <td> $valores->rua </td>
            <td> $valores->bairro </td>
            <td> $valores->numeracao </td>
            <td> $valores->cep </td>
            </tr>
            ";
          endforeach;
          ?>
        </tbody>
      </table>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancelar</a>
    </div>
  </div>

  <!-- Modal Trigger -->
  <div class="fixed-action-btn horizontal">
    <a class="btn-floating btn-large red modal-trigger" href="#modal1">
      <i class="large material-icons">mode_edit</i>
    </a>
  </div>

  <table class="responsive-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Contato</th>
        <th>Detalhes</th>
        <th>Ações</th>
      </tr>
    </thead>

    <tbody>
      <?php
      foreach ($registro as $pessoa) :
        echo
        "
        <tr>
        <td> $pessoa->id </td>
        <td> $pessoa->nome </td>
        <td> $pessoa->email </td>
        <td> $pessoa->contato </td>
        <td><a class='btn green modal-trigger' href='#modal2'>Detalhes</a> </td>
        <td><a class='btn red' href='deletar.php?id= $pessoa->id'>Deletar</a>
        <a class='btn blue' href='editar.php?id= $pessoa->id & nome= $pessoa->nome & email= $pessoa->email & senha= $pessoa->senha & contato= $pessoa->contato'>Atualizar</a></td>
        </tr>
        ";
      endforeach;
      ?>
    </tbody>
  </table>

  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="../Public/Js/materialize.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $('.modal').modal();
  });
</script>
</body>
</html>
