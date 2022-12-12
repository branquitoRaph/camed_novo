<?php
require_once 'conexao.php';
require_once 'crud.php';
include_once 'database.php';
/*
Objetivo: Classe responsável por representar todas as operações da farmcia.

Atributos:
$nomeFarmacia- nome da farmacia
$preco - preço do remédio na farmacia
$data - data que foi cadastrado o sintoma
$medicamento - o remedio
$idfarmacia - id da farmacia
 
Métodos:
insert - insere uma farmacia e o medicamento
findbyfarmcia - mostra a o preço e a farmacia
*/
class Farmacia extends CRUD{
	
	protected $table ='farmacia';
	
	private $idFarmacia;
	private $nomeFarmacia;
	private $preco;
	private $dataFarmacia;
	private $medicamentoFarmacia;
	
	public function setidFarmacia($idFarmacia){
		$this->idFarmacia = $idFarmacia;
	}
	public function getidFarmacia(){
		return $this->idFarmacia;
	}
	
	public function setnomeFarmacia($nomeFarmacia){
		$this->nomeFarmacia = $nomeFarmacia;
	}
	public function getnomeFarmacia(){
		return $this->nomeFarmacia;
	}
	
	public function setPreco($preco){
		$this->preco = $preco;
	}
	public function getPreco(){
		return $this->preco;
	}
	
	public function setdataFarmacia($dataFarmacia){
		$this->dataFarmacia = $dataFarmacia;
	}
	public function getdataFarmacia(){
		return $this->dataFarmacia;
	}
	
	public function setmedicamentoFarmacia($medicamentoFarmacia){
		$this->medicamentoFarmacia = $medicamentoFarmacia;
	}
	
	public function getmedicamentoFarmacia(){
		return $this->medicamentoFarmacia;
	}
	
	public function  findbyFarmacia(){
		$sql = "SELECT nomeFarmacia, preco, dataFarmacia, medicamentoFarmacia FROM farmacia";
		$stmt = Database::prepare($sql);
		$stmt->bindParam(':nomeFarmacia', $this->nomeFarmacia);
		$stmt->bindParam(':preco', $this->preco);
		$stmt->bindParam(':dataFarmacia', $this->dataFarmacia);
		$stmt->bindParam(':medicamentoFarmacia', $this->medicamentoFarmacia);
		$stmt->execute();
		return $stmt->fetch();
	}
}
?>

