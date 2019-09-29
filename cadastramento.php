
<?php 

           include_once("conexao.php");

  
    $id = (!empty($_GET['id'])? $_GET['id'] : 0);
    $alterar = false;

 



    if($_SERVER["REQUEST_METHOD"] == "POST"){
      session_start();
          $id = $_POST['id'];
          $logu = $_POST['nome'];
          $cpfu = $_POST['cpf'];
          $senu = $_POST['senha'];


          $stmt=$conn->prepare("INSERT INTO formulario(nome,cpf,senha) VALUES (?,?,?)");

          $stmt->bindValue(1,$logu);
          $stmt->bindValue(2,$cpfu);
          $stmt->bindValue(3,$senu);

            $alterar = false;
         
          if ($stmt->execute())            
             echo "SUCESSO";


           }elseif($_SERVER["REQUEST_METHOD"] == "GET" && $id != 0){

              try {
              $stmt = $conn->prepare('SELECT * FROM formulario WHERE form_id = :id');
                $stmt->bindParam(':id', $id); 
                $stmt->execute();
                $usuario = $stmt->fetch(PDO::FETCH_OBJ);
                $alterar = true;
            
            
                } catch(PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
      }

 ?>
<!DOCTYPE html>
<html lang="pt_br">
<head>

   <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
  <link href="http://code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet">
  <script src="//code.jquery.com/jquery-2.1.0.min.js" type="text/javascript"></script>

   <meta charset="utf-8">

  <title>Cadastrar</title>

   <link rel="stylesheet" type="text/css" href="home.css">
   <link rel="stylesheet" type="text/css" href="menu.css">
   </head>
   <body>
      <header class="cabecalho">     
          <nav class="nav-bar">
              <div class="nav-container"> 
                  <a id="nav-menu" class="nav-menu"></a>
                    <ul class="nav-list " id="nav">
                      <img src="img/logo.png">
                        <li> <a href="index.php" id="t1"><i class="icon ion-ios7-home-outline"></i> Home</a></li>
                        <li> <a href="cadastramento.php" target=".conteudo" id="t2"><i class="icon ion-ios7-person-outline"></i> Cadastro</a></li>
                        <li> <a href="listar.php" id="t3"><i class="ion-ios7-paper-outline"></i> Listar</a></li>
                        <li> <a href="#" id="t4"><i class="ion-ios7-people-outline"></i> Atletas</a></li>
                        <li> <a href="#" id="t5"><i class="ion-ios7-email-outline"></i> Contato</a></li>
                    </ul>
              </div>
          </nav>
      </header>
      <main class="principal">
         <div class="conteudo">
            <nav class="modulos">
            <?php 
              /*if($alterar){
               $url = "atualizar.php";
              }else{
                $url = "index.php";
              }*/
              ?>

            <!-- <form class="modulo" action="<?php echo $url ?>" method="POST" name="f1" >-->
                <form class="modulo" action="cadastramento.php" method="POST" name="f1" >
               <?php if ($alterar){ ?>
                <input type="hidden" name="id" value="<?php echo $usuario->form_id ?>" />
              <?php } ?>
                 <div class="modulo verde">
                    <h3>CADASTRAR</h3>
                    
                    <ul>
                       <li>
                       nome <br>
                       <input type="hidden" name="id" value="<?php echo $usuario->form_id ?>" />
                       <input type="text" name="nome" value="<?php if($alterar) echo $usuario->nome ?>" />
                       </li>

                       <li>
                       cpf <br>
                       <input type="text" name="cpf" value="<?php if($alterar) echo $usuario->cpf ?>" >
                       </li>  

                       <li>
                       senha <br>
                       <input type="password" name="senha" value="<?php if($alterar) echo $usuario->senha ?>" >
                       </li>
                       <li> 
                        <input type="submit" name="salvar"> <input type="reset" name="Limpar">
                       </li>
                    </ul>
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
