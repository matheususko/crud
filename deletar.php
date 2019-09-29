<?php 
include_once("conexao.php");
$d_id = $_GET['id']; 

   
try {
$stmt = $conn->prepare('DELETE FROM formulario WHERE form_id = :id');
  $stmt->bindParam(':id', $d_id); 
  $stmt->execute();

   header('Location:listar.php');

  echo $stmt->rowCount(); 
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}

?>