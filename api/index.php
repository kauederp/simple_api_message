<?php
include "Conexao.php";
$con=Conexao::getConexao();
if($_SERVER['REQUEST_METHOD']=="GET"){
	if(isset($_REQUEST['timestamp']) and !empty($_REQUEST['timestamp'])){
		$sql="SELECT * FROM  message WHERE timestamp>".$_GET['timestamp'];
		if($resultado=$con->query($sql)){
			$return["status"]="ok";
			$return["rows"]=$resultado->rowCount();
			$messages=null;
			while($message = $resultado->fetch(PDO::FETCH_ASSOC)){
				$messages[]=$message;
			}
			$return["msg"]=$messages;
			echo json_encode($return);
			exit;
		}
	}
	echo "{'status':'error'}";
}else if($_SERVER['REQUEST_METHOD']=="POST"){
	/*Obter os dados lendo o especial arquivo: php://input, 
	Utilizando file_get_contents('php://input') 
	Decodificar essa entrada com json_decode().	
	*/
	$dados=file_get_contents('php://input');
	$dados=json_decode($dados);
	
	if(isset($dados->message)){
		$timestamp = time()*1000;
		$sql="INSERT INTO message VALUES (0,'".$dados->message."','".$dados->nick."','".$timestamp."')";
		if($con->query($sql)){
			echo '{"timestemp":'.$timestamp.'}';
		}else{
			echo "{'status':'error'}";
		}
	}else{
		echo "{'status':'error'}";
	}
}else if($_SERVER['REQUEST_METHOD']=="PUT"){
	echo "{'status':'PUT'}";
}else if($_SERVER['REQUEST_METHOD']=="DELETE"){
	echo "{'status':'DELETE'}";
}