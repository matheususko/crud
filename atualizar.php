<?php 
	include_once("conexao.php");
	$a_id = $_POST['id'];
	$a_nome = $_POST['nome'];
	$a_cpf = $_POST['cpf'];
	$a_senha = $_POST['senha'];
	
echo ($a_id);
	if ($a_id != "") {

		try {
			
		
 	$stmt = $conn->prepare("UPDATE formulario SET nome = :nome, cpf = :cpf, senha = :senha where id = :id");
    #$stmt->bindParam(4, $id);
        $stmt->bindValue(':nome', $a_nome);
		$stmt->bindValue(':cpf', $a_cpf);
		$stmt->bindValue(':senha', $a_senha);
		$stmt->bindValue(':id', $a_id);
		$stmt->execute();

		} catch (Exception $e) {
			 echo 'Error: ' . $e->getMessage();
		}
		
		
#} else {

}
	//header('Location: index.php');
 ?>





 <!--(formatação para datenasc)<input type="number" name="age" required placeholder="Age" min="10" max="100">-->

 <!--									   REFERÊNCIAS
 									------------------------
 <input type="text" class="form-control cpf-mask" placeholder="Ex.: 000.000.000-00">
<input type="text" class="form-control cep-mask" placeholder="Ex.: 00000-000">
<input type="text" class="form-control time-mask" placeholder="Ex.: 00:00:00">
<input type="text" class="form-control date-time-mask" placeholder="Ex.: 00/00/0000 00:00:00">
<input type="text" class="form-control phone-mask" placeholder="Ex.: 0000-0000">
<input type="text" class="form-control phone-ddd-mask" placeholder="Ex.: (00) 0000-0000">
<input type="text" class="form-control cel-sp-mask" placeholder="Ex.: (00) 00000-0000">
<input type="text" class="form-control cep-mask" placeholder="Ex.: AAA 000-S0S">
-->