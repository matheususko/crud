         <?php
            include_once("conexao.php");
                $consulta = $conn->prepare("SELECT * FROM formulario");
                $consulta->execute();

              while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                  echo "Nome: {$linha['nome']} - Cpf: {$linha['cpf']}<br /> <a href='deletar.php?id={$linha['form_id']}'>APAGAR</a>";
                  echo "nome:".$linha->nome."<br />";
               } 
          ?> 

<!DOCTYPE html>
<html lang="pt_br">
<head>

   <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
  <link href="http://code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet">
  <script src="//code.jquery.com/jquery-2.1.0.min.js" type="text/javascript"></script>

   <meta charset="utf-8">

  <title>Listar</title>

   <link rel="stylesheet" type="text/css" href="home.css">
   <link rel="stylesheet" type="text/css" href="menu.css">
   </head>
   <body>
      <header class="cabecalho">
          <nav class="nav-bar">
              <div class="nav-container"> 
                  <a id="nav-menu" class="nav-menu"></a>
                    <ul class="nav-list " id="nav">
                      <img src="logo.png">
                        <li> <a href="index.php" id="t1"><i class="icon ion-ios7-home-outline"></i> Home</a></li>
                        <li> <a href="cadastramento.php" target=".conteudo" id="t2"><i class="icon ion-ios7-person-outline"></i> Cadastro</a></li>
                        <li> <a href="#" id="t3"><i class="ion-ios7-paper-outline"></i> Listar</a></li>
                        <li> <a href="#" id="t4"><i class="ion-ios7-people-outline"></i> Atletas</a></li>
                        <li> <a href="#" id="t5"><i class="ion-ios7-email-outline"></i> Contato</a></li>
                    </ul>
              </div>
          </nav>
      </header>
      <main class="principal">
         <div class="conteudo">

          <nav class="modulos">
                         <form class="modulo" action="" method="POST" name="f1" >
                            <div class="modulo azul">
                               <h3>Listar | Atualizar | Deletar</h3>
                               <table border="1" width="100%">
                                  <tr>
                                     <th>id</th>
                                     <th>nome</th>
                                     <th>cpf</th>
                                     <th>senha</th>
                                     <th>Ações</th>
                                  </tr>
                                  <?php
                                     try {
                                      
                                         $stmt = $conn->prepare("SELECT * FROM formulario");
                                      
                                             if ($stmt->execute()) {
                                                 while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                                                    echo "<tr>";

                                                    echo "<td> $rs->form_id </td>";
                                                    echo "<td> $rs->nome </td>";
                                                    echo "<td> $rs->cpf </td>";
                                                    echo "<td>$rs->senha </td>";
                                                    echo "<td><a href='deletar.php?id=".$rs->form_id."'>Apagar</a> | <a href='index.php?id=".$rs->form_id."'>Atualizar</a> </td>";

                                                     echo "</tr>";
                                                 }
                                             } else {
                                                 echo "Erro: Não foi possível recuperar os dados do banco de dados";
                                             }
                                     } catch (PDOException $e) {
                                         echo "Erro: ".$e->getMessage();
                                     }
                                  ?>
                               </table>
                            </div>
                         </form>
                      </nav> 
         </div>  
      </main>
      <footer class="rodape">
         <p>
            <?php 
               setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
               date_default_timezone_set('America/Sao_Paulo');
               echo strftime('%A, %d de %B de %Y', strtotime('today'));
            ?>
         </p>
      </footer> 
</body>
</html>



